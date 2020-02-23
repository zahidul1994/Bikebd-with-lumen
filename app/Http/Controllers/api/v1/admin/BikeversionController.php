<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Bikeversion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BikeversionController extends Controller
{
    public function index()
    {
        
        $version = Bikeversion::latest()->get();
        if($version){
        return response()->json([
            'success'=>true,
            'message'=>'Bikeversion List',
            'bikeversion'=>$version],200);
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
            
            'bikeversion' => 'required|min:3|max:15|unique:bikeversions',

        ],
    [
        'bikeversion.required'=>"The bike version name field is required",
        'bikeversion.min'=>"The  bike version name  must be at least 3 characters",
        'bikeversion.max'=>"The bike version name  must be at least 15 characters",
        'bikeversion.unique'=>"The bike version has already been taken.",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Bikeversion();
    $list->bikeversion = $request->bikeversion;
    $list->admin_id = Auth::guard('admin')->user()->id;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Bikeversion  Create Successfully',
           'version'=>$list
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
    
        $info = Bikeversion::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'bikeversion' => $info], 200);
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
            
            'bikeversion' => 'required|min:3|max:15|unique:bikeversions,bikeversion,'.$id,

        ],
    [
        'bikeversion.required'=>"The  bike version name field is required",
        'bikeversion.min'=>"The bike version name  must be at least 3 characters",
        'bikeversion.max'=>"The bike version name  must be at least 15 characters",
        'bikeversion.unique'=>"The bike version has already been taken.",
         ]);
      
       

        // if ($validator->fails()) {


        //     return response()->json([
        //      'success' =>false,
        //      'message'=>'Validation Fails',
        //      'errors'=>$validator->errors()->all()],422);
        // }
    
    
    
        $list = Bikeversion::find($id);
        $list->bikeversion = $request->bikeversion;
        $list->admin_id = Auth::guard('admin')->user()->id;
        $list->update();
    
        if ($list->update()) {
          return response()->json([
              'success' => true,
               'message'=>'Record Update Successfully',
               'bikeversion'=>$list
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
       
        if (Bikeversion::destroy($id)) {
           
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
