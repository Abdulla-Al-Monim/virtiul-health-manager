<?php

namespace App\Http\Controllers\Backend;
use App\Models\Backend\DoctorSpecialityList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctoctSpeciality extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorSpecialityList = DoctorSpecialityList::orderBy('speciality','asc')->get();
        return view('backend.admin.pages.doctorSpeciality.manage',compact('doctorSpecialityList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.pages.doctorSpeciality.create');
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
            'speciality' => 'required|max:255',
            
        ],
        [
            'speciality.required' => 'Please Provide speciality',
        ]);
        $doctorSpecialityList = new DoctorSpecialityList();
        $doctorSpecialityList->speciality = $request->speciality;
        $doctorSpecialityList->save();
        return redirect()->route('speciality.manage');
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
        
        $doctorSpeciality = DoctorSpecialityList::find($id);
        if ( !is_null( $doctorSpeciality ) ){
            return view('backend.admin.pages.doctorSpeciality.edit', compact('doctorSpeciality'));
        }
        else{
            return route('speciality.manage');
        }
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
            'speciality' => 'required|max:255',
            
        ],
        [
            'speciality.required' => 'Please Provide speciality',
        ]);
        $doctorSpeciality= DoctorSpecialityList::find($id);;
        $doctorSpeciality->speciality = $request->speciality;
        $doctorSpeciality->save();
        return redirect()->route('speciality.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctorSpeciality = DoctorSpecialityList::find($id);
        if ( !is_null( $doctorSpeciality) ){
            $doctorSpeciality->delete();
            return redirect()->route('speciality.manage');
        }
        else{
            return redirect()->route('speciality.manage');
        }
    }
}
