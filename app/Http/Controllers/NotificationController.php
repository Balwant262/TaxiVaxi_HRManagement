<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Auth;


class NotificationController extends Controller
{
    public function addNotification()
    {
        return view('notification.add_notification');
    }

    Public function processNotification(Request $request)
    {
        //notification::create(['name' => $request->name, 'description' => $request->description]);
        $notification = new Notification;
        $notification->name = $request->name;
        $notification->details = $request->description;
        $notification->date_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->date_time)));
        $notification->user_id = Auth::user()->id;
        $notification->save();
        \Session::flash('flash_message', 'Notification successfully added!');
        return redirect()->back();

    }

    public function showNotification()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        return view('notification.show_notification', compact('notifications'));
    }

    public function showEdit($id)
    {
        $result = Notification::whereid($id)->first();
        return view('notification.add_notification', compact('result'));
    }

    public function doEdit(Request $request, $id)
    {
        $name = $request->name;
        $description = $request->description;
        $date_time = $request->date_time;

        $edit = Notification::findOrFail($id);
        if (!empty($name)) {
            $edit->name = $name;
        }
        if (!empty($description)) {
            $edit->details = $description;
        }
        if (!empty($description)) {
            $edit->date_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $date_time)));
        }
        $edit->save();
        \Session::flash('flash_message', 'Notification successfully updated!');
        return redirect('notification-list');
    }

    public function doDelete($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        \Session::flash('flash_message', 'Notification successfully Deleted!');
        return redirect('notification-list');
    }

}
