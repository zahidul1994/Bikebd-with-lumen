<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Bikebrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BikebrandController extends Controller
{
    public function index()
    {
        
        $bikebrand = Bikebrand::latest()->get();
        if($bikebrand){
        return response()->json([
            'success'=>true,
            'message'=>'Bikebrand List',
            'bikebrand'=>$bikebrand],200);
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
            
            'bikebrand' => 'required|min:3|max:15|unique:bikebrands',

        ],
    [
        'bikebrand.required'=>"The bike brand name field is required",
        'bikebrand.min'=>"The  bike brand name  must be at least 3 characters",
        'bikebrand.max'=>"The bike brand name  must be at least 15 characters",
        'bikebrand.unique'=>"The bike brand has already been taken.",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Bikebrand();
    $list->bikebrand = $request->bikebrand;
    $list->admin_id = Auth::guard('admin')->user()->id;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Bikebrand  Create Successfully',
           'bikebrand'=>$list
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
    
        $info = Bikebrand::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'bikebrand' => $info], 200);
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
            
            'bikebrand' => 'required|min:3|max:15|unique:bikebrands,bikebrand,'.$id,

        ],
    [
        'bikebrand.required'=>"The bike brand name field is required",
        'bikebrand.min'=>"The  bike brand name  must be at least 3 characters",
        'bikebrand.max'=>"The bike brand name  must be at least 15 characters",
        'bikebrand.unique'=>"The bike brand has already been taken.",
         ]);
      
       

        // if ($validator->fails()) {


        //     return response()->json([
        //      'success' =>false,
        //      'message'=>'Validation Fails',
        //      'errors'=>$validator->errors()->all()],422);
        // }
    
    
    
        $list = Bikebrand::find($id);
        $list->bikebrand = $request->bikebrand;
        $list->admin_id = Auth::guard('admin')->user()->id;
        $list->update();
    
        if ($list->update()) {
          return response()->json([
              'success' => true,
               'message'=>'Record Update Successfully',
               'bikebrand'=>$list
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
       
        if (Bikebrand::destroy($id)) {
           
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
