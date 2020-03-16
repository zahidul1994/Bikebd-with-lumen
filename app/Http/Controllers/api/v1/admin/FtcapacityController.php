<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Ftcapacity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FtcapacityController extends Controller
{
    public function index()
    {
        return Ftcapacity::paginate(3);
      
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
            
            'ftcapacity' => 'required|min:3|max:15|unique:ftcapacities',

        ],
    [
        'ftcapacity.required'=>"The  ftcapacity  field is required",
        'ftcapacity.min'=>"The gear ftcapacity  must be at least 3 characters",
        'ftcapacity.max'=>"The gear ftcapacity  must be at least 15 characters",
         ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }



    $list = new Ftcapacity();
    $list->ftcapacity = $request->ftcapacity;
    $list->admin_id =  Auth::guard('admin')->user()->id;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Ftcapacity  Create Successfully',
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
    
        $info = Ftcapacity::find($id);
       // console.log(ftcapacity);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'ftcapacity' => $info], 200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'Record Not Found Tipu',
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
            
            'ftcapacity' => 'required|min:1|max:15|unique:ftcapacities,ftcapacity,'.$id,

        ],
    [
        'ftcapacity.required'=>"The  ftcapacity field is required",
        'ftcapacity.min'=>"The ftcapacity must be at least 1 characters",
        'ftcapacity.max'=>"The ftcapacity  must be at least 15 characters",
         ]);
      
       

        // if ($validator->fails()) {


        //     return response()->json([
        //      'success' =>false,
        //      'message'=>'Validation Fails',
        //      'errors'=>$validator->errors()->all()],422);
        // }
    
    
    
        $list = Ftcapacity::find($id);
        $list->ftcapacity = $request->ftcapacity;
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
       
        if (Ftcapacity::destroy($id)) {
           
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
    public function ftcapacitysearch(Request $request){
        $id =$request->s;
         if ($id !==null) {
            return Ftcapacity::where('admin_id',Auth::guard('admin')->user()->id)->where('ftcapacity','LIKE','%%%'.urldecode($id).'%%%')->paginate(3);
         }
        
    else {
        return $this->index();
    }
     }
}
