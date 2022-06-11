<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Room;
use App\Models\Roomtype;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function rooms()
    {
        $rooms = Room::orderBy('capacity' , 'ASC')->get();
        return  view('admins.pages.room.rooms', compact('rooms'));
    }


    public function roomCreate()
    {
        $roomtypes = Roomtype::orderBy('type', 'ASC')->get();
        $materials = Material::orderBy('type', 'ASC')->get();
        return  view('admins.pages.room.roomCreate' , compact('roomtypes' , 'materials'));
    }

    public function roomStore(Request $request)

    {
        $request->validate([
            'roomtype_id'  =>'required|exists:roomtypes,id',
            'material_id'  =>'required|exists:materials,id',
            'capacity'     =>'required|numeric',
            'floor'        =>'required|string|max:30',
            'num'          =>'required|string|max:30',

        ]);
        $room = Room::create([

            'roomtype_id'  =>$request->post('roomtype_id'),
            'material_id'  =>$request->post('material_id'),
            'capacity'     =>$request->post('capacity'),
            'floor'        =>$request->post('floor'),
            'num'          =>$request->post('num'),
        ]);
        Toastr::success("Successfully Created Room :) ");
        return redirect()->back();
    }


    public function roomEdit($id)
    {
        $room = Room::findOrFail($id);
        $roomtypes = Roomtype::orderBy('type', 'ASC')->get();
        $materials = Material::orderBy('type', 'ASC')->get();
        return  view('admins.pages.room.roomEdit', compact('room' ,'roomtypes','materials' ));
    }

    public function roomUpdate(Request $request, $id)
    {
        $request->validate([
            'roomtype_id'  =>'required|exists:roomtypes,id',
            'material_id'  =>'required|exists:materials,id',
            'capacity'     =>'required|numeric',
            'floor'        =>'required|string|max:30',
            'num'          =>'required|string|max:30',

        ]);
        $room = Room::findOrFail($id);

        $room->update([

            'roomtype_id'  =>$request->post('roomtype_id'),
            'material_id'  =>$request->post('material_id'),
            'capacity'     =>$request->post('capacity'),
            'floor'        =>$request->post('floor'),
            'num'          =>$request->post('num'),

        ]);
        Toastr::success("Successfully Updated Room :) ");
        return redirect()->back();
    }

    public function roomDestroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        Toastr::success("Successfully Deleted Room :) ");
        return redirect()->back();
    }
}
