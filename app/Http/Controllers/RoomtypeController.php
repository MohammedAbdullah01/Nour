<?php

namespace App\Http\Controllers;

use App\Models\Roomtype;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    public function roomtypes()
    {
        $roomtypes = Roomtype::orderBy('type', 'ASC')->get();
        return  view('admins.pages.roomtype.roomtypes', compact('roomtypes'));
    }


    public function roomtypesCreate()
    {
        return  view('admins.pages.roomtype.roomtypeCreate');
    }

    public function roomtypesStore(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:30'

        ]);
        $roomtype = Roomtype::create([

            'type' => $request->post('type')
        ]);
        Toastr::success("Successfully Created RoomType :) ");
        return redirect()->back();
    }


    public function roomtypesEdit($id)
    {
        $roomtype = Roomtype::findOrFail($id);
        return  view('admins.pages.roomtype.roomtypeEdit', compact('roomtype'));
    }

    public function roomtypesUpdate(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:30'

        ]);
        $grade = Roomtype::findOrFail($id);

        $grade->update([

            'type' => $request->post('type')

        ]);
        Toastr::success("Successfully Updated RoomType :) ");
        return redirect()->back();
    }

    public function roomtypesDestroy($id)
    {
        $grade = Roomtype::findOrFail($id);
        $grade->delete();
        Toastr::success("Successfully Deleted RoomType :) ");
        return redirect()->back();
    }
}
