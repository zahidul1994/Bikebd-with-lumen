<?php

namespace App\Http\Controllers\api\v1\superadmin;

use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staus = Status::latest()->get();
        if ($staus) {
            return response()->json([
                'success' => true,
                'message' => 'Record Found',
                'status' => $staus
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'Message' => 'Record Not Found.'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request,[
            
            'status_name' => 'required|min:3|max:15|unique:statuses',

        ],
    [
        'status_name.required'=>"The status  field is required",
        'status_name.min'=>"The status  must be at least 3 characters",
        'status_name.max'=>"The status  must be at least 15 characters",
         ]);

        // if ($validator->fails()) {


        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Validation Fails',
        //         'errors' => $validator->errors()->all()
        //     ], 422);
        // }

        $list = new Status();
        $list->status_name = $request->status_name;
        $list->created_by  =  Auth::guard('superadmin')->user()->superadminname;
        $list->superadmin_id =  Auth::guard('superadmin')->user()->id;
        $list->save();
        if ($list->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Data Create Success',
                'value' => $list
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Create Fails',
            ], 404);
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
    $info = Status::find($id);
    if($info){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'status' => $info], 200);
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
            
            'status_name' => 'required|min:3|max:15|unique:statuses,status_name,' . $id,

        ],
    [
        'status_name.required'=>"The status  field is required",
        'status_name.min'=>"The status  must be at least 3 characters",
        'status_name.max'=>"The status  must be at least 15 characters",
         ]);



        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Validation Fails',
        //         'errors' => $validator->errors()->all()
        //     ], 422);
        // }
        $list = Status::find($id);
        $list->status_name = $request->status_name;
        $list->created_by  =  Auth::guard('superadmin')->user()->superadminname;
        $list->superadmin_id =  Auth::guard('superadmin')->user()->id;
        $list->update();
       
        if ($list->update()) {
            return response()->json([
                'success' => true,
                 'message'=>'Record Update Successfully',
                 'status'=>$list
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
        if (Status::destroy($id)) {
           
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
