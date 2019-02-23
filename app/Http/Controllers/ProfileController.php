<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\UserRole;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function show(){

        $details = Employee::where('user_id', \Auth::user()->id)->with('userrole.role')->first();
        $userRole = UserRole::where('user_id',\Auth::user()->id)->first();
        $role = Role::where('id',$userRole->role_id)->first();
        
        return view('profile', compact('details','role'));
    }

}
