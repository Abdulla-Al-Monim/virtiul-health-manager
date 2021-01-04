<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\DoctorSpecialityList;
use App\Models\Backend\Doctor;
use App\Models\Backend\DoctorSpeciality;
use App\Models\Backend\AppointDoctor;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use File;
use Image;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $appointDoctors = AppointDoctor::orderBy('id','desc')->get();

        return view('backend.admin.pages.index',compact('appointDoctors'));
    }

    public function patient()
    {
        $appointDoctors = AppointDoctor::where('patient_id',Auth::user()->patient_id)->where('status', 1)->get();

        return view('backend.patient.pages.index',compact('appointDoctors'));
    }

    public function doctor()
    {
        $appointDoctors = AppointDoctor::where('doctor_id',Auth::user()->doctor_id)->where('status', 1)->get();
        return view('backend.doctor.pages.index',compact('appointDoctors'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
