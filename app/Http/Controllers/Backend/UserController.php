<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Backend\UnregisterUser;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use Illuminate\Support\Facades\Hash;
use Auth;
use File;
use Image;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UnregisterUser::orderBy('name','asc')->get();
        return view('backend.admin.pages.user.unregister',compact('users'));
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
    public function store(Request $request,$id)
    {
        $ruser = UnregisterUser::find($id);
        if($ruser->user_type === 'ADMIN'){
            $user                       = new User();
            $user->name                 = $ruser->name;
            $user->email                = $ruser->email;
            $user->password             = $ruser->password;
            $user->user_type            = 'ADMIN';
            $user->status               = 1;
            $user->save();
        }
        else if($ruser->user_type === 'DOCTOR'){
            $doctor                    = new Doctor();
            $doctor->name              = $ruser->name;
            $doctor->phone             = $ruser->phone;
            $doctor->email             = $ruser->email;
            $doctor->address           = $ruser->address;
            $doctor->gender            = $ruser->gender;
            $doctor->slug              = Str::slug($ruser->name);
            $doctor->save();

            $user                       = new User();
            $user->name                 = $ruser->name;
            $user->patient_id           = $patient->id;
            $user->email                = $ruser->email;
            $user->password             = $ruser->password;
            $user->user_type            = 'DOCTOR';
            $user->status               = 1;
            $user->save();
        }
        else{
            $patient                    = new Patient();
            $patient->name              = $ruser->name;
            $patient->phone             = $ruser->phone;
            $patient->email             = $ruser->email;
            $patient->address           = $ruser->address;
            $patient->gender            = $ruser->gender;
            $patient->slug              = Str::slug($ruser->name);
            $patient->save();

            $user                       = new User();
            $user->name                 = $ruser->name;
            $user->patient_id           = $patient->id;
            $user->email                = $ruser->email;
            $user->password             = $ruser->password;
            $user->user_type            = 'PATIENT';
            $user->status               = 1;
            $user->save();
        }
        $ruser->delete();

            return redirect()->route('user.manage');

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
    public function edit()
    {
        return view('backend.doctor.pages.dashbord.edit');
    }
    public function patientEdit()
    {
        return view('backend.patient.pages.dashbord.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/users/' . $img);
            Image::make($image)->save($location);
            $user->image = $img;
        }
        $user->save();
        return redirect()->route('doctor.dashbord');
    }
    public function doctorChangePass()
    {
        return view('backend.doctor.pages.dashbord.changePass');
    }
    public function doctorUpdatePass(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->password === $request->confirmPassword){
            $user->password         = Hash::make($request->password);
        }
        $user->save();
        session()->flush();
        return redirect()->route('login');
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

    //patient
    public function patientUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/users/' . $img);
            Image::make($image)->save($location);
            $user->image = $img;
        }
        $user->save();
        return redirect()->route('patient.dashbord');
    }
    public function patientChangePass()
    {
        return view('backend.patient.pages.dashbord.changePass');
    }
    public function patientUpdatePass(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->password === $request->confirmPassword){
            $user->password         = Hash::make($request->password);
        }
        $user->save();
        session()->flush();
        return redirect()->route('login');
    }

    //admin
    public function adminEdit()
    {
        return view('backend.admin.pages.dashbord.edit');
    }
    public function adminUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/users/' . $img);
            Image::make($image)->save($location);
            $user->image = $img;
        }
        $user->save();
        return redirect()->route('admin.dashbord');
    }
    public function adminChangePass()
    {
        return view('backend.admin.pages.dashbord.changePass');
    }
    public function adminUpdatePass(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->password === $request->confirmPassword){
            $user->password         = Hash::make($request->password);
        }
        $user->save();
        session()->flush();
        return redirect()->route('login');
    }

    //Unregister User from Register User

}
