<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\PayrollGroupsComponents;
use App\Models\Payroll_Single_Employee;
use PDF;
use DateTime;
use File;

class MonthlyLastDayUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlylastday:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Month Last Day Generate Payment Slip';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $employees = User::all();

        foreach ($employees as $employee) {

            $no_of_leaves = 0;
            $basic_salary = 0;
            $user_name='';
            $users = Employee::where('user_id', $employee->id)->get();
    
            foreach ($users as $user) {
                $basic_salary = $user->salary;
                $user_name = $user->name;
            }
    
            $leaves =  Employee::where('user_id', $employee->id)->get();
            if(count($leaves) > 0){
                $no_of_leaves = 0;
            }else{
                foreach ($leaves as $leave) {
                    $no_of_leaves = $leave->no_of_day_leaves;
                }
            }
            
            $no_of_day_in_month = Carbon::now()->daysInMonth;

            $now = Carbon::now();
            $month = $now->format('m');
            $year = $now->year;

            $pay_day_salary = $basic_salary/$no_of_day_in_month ;
            $working_days = $no_of_day_in_month - $no_of_leaves;
            
            $main_basic_salary=$pay_day_salary*$working_days;
    
            $payroll_componants = PayrollGroupsComponents::all();
    
            //dd($payroll_componants);
           
            foreach ($payroll_componants as $payroll_componant) {
                if($payroll_componant->is_selected == '1'){
                $payrollcomp = PayrollGroupsComponents::find($payroll_componant->id);
    
                // 1.Percentage   2. Value;
                $compval = 0.0;
                
                    if($payrollcomp->formula_type == '1'){
                        $compval = (($payrollcomp->formula_value)*($main_basic_salary)/100);
                        
                    }else{
                        $compval = ($payrollcomp->formula_value)*($main_basic_salary);
                        
                    }
                
                if (Payroll_Single_Employee::where('month_id', $month)->where('year_id', $year)->where('emp_id', $employee->id)->where('componant_id', $payroll_componant->id)->count() > 0) {
                    // user found
                    // \Session::flash('flash_message', 'Payment Slip Already Generated !');
                    // return redirect()->back();
                    
                 }else{

                    $salary_slip = new Payroll_Single_Employee;
                    $salary_slip->emp_id = $employee->id;
                    $salary_slip->componant_id = $payroll_componant->id;
                    if($salary_slip->componant_id == '1' ){
                        $salary_slip->componant_value = $basic_salary;
                    }else{
                        $salary_slip->componant_value = $compval;
                    }
                    
                    $salary_slip->month_id = $month;
                    $salary_slip->year_id = $year;
                    $salary_slip->save();
                 }
    
                }
                
            }
            $payslip_datas = Payroll_Single_Employee::where('month_id', $month)->where('year_id', $year)->where('emp_id', $employee->id)->get();
            $payroll_group_components  = PayrollGroupsComponents::all();
            
            $monthNum  = $month;
            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
            $monthName = $dateObj->format('F'); // March
    
            $pdf = PDF::loadView('payroll.single_emp_salary_pdf', compact('users','payslip_datas','payroll_group_components'));
            
            $path="Payment_Slip/".$year."/".$monthName.'/'.$employee->id.'. '.$user_name;
            if(!file_exists(public_path().'/'.$path)) {
                // path does not exist
                File::makeDirectory(public_path().'/'.$path,0777,true);
                $pdf->save(public_path().'/'.$path.'/'.$employee->id.'_'.$user_name.'_'.$monthName.'_'.$year.'.pdf'); 
           
            }
            
    
            
        }
        $this->info('Monthly Salary Slip Generated successfully');
    }
}
