<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Betteryvoltage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BetteryvoltageController extends Controller
{
    public function index()
    {
        return Betteryvoltage::paginate(4);
      
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
            
            'bvoltage' => 'required|min:3|max:15|unique:betteryvoltages',

        ],
    [
        'bvoltage.required'=>"The  bvoltage name field is required",
        'bvoltage.min'=>"The bvoltage name  must be at least 3 characters",
        'bvoltage.max'=>"The bvoltage name  must be at least 15 characters",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Betteryvoltage();
    $list->bvoltage = $request->bvoltage;
    $list->admin_id =  Auth::guard('admin')->user()->id;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Bettery Voltage  Create Successfully',
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
    
        $info = Betteryvoltage::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'bvoltage' => $info], 200);
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
            
            'bvoltage' => 'required|min:3|max:15|unique:betteryvoltages,bvoltage,'.$id,

        ],
    [
        'bvoltage.required'=>"The  bvoltage name field is required",
        'bvoltage.min'=>"The bvoltage name  must be at least 3 characters",
        'bvoltage.max'=>"The bvoltage name  must be at least 15 characters",
         ]);
      
       

        // if ($validator->fails()) {


        //     return response()->json([
        //      'success' =>false,
        //      'message'=>'Validation Fails',
        //      'errors'=>$validator->errors()->all()],422);
        // }
    
    
    
        $list = Betteryvoltage::find($id);
        $list->bvoltage = $request->bvoltage;
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
       
        if (Betteryvoltage::destroy($id)) {
           
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
    public function bvoltagesearch(Request $request){
        $id =$request->s;
         if ($id !==null) {
            return Betteryvoltage::where('admin_id',Auth::guard('admin')->user()->id)->where('bvoltage','LIKE','%%%'.urldecode($id).'%%%')->paginate(3);
         }
        
    else {
        return $this->index();
    }
     }
}
