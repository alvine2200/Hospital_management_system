<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;


class AdminController extends Controller
{
    public function addview(){

        return view('admin.add_doctor');
    }

    public function upload(Request $request){

        
        $doctor=new doctor;

        $image=$request->file;

        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->file->move('doctorimage',$imagename);
 
        $doctor->picture=$imagename;



        $doctor->fullname=$request->fullname;
        $doctor->speciality=$request->speciality;
        $doctor->email=$request->email;
        $doctor->phone_number=$request->phone_number;
        $doctor->room_number=$request->room_number;

        $doctor->save();

        return redirect()->back()->with('message','Doctor registration is Succesful');
    }

}
