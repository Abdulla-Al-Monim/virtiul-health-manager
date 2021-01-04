<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Backend\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;
use File;
use Image;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('name','asc')->get();
        return view('backend.admin.pages.patient.manage',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.pages.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            
        ],
        [
            'name.required' => 'Please Provide Patient Name',
            
        ]);
        $patient = new Patient();
        $patient->name           = $request->name;
        $patient->phone          = $request->phone;
        $patient->email          = $request->email;

        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/patients/' . $img);
            Image::make($image)->save($location);
            $patient->image = $img;
        }
        $patient->address        = $request->address;
        $patient->gender         = $request->gender;
        $patient->slug          = Str::slug($request->name);
        $patient->save();

        $user                   = new User();
        $user->name             = $patient->name;
        $user->patient_id       = $patient->id;
        $user->email            = $patient->email;
        $user->password         = Hash::make(123456789);
        $user->user_type        ='PATIENT';
        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/users/' . $img);
            Image::make($image)->save($location);
            $user->image  = $img;
        }
        $user->save();
        return redirect()->route('patient.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('backend.admin.pages.patient.show',compact('patient'));
    }
    public function prescription($id){
        $patient = Patient::find($id);
        return view('backend.admin.pages.patient.prescription',compact('patient'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('backend.admin.pages.patient.edit',compact('patient'));
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
        $request->validate([
            'name' => 'required|max:255',
            
        ],
        [
            'name.required' => 'Please Provide Doctor Name',
            
        ]);
        $patient = Patient::find($id);
        $patient->name           = $request->name;
        $patient->phone          = $request->phone;
        $patient->email          = $request->email;
        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/patients/' . $img);
            Image::make($image)->save($location);
            $patient->image = $img;
        }
        $patient->address        = $request->address;
        $patient->gender         = $request->gender;
        $patient->save();
        return redirect()->route('patient.manage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
    
    if ( !is_null( $patient) )
        {
            if ( File::exists('backend/img/patients/' . $patient->image) )
            {
                File::delete('backend/img/patients/' . $patient->image);
            }
            $patient->delete();

            return redirect()->route('patient.manage');
        }
        else
        {
            return redirect()->route('patient.manage');
        }
    }
}
