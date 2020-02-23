<?php

namespace App\Http\Controllers\api\v1\superadmin;

use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class GenderController extends Controller
{
    public function index()
    {
        
        $gen = Gender::latest()->get();
        if($gen){
        return response()->json([
            'success'=>true,
            'message'=>'Gender List',
            'gender'=>$gen],200);
    }
    else{
        return response()->json([
            'success'=>true,
            'message'=>' Record Not Found'
        ],404);
      
    }
        //dd($purchase);
       // 
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
        $this->validate($request,[
            
            'gender' => 'required|min:3|max:15|unique:genders',

        ],
    [
        'gender.required'=>"The gender  field is required",
        'gender.min'=>"The gender  must be at least 3 characters",
        'gender.max'=>"The gender  must be at least 15 characters",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Gender();
    $list->gender = $request->gender;
    $list->created_by  =  Auth::guard('superadmin')->user()->superadminname;
        $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Gender Create Successfully',
           'value'=>$list
      ],201);
    } else {
        return response()->json([
            'success' => false,
             'message'=>'Record Not Found',
             
        ],404);
    }

       
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
    
        $info = Gender::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'gender' => $info], 200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'Record Not Found',
                'id' => $id], 404);
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

        $this->validate($request,[
            
            'gender' => 'required|min:3|max:15|unique:genders,gender,'.$id,

        ],
    [
        'gender.required'=>"The gender  field is required",
        'gender.min'=>"The gender  must be at least 3 characters",
        'gender.max'=>"The gender  must be at least 15 characters",
         ]);
      
       

        // if ($validator->fails()) {


        //     return response()->json([
        //      'success' =>false,
        //      'message'=>'Validation Fails',
        //      'errors'=>$validator->errors()->all()],422);
        // }
    
    
    
        $list = Gender::find($id);
        $list->gender = $request->gender;
        $list->created_by  =  Auth::guard('superadmin')->user()->superadminname;
       
        $list->update();
    
        if ($list->update()) {
          return response()->json([
              'success' => true,
               'message'=>'Record Update Successfully',
               'value'=>$list
          ],200);
        } else {
            return response()->json([
                'success' => false,
                 'message'=>'Record Update Faild',
                 
            ],404);
        }
    
           
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        if (Gender::destroy($id)) {
           
            return response()->json([
                'success' => true,
                'message'=>'Record Delete Successfully'
            ],200);
        } else {
            
            return response()->json([
                'success' => false,
                 'message'=>'Record Not Found',
                'id'=>$id],404);
        }
    
    }
}
