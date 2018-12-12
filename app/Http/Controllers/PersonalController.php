<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Personal;
use App\Cblood;
use App\Creligion;
use App\Cprovince;
use App\Cechelon;
use App\Cmstatus;


class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codes = [];
        $codes['bloods'] =  Cblood::all();
        $codes['religions'] =  Creligion::all();
        $codes['provinces'] =  Cprovince::all();
        $codes['echelons'] = Cechelon::all();
        $codes['mstatuses'] = Cmstatus::all();
         return view('personal.test_create_form', compact('codes'));
    }

    public function uploadfile()
    {
        $attribute = request()->validate([
            'person_image' => ['required', 'mimes:jpeg,bmp,png', 'max:10240']
        ]);
        //return Redirect::back()->with(compact('attribute'));

        dd(request()->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     'prename_th' => ['required'],
        //     'name_th' => ['required'],
        //     'lname_th' => ['required'],
        //     'sex' => ['required']
        // ]);
        //dd($request->all());
        $p_obj = new Personal;

        
        // if(request('input_image')){
        //     //$input = unset(request('input_image'));
        //     $personal = Personal::create($request->except(['input_image']));
        //     $p_obj->storeImg(request('input_image'),$personal);
        // }else{
        //     $personal = Personal::create($request->all());
        // }
        
        DB::beginTransaction();
        try{
            if(request('input_image')){
                $personal = Personal::create($request->except(['input_image']));
                $p_obj->storeImg(request('input_image'),$personal);
            }else{
                $personal = Personal::create($request->all());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        
        return redirect('/personal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonalInfo  $personalInfo
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalInfo $personalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonalInfo  $personalInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalInfo $personalInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonalInfo  $personalInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalInfo $personalInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonalInfo  $personalInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalInfo $personalInfo)
    {
        //
    }
}
