<?php

namespace App\Http\Controllers;

use App\Models\GoodThoughts;
use Illuminate\Http\Request;
use Auth;


class GoodThoughtsController extends Controller
{
    public function addGoodThoughts()
    {
        return view('GoodThoughts.add_GoodThoughts');
    }

    Public function processGoodThoughts(Request $request)
    {
        //GoodThoughts::create(['name' => $request->name, 'description' => $request->description]);
        $goodthoughts = new GoodThoughts;
        $goodthoughts->name = $request->name;
        $goodthoughts->details = $request->description;
        $goodthoughts->date_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->date_time)));
        $goodthoughts->user_id = Auth::user()->id;
        $goodthoughts->save();
        \Session::flash('flash_message', 'GoodThoughts successfully added!');
        return redirect()->back();

    }

    public function showGoodThoughts()
    {
        $goodthoughts = GoodThoughts::orderBy('created_at', 'desc')->paginate(10);
        return view('goodthoughts.show_goodthoughts', compact('goodthoughts'));
    }

    public function showEdit($id)
    {
        $result = GoodThoughts::whereid($id)->first();
        return view('goodthoughts.add_goodthoughts', compact('result'));
    }

    public function doEdit(Request $request, $id)
    {
        $name = $request->name;
        $description = $request->description;
        $date_time = $request->date_time;

        $edit = GoodThoughts::findOrFail($id);
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
        \Session::flash('flash_message', 'GoodThoughts successfully updated!');
        return redirect('goodthoughts-list');
    }

    public function doDelete($id)
    {
        $goodthoughts = GoodThoughts::find($id);
        $goodthoughts->delete();
        \Session::flash('flash_message', 'GoodThoughts successfully Deleted!');
        return redirect('goodthoughts-list');
    }

}
