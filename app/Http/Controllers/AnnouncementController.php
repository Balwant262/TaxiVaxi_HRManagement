<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Auth;


class AnnouncementController extends Controller
{
    public function addAnnouncement()
    {
        return view('announcement.add_announcement');
    }

    Public function processAnnouncement(Request $request)
    {
        //announcement::create(['name' => $request->name, 'description' => $request->description]);
        $announcement = new Announcement;
        $announcement->name = $request->name;
        $announcement->details = $request->description;
        $announcement->date_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->date_time)));
        $announcement->user_id = Auth::user()->id;
        $announcement->save();
        \Session::flash('flash_message', 'Announcement successfully added!');
        return redirect()->back();

    }

    public function showAnnouncement()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(10);
        return view('announcement.show_announcement', compact('announcements'));
    }

    public function showEdit($id)
    {
        $result = Announcement::whereid($id)->first();
        return view('announcement.add_announcement', compact('result'));
    }

    public function doEdit(Request $request, $id)
    {
        $name = $request->name;
        $description = $request->description;
        $date_time = $request->date_time;

        $edit = Announcement::findOrFail($id);
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
        \Session::flash('flash_message', 'Announcement successfully updated!');
        return redirect('announcement-list');
    }

    public function doDelete($id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();
        \Session::flash('flash_message', 'Announcement successfully Deleted!');
        return redirect('announcement-list');
    }

}
