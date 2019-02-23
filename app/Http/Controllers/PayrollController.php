<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Models\Employee;
use App\Models\Field_calculate;
use App\Models\PayrollGroupsComponents;
use App\Models\Payroll_Single_Employee;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use PDF;
use DateTime;
use File;


class PayrollController extends Controller
{

    public function show_emp_basic_salary()
    {

        $emps = Employee::all();
        $users = User::all();
        $column = '';
        $string = '';
        return view('payroll.list_emp_basic_salary', compact('emps','users', 'column', 'string'));
    }

    public function show_payroll_group_components(){
        $payroll_group_components  = PayrollGroupsComponents::all();
        return view('payroll.list_payroll_groups_components', compact('payroll_group_components'));
    }
   
    public function add_new_payroll_group_components(){
        return view('payroll.addnew_payroll_groups_components');
    }

    public function save_new_payroll_group_components(Request $request){

        $groupcomponant = new PayrollGroupsComponents;
        $groupcomponant->name = $request->input('group_description_name');
        $groupcomponant->type =$request->input('group_description_type');
        $groupcomponant->formula =$request->input('group_description_formula');
        $groupcomponant->formula_value =$request->input('formula_value');
        $groupcomponant->formula_type =$request->input('formula_type');
        $groupcomponant->is_selected =$request->input('is_selected');
        $groupcomponant->save();

        \Session::flash('flash_message', 'Payroll Groups Components Added Successfully !');
        return redirect('show-payroll-group-components');
    }

    public function edit_show_one_payroll_group_components($id){
        $payroll_groupscomponant = PayrollGroupsComponents::find($id);
        return view('payroll.edit_payroll_groups_components', compact('payroll_groupscomponant'));
    }

    public function edit_save_show_one_payroll_group_components(Request $request, $id){

        PayrollGroupsComponents::where('id', $id)-> update(array('name' => $request->input('group_name')));
        PayrollGroupsComponents::where('id', $id)-> update(array('type' => $request->input('group_description_type')));
        PayrollGroupsComponents::where('id', $id)-> update(array('formula' => $request->input('group_description')));
        PayrollGroupsComponents::where('id', $id)-> update(array('formula_value' => $request->input('formula_value')));
        PayrollGroupsComponents::where('id', $id)-> update(array('formula_type' => $request->input('formula_type')));
        PayrollGroupsComponents::where('id', $id)-> update(array('is_selected' => $request->input('is_selected')));

        \Session::flash('flash_message', 'Payroll Group Component Successfully Updated!');
        return redirect('show-payroll-group-components');
    }

    public function delete_one_payroll_group_components($id){
        $payroll_groupscomponant = PayrollGroupsComponents::find($id);
        $payroll_groupscomponant->delete();

        \Session::flash('flash_message', 'Payroll Group Component Successfully Deleted!');
        return redirect('show-payroll-group-components');
    }


    public function show_to_generate_salary_slip(){
        $emps = Employee::all();
        $users = User::all();
        $column = '';
        $string = '';
        return view('payroll.view_to_generate_salary_slip',compact('emps','users', 'column', 'string'));
    }

    public function generate_salary_slip_single_employee($id){
        $payroll_group_components  = PayrollGroupsComponents::all();
        return view('payroll.single_emp_list_components', compact('payroll_group_components'));

    }

    public function Download_salary_slip_single_emp(){
        
        return view('payroll.single_emp_salary_slip');

    }

    public function salary_slip_single_emp_DownloadPDF($id, Request $request){
        $id= $request->input('user_id');
        $year_id= $request->input('year_id');
        return view('payroll.yearly_single_emp_salary_slip', compact('id','year_id'));

    }
    

   

      public function salary_slip_DownloadPDF($id, Request $request){
        $no_of_leaves = 0;
        $basic_salary = 0;
        $user_name='';
        $users = Employee::where('user_id', $id)->get();

        foreach ($users as $user) {
            $basic_salary = $user->salary;
            $user_name = $user->name;
        }

       

        $leaves =  Employee::where('user_id', $id)->get();
        if(count($leaves) > 0){
            $no_of_leaves = 0;
        }else{
            foreach ($leaves as $leave) {
                $no_of_leaves = $leave->no_of_day_leaves;
            }
        }
        
        $no_of_day_in_month = Carbon::now()->daysInMonth;
        $pay_day_salary = $basic_salary/$no_of_day_in_month ;
        $working_days = $no_of_day_in_month - $no_of_leaves;
        
        $main_basic_salary=$pay_day_salary*$working_days;

        $payroll_employee = Payroll_Single_Employee::where('month_id', $request->input('month'))->where('year_id', $request->input('year_id'))->where('emp_id', $id)->get();
        $success = $payroll_employee->each->delete($id);

        $payroll_componants = $request->input('my_componants');

        //dd($payroll_componants);
       
        foreach ($payroll_componants as $payroll_componant) {

            $payrollcomp = PayrollGroupsComponents::find($payroll_componant);

            // 1.Percentage   2. Value;
            $compval = 0.0;
            
            if($payrollcomp->formula_type == '1'){
                $compval = (($payrollcomp->formula_value)*($main_basic_salary)/100);
                
            }else{
                $compval = ($payrollcomp->formula_value)*($main_basic_salary);
                
            }

            if (Payroll_Single_Employee::where('month_id', $request->input('month'))->where('year_id', $request->input('year_id'))->where('emp_id', $id)->where('componant_id', $payroll_componant)->count() > 0) {
                // user found
                // \Session::flash('flash_message', 'Payment Slip Already Generated !');
                // return redirect()->back();
             }else{

                

                $salary_slip = new Payroll_Single_Employee;
                $salary_slip->emp_id = $id;
                $salary_slip->componant_id = $payroll_componant;
                if($salary_slip->componant_id == '1' ){
                    $salary_slip->componant_value = $basic_salary;
                }else{
                    $salary_slip->componant_value = $compval;
                }
                
                $salary_slip->month_id = $request->input('month');
                $salary_slip->year_id = $request->input('year_id');
                $salary_slip->save();
             }

            
            
        }
        $payslip_datas = Payroll_Single_Employee::where('month_id', $request->input('month'))->where('year_id', $request->input('year_id'))->where('emp_id', $id)->get();
        $payroll_group_components  = PayrollGroupsComponents::all();
        
        $monthNum  = $request->input('month');
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F'); // March

        $pdf = PDF::loadView('payroll.single_emp_salary_pdf', compact('users','payslip_datas','payroll_group_components'));
        
        $path="Payment_Slip/".$request->input('year_id').'/'.$monthName.'/'.$id.'. '.$user_name;
        if(!File::exists($path)) {
            // path does not exist
            File::makeDirectory(public_path().'/'.$path,0777,true);
        }
        

        $pdf->save($path.'/'.$id.'_'.$user_name.'_'.$monthName.'_'.$request->input('year_id').'.pdf'); 
        return $pdf->stream('single_emp_salary_slip_pdf.pdf');
  
      }


    


}
