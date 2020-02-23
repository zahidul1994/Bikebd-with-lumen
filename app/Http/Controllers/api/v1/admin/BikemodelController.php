<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Bikemodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BikemodelController extends Controller
{
    public function index()
    {
        
        $location = Bikemodel::latest()->get();
        if($location){
        return response()->json([
            'success'=>true,
            'message'=>'Bikemodel List',
            'bikemodel'=>$location],200);
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
            
            'bikemodel' => 'required|min:3|max:15|unique:bikemodels',

        ],
    [
        'bikemodel.required'=>"The  bike Model name field is required",
        'bikemodel.min'=>"The bike model name  must be at least 3 characters",
        'bikemodel.max'=>"The bike model  name  must be at least 15 characters",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Bikemodel();
    $list->bikemodel = $request->bikemodel;
    $list->admin_id =  Auth::guard('admin')->user()->id;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Bike model  Create Successfully',
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
    
        $info = Bikemodel::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'bikemodel' => $info], 200);
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
            
            'bikemodel' => 'required|min:3|max:15|unique:bikemodels,bikemodel,'.$id,

        ],
    [
        'bikemodel.required'=>"The  bike model name field is required",
        'bikemodel.min'=>"The bike model name  must be at least 3 characters",
        'bikemodel.max'=>"The bike model name  must be at least 15 characters",
         ]);
      
       

        // if ($validator->fails()) {


        //     return response()->json([
        //      'success' =>false,
        //      'message'=>'Validation Fails',
        //      'errors'=>$validator->errors()->all()],422);
        // }
    
    
    
        $list = Bikemodel::find($id);
        $list->bikemodel = $request->bikemodel;
        $list->admin_id =  Auth::guard('admin')->user()->id;
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
       
        if (Bikemodel::destroy($id)) {
           
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
