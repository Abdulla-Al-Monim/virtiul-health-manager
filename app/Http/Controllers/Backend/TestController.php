<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Test;
use App\Models\Backend\Patient;
use App\Models\Backend\Doctor;
use Auth;
use PDF;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::orderBy('Test_name','asc')->get();
        return view('backend.admin.pages.test.all',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($patient_id)
    {
        $patient_ids  = $patient_id;
        return view('backend.doctor.pages.test.create',compact('patient_ids'));
    }
    public function allTestShow($patient_id)
    {
        $tests = Test::where('doctor_id',Auth::user()->doctor_id)->where('patient_id', $patient_id)->get();
        return view('backend.doctor.pages.test.all',compact('tests'));
    }

    //patient view
    public function patientTests($doctor_id)
    {
         $tests = Test::where('patient_id',Auth::user()->patient_id)->where('doctor_id', $doctor_id)->get();
         return view('backend.patient.pages.test.all',compact('tests'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$patient_ids)
    {
        $request->validate([
            'Test_name' => 'required',
            
        ],
        [
            'Test_name.required' => 'Please Provide Medicine',
            
        ]);
        $test = new Test();
        $doctor = Doctor::find(Auth::user()->doctor_id);
        $patient = Patient::find($patient_ids);
        $test->doctor_id                = Auth::user()->doctor_id;
        $test->doctor_name              = Auth::user()->name;
        $test->doctor_phone             = $doctor->phone;
        $test->doctor_email             = $doctor->email;
        $test->patient_id               = $patient_ids;
        $test->pattient_name            = $patient->name;
        $test->pattient_phone           = $patient->phone;
        //$prescription->pattient_name            = $patient->name;
        $test->pattient_email           = $patient->email;
        $test->pattient_problem         = $request->pattient_problem;
        $test->Test_name                = $request->Test_name;
        $test->save();
        return redirect()->route('all.patient');
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
    public function testUpdate($id)
    {
        // $test = Test::find($id);
        // $test->Test_report = $request->Test_report;
        // $test->save();
        return redirect()->route('test.manage');
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
