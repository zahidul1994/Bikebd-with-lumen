<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Bike;
use App\Category;
use App\Location;
use App\Bikebrand;
use App\Bikeimage;
use App\Bikemodel;
use App\Modelyear;
use App\Bikeversion;
use App\Sublocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikepost=Bike::with('category','bikeimage')->latest()->get();
       
        if($bikepost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'biketlist'=>$bikepost],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
     }
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
       // return response()->json($request->allimage());
   
        $this->validate($request,[
            //'division_id' => 'required',
            //'subdivision_id' => 'required',
            'category' => 'required',
            // 'condition' => 'required',
            'biketype' => 'required',
            'bikebrand' => 'required',
            'bikemodel' => 'required',
            'bikeversion' => 'required',
            'bikemodelyear' => 'required',
            'startingmethod' => 'required',
            'engine_capacity' => 'required|min:6|max:300',
            'description' => 'required|min:20|max:300',
            'price' => 'required|numeric|min:2|max:500000',
            // 'contactdetails' => 'required|min:6|max:30',
            // 'phone' => 'required|numeric|digits:11',
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
        ],
        [
           
            'phone.required' => 'The Phone Status field is required.',
            // 'category.required' => 'The Category Status field is required.',
            'location.required' => 'The Location  field is required.',
            'biketype.required' => 'The bike type  field is required.',
            'condition.required' => 'The condition  field is required.',
            'bikebrand.required' => 'The bike brand  field is required.',
            'bikeversion.required' => 'The bike version  field is required.',
            'bikemodelyear.required' => 'The bike model year  field is required.',
            'bikemodel.required' => 'The bike model  field is required.',
            'engine_capacity.required' => 'The engine capacity  field is required.',
            
        ]);
       

    $list = new Bike();
    $list->user_id  = app('auth')->user()->id;
    $list->admin_id =app('auth')->user()->admin_id; 
    $list->category_id =$request->category;
    $list->biketype =$request->biketype;
    $list->bikebrand_id =$request->bikebrand;
    $list->bikemodel_id =$request->bikemodel;
    $list->bikeversion_id =$request->bikeversion;
    $list->bikemodelyear_id =$request->bikemodelyear;
    $list->startingmethod=$request->startingmethod;
    $list->engine_capacity = $request->engine_capacity;
    $list->description = $request->description;
    $list->price = $request->price;
    $list->negotiable = $request->negotiable?:"false";
   $list->active=2;   
    $list->save();

    if ($list->id) {

            $image=$request->allimage;
            foreach($image as  $value){
                //return response($value['path']);
            $strpos = strpos($value['path'],';');
                $sub = substr($value['path'],0,$strpos);
                $ex = explode('/',$sub)[1];
                $rand = mt_rand(100000, 999999);
                $name = time() . "_" .app('auth')->user()->id. "_" . $rand . "." .$ex;
                $img = Image::make($value['path'])->resize(200, 200);
                $upload_path = public_path()."/images/bikepostimage/";
                $img->save($upload_path.$name);
                $image = new Bikeimage();
                $image->user_id  = app('auth')->user()->id;
                $image->post_id =$list['id'];
                $image->image =$name;
                $image->save();
        }
         

      
    if ($image->id) {
      return response()->json([
          'success' => true,
           'message'=>'Post Create Successfully',
           
      ],201);
    } else {
        return response()->json([
            'success' => false,
             'message'=>'Post Create Failed',
             
        ],404);
    }
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
        $bikepost=Bike::with('category','bikeimage')->where('_id',$id)->get()->first();
       
        if($bikepost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'bikepostdetails'=>$bikepost],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Bikeimage::where('post_id',$id)->get();
        foreach ($image as $img ){
        $imagepath=public_path('/images/bikepostimage/').$img->image;
       if(file_exists( $imagepath) && $img->image !='not-found.jpg' ){
           unlink($imagepath);

       }
    }
       $forcedele= Bike::where('_id', $id)->delete();
       if($forcedele == true) {
           
            return response()->json([
                'success' => true,
                'message'=>'Data Delete Success'
            ],200);
        } else {
            
            return response()->json([
                'success' => false,
                'message'=>'Record Not Found',
                'id'=>$id  
              ],404);
        }
    
    }
    
    //for dropown in post add
    public function category()
    {
        
        $category = Category::latest()->get();
        if($category){
        return response()->json([
            'success'=>true,
            'message'=>'Category List',
            'category'=>$category],200);
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


    public function brand()
    {
        
        $brand = Bikebrand::latest()->get();
        if($brand){
        return response()->json([
            'success'=>true,
            'message'=>'Brand List',
            'bikebrand'=>$brand],200);
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
   
    public function model()
    {
        
        $bikemodel = Bikemodel::latest()->get();
        if($bikemodel){
        return response()->json([
            'success'=>true,
            'message'=>'Bikemodel List',
            'bikemodel'=>$bikemodel],200);
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

    public function version()
    {
        
        $bikeversion = Bikeversion::latest()->get();
        if($bikeversion){
        return response()->json([
            'success'=>true,
            'message'=>'Bikeversion List',
            'bikeversion'=>$bikeversion],200);
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

    public function modelyear()
    {
        
        $modelyear = Modelyear::latest()->get();
        if($modelyear){
        return response()->json([
            'success'=>true,
            'message'=>'Modelyear List',
            'modelyear'=>$modelyear],200);
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
    //for dropown in post add

    public function division()
    {
        
        $location = Location::latest()->get();
        if($location){
        return response()->json([
            'success'=>true,
            'message'=>'Division List',
            'division'=>$location],200);
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
    public function subdivisionlist()
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
    public function subdivision($id)
    {
        
        $location = Sublocation::where('division_id', $id)->get();
        if($location){
        return response()->json([
            'success'=>true,
            'message'=>'Sub-division List Found',
            'subdivision'=>$location],200);
    }
    else{
        return response()->json([
            'success'=>false,
            'message'=>' Record Not Found'
        ],404);
      
    }
        //dd($purchase);
       // 
    }
// account active inactive start
public function setapproval(Request $request){
       
    $id=$request->id;
     $activestatus = Bike::find($id);
     $activestatus->active=2;
     $activestatus->save();
     if($activestatus->save()) {
        
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
 
 public function setinactive(Request $request){
    
    $id=$request->id;
     $activestatus = Bike::find($id);
     $activestatus->active=1;
     $activestatus->save();
     if($activestatus->save()) {
        
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }

 // account active inactive area end

   
}
