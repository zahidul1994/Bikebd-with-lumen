<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Cc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CcController extends Controller
{
    public function index()
    {
        
        return Cc::paginate(4);
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
            
            'cc' => 'required|min:3|max:15|unique:ccs',

        ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Cc();
    $list->cc = $request->cc;
    $list->admin_id = Auth::guard('admin')->user()->id;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
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
    
        $info = Cc::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'cclist' => $info], 200);
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
            
            'cc' => 'required|min:3|max:15|unique:ccs,cc,'.$id,

         ]);
      
       

        // if ($validator->fails()) {


        //     return response()->json([
        //      'success' =>false,
        //      'message'=>'Validation Fails',
        //      'errors'=>$validator->errors()->all()],422);
        // }
    
    
    
        $list = Cc::find($id);
        $list->cc = $request->cc;
        $list->admin_id = Auth::guard('admin')->user()->id;
        $list->update();
    
        if ($list->update()) {
          return response()->json([
              'success' => true,
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
       
        if (Cc::destroy($id)) {
           
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
