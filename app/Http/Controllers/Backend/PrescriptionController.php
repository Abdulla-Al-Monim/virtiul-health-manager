<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Prescription;
use App\Models\Backend\Patient;
use App\Models\Backend\Doctor;
use Auth;
use PDF;
class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($patient_id)
    {

        $patient_ids  = $patient_id;
        return view('backend.doctor.pages.prescription.create',compact('patient_ids'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $patient_ids)
    {
        $request->validate([
            'medicine' => 'required',
            
        ],
        [
            'medicine.required' => 'Please Provide Medicine',
            
        ]);
        $prescription = new Prescription();
        $doctor = Doctor::find(Auth::user()->doctor_id);
        $patient = Patient::find($patient_ids);
        $prescription->doctor_id                = Auth::user()->doctor_id;
        $prescription->doctor_name              = Auth::user()->name;
        $prescription->doctor_phone             = $doctor->phone;
        $prescription->doctor_email             = $doctor->email;
        $prescription->patient_id               = $patient_ids;
        $prescription->pattient_name            = $patient->name;
        $prescription->pattient_phone           = $patient->phone;
        //$prescription->pattient_name            = $patient->name;
        $prescription->pattient_email           = $patient->email;
        $prescription->pattient_problem         = $request->pattient_problem;
        $prescription->medicine                 = $request->medicine;
        $prescription->save();
        return redirect()->route('all.patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allDoctorPrescriptionShow($patient_id)
    {
        $prescriptions = Prescription::where('doctor_id',Auth::user()->doctor_id)->where('patient_id', $patient_id)->get();
        return view('backend.doctor.pages.prescription.all',compact('prescriptions'));
    }
    public function patientPrescriptions($doctor_id)
    {
         $prescriptions = Prescription::where('patient_id',Auth::user()->patient_id)->where('doctor_id', $doctor_id)->get();
         return view('backend.patient.pages.prescription.all',compact('prescriptions'));
    }
    public function patientPrescription($id)
    {
         $prescription = Prescription::find($id);
          return view('backend.patient.pages.prescription.prescription',compact('prescription'));
    }
    public function PrescriptionDownload($id)
    {
        $prescription = Prescription::find($id);
         // share data to view
        view()->share('prescription',$prescription);
        $pdf = PDF::loadView('backend.patient.pages.prescription.download',compact('id'));
        return $pdf->download('prescription.pdf');
            
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

    //admin
    public function adminPrescriptions($id)
    {
         $prescriptions = Prescription::where('patient_id', $id)->get();
          return view('backend.admin.pages.prescription.all',compact('prescriptions'));
    }
}
