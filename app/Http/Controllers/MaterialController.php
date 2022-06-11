<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function materials()
    {
        $materials = Material::orderBy('type' , 'ASC')->get();
        return  view('admins.pages.material.materials', compact('materials'));
    }


    public function materialCreate()
    {
        return  view('admins.pages.material.materialCreate');
    }

    public function materialStore(Request $request)

    {
        $request->validate([
            'type'       =>'required|string|max:30',
            'state'      =>'required|string|max:30',
            'specs'      =>'required|string|max:30',
            'numser'     =>'required|numeric',

        ]);
        $materia = Material::create([

            'type'      =>$request->post('type'),
            'state'     =>$request->post('state'),
            'specs'     =>$request->post('specs'),
            'numser'    =>$request->post('numser'),
        ]);
        Toastr::success("Successfully Created Material :) ");
        return redirect()->back();
    }


    public function materialEdit($id)
    {
        $material = Material::findOrFail($id);
        return  view('admins.pages.material.materialEdit', compact('material'));
    }

    public function materialUpdate(Request $request, $id)
    {
        $request->validate([
            'type'       =>'required|string|max:30',
            'state'      =>'required|string|max:30',
            'specs'      =>'required|string|max:30',
            'numser'     =>'required|numeric',

        ]);
        $materia = Material::findOrFail($id);

        $materia->update([

            'type'      =>$request->post('type'),
            'state'     =>$request->post('state'),
            'specs'     =>$request->post('specs'),
            'numser'    =>$request->post('numser'),

        ]);
        Toastr::success("Successfully Updated Material :) ");
        return redirect()->back();
    }

    public function materialDestroy($id)
    {
        $materia = Material::findOrFail($id);
        $materia->delete();
        Toastr::success("Successfully Deleted Material :) ");
        return redirect()->back();
    }
}
