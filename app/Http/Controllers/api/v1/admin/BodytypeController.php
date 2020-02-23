<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Bodytype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BodytypeController extends Controller
{
    public function index()
    {
        
        $bodytype = Bodytype::latest()->get();
        if($bodytype){
        return response()->json([
            'success'=>true,
            'message'=>'Bodttype List',
            'bodytype'=>$bodytype],200);
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
            
            'bodytype' => 'required|min:3|max:15|unique:bodytypes',

        ],
    [
        'bodytype.required'=>"The body type name field is required",
        'bodytype.min'=>"The  body type name  must be at least 3 characters",
        'bodytype.max'=>"The body type name  must be at least 15 characters",
        'bodytype.unique'=>"The body type has already been taken.",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Bodytype();
    $list->bodytype = $request->bodytype;
    $list->admin_id = Auth::guard('admin')->user();
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Bodytype  Create Successfully',
           'bodytype'=>$list
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
    
        $info = Bodytype::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'bodytype' => $info], 200);
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
            
            'bodytype' => 'required|min:3|max:15|unique:bodytypes',

        ],
    [
        'bodytype.required'=>"The bodytype name field is required",
        'bodytype.min'=>"The  bodytype name  must be at least 3 characters",
        'bodytype.max'=>"The bodytype name  must be at least 15 characters",
        'bodytype.unique'=>"The bodytype has already been taken.",
         ]);
   
    
    
        $list = Bodytype::find($id);
        $list->bodytype = $request->bodytype;
        $list->admin_id = Auth::guard('admin')->user();
        $list->update();
    
        if ($list->update()) {
          return response()->json([
              'success' => true,
               'message'=>'Record Update Successfully',
               'bodytype'=>$list
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
       
        if (Bodytype::destroy($id)) {
           
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
