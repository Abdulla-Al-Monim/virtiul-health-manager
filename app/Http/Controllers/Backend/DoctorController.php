<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\DoctorSpecialityList;
use App\Models\Backend\Doctor;
use App\Models\Backend\DoctorSpeciality;
use App\Models\Backend\AppointDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use File;
use Image;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderBy('name','asc')->get();
        $doctorSpecialities = DoctorSpeciality::orderBy('speciality','asc')->get();
        return view('backend.admin.pages.doctor.manage',compact('doctors','doctorSpecialities'));
    }


    public function doctors()
    {
        $doctors = Doctor::orderBy('name','asc')->get();
        $doctorSpecialities = DoctorSpeciality::orderBy('speciality','asc')->get();
        return view('backend.patient.pages.doctor.all',compact('doctors','doctorSpecialities'));
    }

    //Appoint doctor List 
    public function appointedDoctors()
    {
        
        $appointDoctors = AppointDoctor::where('patient_id',Auth::user()->patient_id)->where('status', 1)->get();
        return view('backend.patient.pages.doctor.appointed',compact('appointDoctors'));
    }

    public function appointDoctors()
    {
        $appointDoctors = AppointDoctor::orderBy('id','desc')->get();
        
        return view('backend.admin.pages.patient.appointDoctor',compact('appointDoctors'));
    }



    public function appointDoctorApprove($id)
    {
        $appointDoctor = AppointDoctor::find($id);
        $appointDoctor->status           = 1;
        $appointDoctor->save();
        return redirect()->route('appointDoctor.manage');
    }

    public function patients()
    {
        $patients = AppointDoctor::where('doctor_id',Auth::user()->doctor_id)->where('status', 1)->get();
        return view('backend.doctor.pages.patient.all',compact('patients'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctorSpecialityLists = DoctorSpecialityList::orderBy('speciality','asc')->get();
        return view('backend.admin.pages.doctor.create',compact('doctorSpecialityLists'));
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
            'name.required' => 'Please Provide Doctor Name',
            
        ]);
        $doctor = new Doctor();
        $doctor->name           = $request->name;
        $doctor->phone          = $request->phone;
        $doctor->email          = $request->email;
        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/doctors/' . $img);
            Image::make($image)->save($location);
            $doctor->image = $img;
        }
        $doctor->address        = $request->address;
        $doctor->gender         = $request->gender;
        $doctor->salary         = $request->salary;
        $doctor->from           = $request->from;
        $doctor->to             = $request->to;
        $doctor->slug          = Str::slug($request->name);
        $doctor->save();
        if (count($request->specialities) > 0) {
            foreach ( $request->specialities as $speciality) {
                $doctorSpeciality = new DoctorSpeciality;
                $doctorSpeciality->speciality = $speciality;
                $doctorSpeciality->doctor_id = $doctor->id;
                $doctorSpeciality->save();
            }
        }
        $user                   = new User();
        $user->name             = $doctor->name;
        $user->doctor_id          = $doctor->id;
        $user->email            = $doctor->email;
        $user->password         = Hash::make(123456789);
        $user->user_type        = 'DOCTOR';
        $user->status           = 1;
        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/users/' . $img);
            Image::make($image)->save($location);
            $user->image  = $img;
        }
        //$user->image            = $doctor->image;
        $user->save();

        return redirect()->route('doctor.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('backend.admin.pages.doctor.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $doctorSpecialityLists = new DoctorSpecialityList;
        return view('backend.admin.pages.doctor.edit',compact('doctor','doctorSpecialityLists'));
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
        $doctor = Doctor::find($id);
        $doctor->name           = $request->name;
        $doctor->phone          = $request->phone;
        $doctor->email          = $request->email;
        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/doctors/' . $img);
            Image::make($image)->save($location);
            $doctor->image = $img;
        }
        $doctor->address        = $request->address;
        $doctor->gender         = $request->gender;
        $doctor->salary         = $request->salary;
        $doctor->from           = $request->from;
        $doctor->to             = $request->to;
        $doctor->save();
        return redirect()->route('doctor.manage');
    }
    public function appoint(Request $request,$id)
    {
      //if( Route::has('login'))
        $doctor = Doctor::find($id);
        $appointDoctor = new AppointDoctor();
        $appointDoctor->doctor_id           = $id;
        $appointDoctor->doctor_name         = $doctor->name;
        $appointDoctor->patient_id          = Auth::user()->patient_id;
        $appointDoctor->patient_name        = Auth::user()->name;
        $appointDoctor->status              = 0;
        $appointDoctor->transaction_type    = $request->transaction_type;
        $appointDoctor->transaction_number  = $request->transaction_number;
        $appointDoctor->transaction_id      = $request->transaction_id;           
        $appointDoctor->save();
        return redirect()->route('doctor.all');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if ( !is_null( $doctor) )
        {
            if ( File::exists('backend/img/doctors/' . $doctor->image) )
            {
                File::delete('backend/img/doctors/' . $doctor->image);
            }
            $doctor->delete();
            $doctorSpecialities = DoctorSpeciality::where('doctor_id',$doctor->id)->get();
            foreach ($doctorSpecialities as $doctorSpeciality) 
            {
              $doctorSpeciality->delete();  
            }
            return redirect()->route('doctor.manage');
        }
        else
        {
            return redirect()->route('speciality.manage');
        }
    }
}
