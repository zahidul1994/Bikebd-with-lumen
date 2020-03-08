<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Ftyre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FtyreController extends Controller
{
    public function index()
    {
        return Ftyre::paginate(4);
      
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
            
            'ftyre' => 'required|min:3|max:50|unique:ftyres',

        ],
    [
        'ftyre.required'=>"The  ftyre name field is required",
        'ftyre.min'=>"The ftyre name  must be at least 3 characters",
        'ftyre.max'=>"The ftyre name  must be at least 15 characters",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Ftyre();
    $list->ftyre = $request->ftyre;
    $list->admin_id =  Auth::guard('admin')->user()->id;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Front Tyre  Create Successfully',
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
    
        $info = Ftyre::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'ftyre' => $info], 200);
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
            
            'ftyre' => 'required|min:3|max:50|unique:ftyres,ftyre,'.$id,

        ],
    [
        'ftyre.required'=>"The  ftyre name field is required",
        'ftyre.min'=>"The ftyre name  must be at least 3 characters",
        'ftyre.max'=>"The ftyre name  must be at least 15 characters",
         ]);
      
       

        // if ($validator->fails()) {


        //     return response()->json([
        //      'success' =>false,
        //      'message'=>'Validation Fails',
        //      'errors'=>$validator->errors()->all()],422);
        // }
    
    
    
        $list = Ftyre::find($id);
        $list->ftyre = $request->ftyre;
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
       
        if (Ftyre::destroy($id)) {
           
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
