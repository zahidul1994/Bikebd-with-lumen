<?php

namespace App\Http\Controllers\api\v1\user;

use App\Car;
use App\Bike;
use App\Accessories;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
       
    public function index(Request $request)
    {  if($request->ajax()){
        $bikepost=Bike::with('category','bikeimage','user',)->where('active',1)->latest()->get();
       
        if($bikepost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'allbikepost'=>$bikepost],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
     }
    }
    return view('home');
}

public function newcar(Request $request)
{  if($request->ajax()){
    $carpost=Car::with('category','bikeimage','user',)->where('active',1)->latest()->get();
   
    if($carpost){
    return response()->json([
        'success'=>true,
        'message'=>'Record Found',
        'allcarpost'=>$carpost],200);
 }
 else{
     return response()->json([
         'success'=>false,
         'message'=>'Record Not  Found',
        ],404);
 }
}
return view('home');
}
      public function show(Request $request, $id)
    {
        if($request->ajax()){
        $bikepost=Bike::with('category','bikeimage','bikebrand','bikemodel','modelyear','bikeversion','user')->where('_id',$id)->get();
       
        if($bikepost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'bikedetails'=>$bikepost],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
     }
    }
    return view('home');
}
    
    public function car(Request $request)
    {
        if($request->ajax()){

        $carpost=Car::with('category','carimage','carbrand','carmodel','modelyear','carversion','user')->where('active',1)->latest()->get();
       
        if($carpost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'allcarpost'=>$carpost],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
     }
    }
    return view('home');
}
  
public function cardetails(Request $request,$id)
{
    if($request->ajax()){
    
        $caredetails=Car::with('category','carimage','user','carbrand','carmodel','modelyear','carversion','bodytype')->where('active',1)->latest()->get();
       
        if($caredetails){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'cardetails'=>$caredetails],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
     }
    
}
return view('home');
}
  
public function accessories(Request $request)
{
    if($request->ajax()){

    $accessoriespost=Accessories::with('category','accessoriesimge','accessoriestype','user')->where('active',1)->latest()->get();
   
    if($accessoriespost){
    return response()->json([
        'success'=>true,
        'message'=>'Record Found',
        'allaccessoriespost'=>$accessoriespost],200);
 }
 else{
     return response()->json([
         'success'=>false,
         'message'=>'Record Not  Found',
        ],404);
 }
}
return view('home');
}

   
}
