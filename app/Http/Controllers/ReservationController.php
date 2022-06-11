<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\Slot;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
     public function reservations()
    {
        $reservations = Reservation::orderBy('dateres' , 'ASC')->get();
        return  view('admins.pages.reservation.reservations', compact('reservations'));
    }


    public function reservationCreate()
    {
        $roomtypes = Roomtype::orderBy('type', 'ASC')->get();
        $slots     = Slot::orderBy('start_time', 'ASC')->get();
        $teachers  = Teacher::orderBy('last_name', 'ASC')->get();
        return  view('admins.pages.reservation.reservationCreate' , compact('roomtypes' , 'slots','teachers'));
    }

    public function reservationStore(Request $request)

    {
        $request->validate([
            'room_id'     =>'required|numeric|exists:roomtypes,id',
            'slot_id'     =>'required|numeric|exists:slots,id',
            'teacher_id'  =>'required|numeric|exists:teachers,id',
            'dateres'     =>'required|date',

        ]);
        $reservation = Reservation::create([

            'room_id'     =>$request->post('room_id'),
            'slot_id'     =>$request->post('slot_id'),
            'teacher_id'  =>$request->post('teacher_id'),
            'dateres'     =>$request->post('dateres'),
        ]);
        Toastr::success("Successfully Created Reservation :) ");
        return redirect()->back();
    }


    public function reservationEdit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $roomtypes = Roomtype::orderBy('type', 'ASC')->get();
        $slots     = Slot::orderBy('start_time', 'ASC')->get();
        $teachers  = Teacher::orderBy('last_name', 'ASC')->get();
        return  view('admins.pages.reservation.reservationEdit', compact('reservation','roomtypes' , 'slots','teachers'));
    }

    public function reservationUpdate(Request $request, $id)
    {
        $request->validate([
            'room_id'     =>'required|numeric|exists:roomtypes,id',
            'slot_id'     =>'required|numeric|exists:slots,id',
            'teacher_id'  =>'required|numeric|exists:teachers,id',
            'dateres'     =>'required|date',

        ]);
        $reservation = Reservation::findOrFail($id);

        $reservation->update([

            'room_id'     =>$request->post('room_id'),
            'slot_id'     =>$request->post('slot_id'),
            'teacher_id'  =>$request->post('teacher_id'),
            'dateres'     =>$request->post('dateres'),

        ]);
        Toastr::success("Successfully Updated Reservation :) ");
        return redirect()->back();
    }

    public function reservationDestroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        Toastr::success("Successfully Deleted Reservation :) ");
        return redirect()->back();
    }
}
