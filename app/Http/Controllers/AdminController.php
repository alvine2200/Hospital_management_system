<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;


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


    public function show_appointment(){

        $data=appointment::all();

        return view('admin.show_appointment', compact('data'));
    }
    

    public function approved($id){

        $data=appointment::find($id);

        $data->status='approved';

        $data->save();

        return redirect()->back()->with('message','Appointment Approved');

    }

    public function cancel($id){

        $data=appointment::find($id);

        $data->status='Cancelled';

        $data->save();

        return redirect()->back()->with('message', 'Appointment Cancelled');
    }


    public function showdoctor(){

        $data=doctor::all();
        return view('admin.showdoctor', compact('data'));

    }

    public function delete_doctor($id){

        $data=doctor::find($id);

        $data->delete();

        return redirect()->back()->with('message','Doctor Profile Succesfully Deleted');

    }

    public function update_doctor($id){

        $data=doctor::find($id); 

        return view ('admin.update_doctor', compact('data'));



    }

    public function edit_doctor(Request $request, $id){

        $doctor= doctor::find($id);

        $doctor->fullname=$request->fullname;
        $doctor->speciality=$request->speciality;
        $doctor->email=$request->email;
        $doctor->phone_number=$request->phone_number;
        $doctor->room_number=$request->room_number;

        
        $image=$request->file; 


        if($image){

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('doctorimage', $imagename);  

        $doctor->picture=$imagename;
        
     }

       
        $doctor->save();

        return redirect()->back()->with('message','Doctor Succesfully Updated');

        

    }

}
