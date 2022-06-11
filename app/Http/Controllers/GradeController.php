<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function grades()
    {
        $grades = Grade::orderBy('grade', 'ASC')->get();
        return  view('admins.pages.grade.grades' ,compact('grades'));
    }


    public function gradeCreate()
    {
        return  view('admins.pages.grade.gradeCreate');
    }

    public function storeGrade(Request $request)
    {
        $request->validate([
            'grade' => 'required'

        ]);
        $grade = Grade::create([

            'grade' => $request->post('grade')
        ]);
        Toastr::success("Successfully Created Grade :) ");
        return redirect()->back();
    }


    public function gradeEdit($id)
    {
        $grade = Grade::findOrFail($id);
        return  view('admins.pages.grade.gradeEdit' , compact('grade'));
    }

    public function gradeUpdate(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required'

        ]);
        $grade = Grade::findOrFail($id);

        $grade->update([

            'grade' => $request->post('grade')

        ]);
        Toastr::success("Successfully Updated Grade :) ");
        return redirect()->back();
    }

    public function gradeDestroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        Toastr::success("Successfully Deleted Grade :) ");
        return redirect()->back();
    }
}
