<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Location;
use App\Sublocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SublocationController extends Controller
{
    public function index()
    {
        
        $location = Sublocation::with('location')->latest()->get();
        if($location){
        return response()->json([
            'success'=>true,
            'message'=>'Sub-division List',
            'subdivision'=>$location],200);
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
            
            'division_id' => 'required',
            'subdivisionname' => 'required|min:3|max:15|unique:sublocations',

        ],
    [
        'division_id.required'=>"The  division name field is required",
        'subdivisionname.required'=>"The  sub-division name field is required",
        'subdivisionname.min'=>"The sub-division name  must be at least 3 characters",
        'subdivisionname.max'=>"The sub-division name  must be at least 15 characters",
        'subdivisionname.unique'=>"The sub-divisionname has already been taken.",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Sublocation();
    $list->division_id = $request->division_id;
    $list->subdivisionname = $request->subdivisionname;
    $list->admin_id =  Auth::guard('admin')->user()->id;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Sub-Division  Create Successfully',
           'sublocation'=>$list
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
    
        $info = Sublocation::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'subdivision' => $info], 200);
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

    //     $this->validate($request,[
            
    //         'divisionname' => 'required|min:3|max:15|unique:locations,divisionname,'.$id,

    //     ],
    // [
    //     'divisionname.required'=>"The  division name field is required",
    //     'divisionname.min'=>"The division name  must be at least 3 characters",
    //     'divisionname.max'=>"The division name  must be at least 15 characters",
    //      ]);
      
       

    //     // if ($validator->fails()) {


    //     //     return response()->json([
    //     //      'success' =>false,
    //     //      'message'=>'Validation Fails',
    //     //      'errors'=>$validator->errors()->all()],422);
    //     // }
    
    
    
    //     $list = Location::find($id);
    //     $list->divisionname = $request->divisionname;
    //     $list->admin_id =  Auth::guard('admin')->user()->id;
    //     $list->update();
    $this->validate($request,[
            
        'division_id' => 'required',
        'subdivisionname' => 'required|min:3|max:15|unique:sublocations,subdivisionname,'.$id,

    ],
[
    'division_id.required'=>"The  division name field is required",
    'subdivisionname.required'=>"The  sub-division name field is required",
    'subdivisionname.min'=>"The sub-division name  must be at least 3 characters",
    'subdivisionname.max'=>"The sub-division name  must be at least 15 characters",
    'subdivisionname.unique'=>"The sub-divisionname has already been taken.",
     ]);

// if ($validator->fails()) {


//     return response()->json([
//      'success' =>false,
//      'message'=>'Validation Fails',
//      'errors'=>$validator->errors()->all()],401);
// }



$list = Sublocation::find($id);
$list->division_id = $request->division_id;
$list->subdivisionname = $request->subdivisionname;
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
       
        if (Sublocation::destroy($id)) {
           
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
