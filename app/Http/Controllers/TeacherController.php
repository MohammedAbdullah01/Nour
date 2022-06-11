<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function teachers()
    {
        $teachers = Teacher::latest()->paginate();
        return  view('admins.pages.teacher.teachers', compact('teachers'));
    }


    public function teachersCreate()
    {
        $grades = Grade::orderBy('grade', 'ASC')->get();
        return  view('admins.pages.teacher.teacherCreate' , compact('grades'));
    }

    public function storeTeachers(Request $request)
    {
        $request->validate([
            'grade_id'  =>'required|exists:grades,id',
            'last_name' =>'required|between:4,10|alpha',
            'first_name'=>'required|between:4,10|alpha',
            'email'     =>'required|unique:teachers,email',
            'numtel'    =>'required|numeric',
            'department'=>'required|string|max:30',
            'status'    =>'required|string|max:30',
            'state'     =>'required|string|max:30',
            'password'  =>'required|min:5|string'

        ]);
        $teacher = Teacher::create([

            'grade_id'  =>$request->post('grade_id'),
            'last_name' =>$request->post('last_name'),
            'first_name'=>$request->post('first_name'),
            'email'     =>$request->post('email'),
            'numtel'    =>$request->post('numtel'),
            'department'=>$request->post('department'),
            'status'    =>$request->post('status'),
            'state'     =>$request->post('state'),
            'password'  =>Hash::make($request->post('password'))
        ]);
        Toastr::success("Successfully Created Teacher :) ");
        return redirect()->back();
    }


    public function teachersEdit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $grades = Grade::orderBy('grade', 'ASC')->get();
        return  view('admins.pages.teacher.teacherEdit', compact('teacher' , 'grades'));
    }

    public function teachersUpdate(Request $request, $id)
    {
        $request->validate([
            'grade_id'  =>'required|exists:grades,id',
            'last_name' =>'required|between:4,10|alpha',
            'first_name'=>'required|between:4,10|alpha',
            'email'     =>"required|unique:teachers,email,$id",
            'numtel'    =>'required|numeric',
            'department'=>'required|string|max:30',
            'status'    =>'required|string|max:30',
            'state'     =>'required|string|max:30',
            'password'  =>'nullable|min:5|string'

        ]);
        $grade = Teacher::findOrFail($id);

        $grade->update([

            'grade_id'  =>$request->post('grade_id'),
            'last_name' =>$request->post('last_name'),
            'first_name'=>$request->post('first_name'),
            'email'     =>$request->post('email'),
            'numtel'    =>$request->post('numtel'),
            'department'=>$request->post('department'),
            'status'    =>$request->post('status'),
            'state'     =>$request->post('state'),
            'password'  =>Hash::make($request->post('password'))

        ]);
        Toastr::success("Successfully Updated Teacher :) ");
        return redirect()->back();
    }

    public function teachersDestroy($id)
    {
        $grade = Teacher::findOrFail($id);
        $grade->delete();
        Toastr::success("Successfully Deleted Teacher :) ");
        return redirect()->back();
    }
}
