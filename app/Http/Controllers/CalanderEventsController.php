<?php

namespace App\Http\Controllers;

use App\Models\Calander_Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Employee;
use Calendar;
use Auth;

class CalanderEventsController extends Controller
{
    public function get_all_events()
    {
       
        $calendar_details = Calander_Event::all();
        $leader_id = Auth::user()->id;
        $absentEmployees = Employee::select('employees.name')->join('teams', 'teams.member_id', '=', 'employees.user_id')->where('employees.pf_status', '0')->where('teams.leader_id', $leader_id)->get();

        return view('calanderevent.show_all_events', compact('calendar_details','absentEmployees'));
    }
   
    
    public function store_events(Request $request)
    {
        Calander_Event::create($request->all());
        return redirect()->route('calanderevent.show_all_events', compact('calendar_details'));
    }

    public function update_events(Request $request)
    {
        if (!empty($request->id)) {
            $calendar_details = Calander_Event::findOrFail($request->id);
            if (!empty($request->name)) {
                $calendar_details->name = $request->name;
            }
            if (!empty($request->description)) {
                $calendar_details->description = $request->description;
            }
            if (!empty($request->task_date)) {
                $calendar_details->task_date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->task_date)));
            }
            $calendar_details->save();
            return response()->json(['calendar_details' => $calendar_details]);
        }else{

            $calendar_details = new Calander_Event;
            if (!empty($request->name)) {
                $calendar_details->name = $request->name;
            }
            if (!empty($request->description)) {
                $calendar_details->description = $request->description;
            }
            if (!empty($request->task_date)) {
                $calendar_details->task_date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->task_date)));
            }
            $calendar_details->save();
            return response()->json(['calendar_details' => $calendar_details]);
        }
        
       
       
    }

}
