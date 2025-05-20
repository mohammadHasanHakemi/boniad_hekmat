<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class DoctorController extends Controller
{
    public function index()
    {
        $doctors=Doctor::all();
        return view('doctors.index',compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with("success","Doctor Created Successfully");
    }

    public function edit($id)
    {
        $doctor=Doctor::find($id);
        return view('doctors.edit',compact('doctor'));
    }

    public function update(Request $request,$id)
    {
        $doctor=Doctor::find($id);
        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with("success","Doctor Updated Successfully");
    }

    public function confirm($id)
    {
        $doctor=Doctor::find($id);
        return view('doctors.delete',compact('doctor'));
    }

    
    public function destrory($id)
    {
        $doctor=Doctor::find($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with("success","Doctor Deleted Successfully");
    }


}
