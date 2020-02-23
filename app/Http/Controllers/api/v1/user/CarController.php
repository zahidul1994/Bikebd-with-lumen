<?php

namespace App\Http\Controllers\api\v1\user;

use auth;
use App\Car;
use App\Bike;
use App\Bodytype;
use App\Carimage;
use App\Category;
use App\Carbrand;
use App\Bikeimage;
use App\Carmodel;
use App\Modelyear;
use App\Carversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carepost=Car::with('category','carimage')->where('user_id', app('auth')->user()->id)->latest()->get();
       //dd(carepost);
        if($carepost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'carpostlist'=>$carepost],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
     }
    }
    
    public function postusedcar()
    {
        //
    }  
    
    public function postreconditioncar()
    {
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
            'category' => 'required|min:3|max:80',
            //'condition' => 'required',
            // 'biketype' => 'required',
            'carbrand' => 'required|min:3|max:30',
            'trim' => 'required|min:3|max:30',
            'bodytype' => 'required',
            'carmodel' => 'required|min:6|max:30',
            'carversion' => 'required|min:6|max:30',
            'bikemodelyear' => 'required|min:6|max:30',
            // 'startingmethod' => 'required|min:6|max:30',
            'engine_capacity' => 'required',
            'description' => 'required|min:6|max:300',
            'price' => 'required',
           
        
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
        ],
        [
           
            'phone.required' => 'The phone  field is required.',
            'category.required' => 'The category  field is required.',
            // 'location.required' => 'The location  field is required.',
            'trim.required' => 'The trim  field is required.',
            'bodytype.required' => 'The body type  field is required.',
            //'condition.required' => 'The condition  field is required.',
            // 'biketype.required' => 'The bike type  field is required.',
            'carbrand.required' => 'The car brand  field is required.',
            'carversion.required' => 'The car version  field is required.',
            'carmodelyear.required' => 'The car model year  field is required.',
            'caremodel.required' => 'The car model  field is required.',
            'price.required' => 'The price  field is required.',
            'engine_capacity.required' => 'The engine capacity  field is required.',
            // 'gender.required' => 'The gender field is required.',
            // 'status.required' => 'The status field is required.',
            // 'contactdetails.required' => 'The contact details field is required.'
        ]);
        

    $list = New Car();
    $list->user_id  = app('auth')->user()->id;
    $list->admin_id =app('auth')->user()->admin_id; 
    $list->newused = 'new';
    $list->category_id =$request->category;
    // $list->biketype =$request->biketype;
    $list->fueltype =$request->fueltype;
    $list->transmission =$request->transmission;
    $list->carbrand_id =$request->carbrand;
    $list->bodytype_id =$request->bodytype;
    $list->carmodel_id =$request->carmodel;
    $list->carversion_id =$request->carversion;
    $list->bikemodelyear_id =$request->bikemodelyear;
    // $list->startingmethod=$request->startingmethod;
    $list->registration=$request->registration;
    $list->fueltype=$request->checkedNames;
    // $list->kilometer_run = $request->kilometer_run;
    $list->engine_capacity = $request->engine_capacity;
    $list->description =$request->description;
    $list->trim =$request->trim;
    $list->price = $request->price;
    $list->negotiable = $request->negotiable?:"false";  
    $list->active = 2; 
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
            $upload_path = public_path()."/images/carpostimage/";
            $img->save($upload_path.$name);
            $image = new Carimage();
            $image->user_id  = app('auth')->user()->id;
            $image->post_id =$list['id'];
            $image->image =$name;
            $image->save();
    }
     

  
if ($image->id) {
      return response()->json([
          'success' => true,
           'message'=>'Post Create Successfully',
           'car'=>$list
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
        {
            $caredetails=Car::with('category','carimage','user','carbrand','carmodel','modelyear','carversion','bodytype')->where('_id',$id)->get();
           
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car=Car::with('carimage')->find($id);
        return response()->json([
            'success'=>true,
            'message'=>"Record Found",
            'carinfo'=>$car
        ],200);
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
        if ($request->has('used')){
            $this->validate($request,[
                'category_id' => 'required|min:3|max:80',    //for used edit car
                'carbrand_id' => 'required|min:3|max:30',
                'trim' => 'required|min:3|max:30',
                //'bodytype' => 'required',
                'condtion' => 'required',
                'transmission' => 'required',
                'carmodel_id' => 'required|min:6|max:30',
                'carversion_id' => 'required|min:6|max:30',
                'bikemodelyear_id' => 'required|min:6|max:30',
                'engine_capacity' => 'required',
                'description' => 'required|min:6|max:300',
                'price' => 'required',
               
            
              // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
            ],
            [
               
             
                'category_id.required' => 'The category  field is required.',
                // 'location.required' => 'The location  field is required.',
                'trim.required' => 'The trim  field is required.',
                'bodytype.required' => 'The body type  field is required.',
                'condition.required' => 'The condition  field is required.',
                 'transmission.required' => 'The transmission  field is required.',
                'carbrand_id.required' => 'The car brand  field is required.',
                'carversion_id.required' => 'The car version  field is required.',
                'bikemodelyear_id.required' => 'The car model year  field is required.',
                'carmodel_id.required' => 'The car model  field is required.',
                'price.required' => 'The price  field is required.',
                'engine_capacity.required' => 'The engine capacity  field is required.',
                // 'gender.required' => 'The gender field is required.',
                // 'status.required' => 'The status field is required.',
                // 'contactdetails.required' => 'The contact details field is required.'
            ]);
            
    
        $list = New Car();
        $list->user_id  = app('auth')->user()->id;
        $list->admin_id =app('auth')->user()->admin_id; 
        $list->category_id =$request->category_id;
        $list->condition = $request->condition;
        // $list->biketype =$request->biketype;
        $list->fueltype =$request->fueltype;
        $list->transmission =$request->transmission;
        $list->carbrand_id =$request->carbrand_id;
        $list->bodytype_id =$request->bodytype_id;
        $list->carmodel_id =$request->carmodel_id;
        $list->carversion_id =$request->carversion_id;
        $list->bikemodelyear_id =$request->bikemodelyear_id;
        // $list->startingmethod=$request->startingmethod;
        $list->registration=$request->registration;
        $list->fueltype=$request->checkedNames;
        // $list->kilometer_run = $request->kilometer_run;
        $list->engine_capacity = $request->engine_capacity;
        $list->description =$request->description;
        $list->trim =$request->trim;
        $list->price = $request->price;
        $list->negotiable = $request->negotiable?:"false";  
        $list->active = 2; 
        $list->save();
        if ($list->id) {
    
                $image=$request->allimage;
                foreach ($image as  $value){
                //return response($value['path']);
                $strpos = strpos($value['path'],';');
                $sub = substr($value['path'],0,$strpos);
                $ex = explode('/',$sub)[1];
                $rand = mt_rand(100000, 999999);
                $name = time() . "_" .app('auth')->user()->id. "_" . $rand . "." .$ex;
                $img = Image::make($value['path'])->resize(200, 200);
                $upload_path = public_path()."/images/carpostimage/";
                $img->save($upload_path.$name);
                $image = new Carimage();
                $image->user_id  = app('auth')->user()->id;
                $image->post_id =$list['id'];
                $image->image =$name;
                $image->save();
        }
         
    
      
    if ($image->id) {
          return response()->json([
              'success' => true,
               'message'=>'Post Create Successfully',
               'car'=>$list
          ],201);
        } else {
            return response()->json([
                'success' => false,
                 'message'=>'Post Create Failed',
                 
            ],404);
        }
    }
        
}
else{
    $this->validate($request,[
        'category_id' => 'required|min:3|max:80',   //for new edit car
        'carbrand_id' => 'required|min:3|max:30',
        'trim' => 'required|min:3|max:30',
        //'bodytype' => 'required',
        'carmodel_id' => 'required|min:6|max:30',
        'carversion_id' => 'required|min:6|max:30',
        'bikemodelyear_id' => 'required|min:6|max:30',
        'engine_capacity' => 'required',
        'description' => 'required|min:6|max:300',
        'price' => 'required',
       
    
      // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
    ],
    [
       
     
        'category_id.required' => 'The category  field is required.',
        // 'location.required' => 'The location  field is required.',
        'trim.required' => 'The trim  field is required.',
        //'bodytype.required' => 'The body type  field is required.',
        //'condition.required' => 'The condition  field is required.',
        // 'biketype.required' => 'The bike type  field is required.',
        'carbrand_id.required' => 'The car brand  field is required.',
        'carversion_id.required' => 'The car version  field is required.',
        'bikemodelyear_id.required' => 'The car model year  field is required.',
        'carmodel_id.required' => 'The bike car  field is required.',
        'price.required' => 'The price  field is required.',
        'engine_capacity.required' => 'The engine capacity  field is required.',
        // 'gender.required' => 'The gender field is required.',
        // 'status.required' => 'The status field is required.',
        // 'contactdetails.required' => 'The contact details field is required.'
    ]);
    

$list = Car::find($id);
$list->user_id  = app('auth')->user()->id;
$list->admin_id =app('auth')->user()->admin_id; 
$list->category_id =$request->category_id;
$list->condition = $request->condition;
// $list->biketype =$request->biketype;
$list->fueltype =$request->fueltype;
$list->transmission =$request->transmission;
$list->carbrand_id =$request->carbrand_id;
$list->bodytype_id =$request->bodytype_id;
$list->carmodel_id =$request->carmodel_id;
$list->carversion_id =$request->carversion_id;
$list->bikemodelyear_id =$request->bikemodelyear_id;
// $list->startingmethod=$request->startingmethod;
$list->registration=$request->registration;
$list->fueltype=$request->checkedNames;
// $list->kilometer_run = $request->kilometer_run;
$list->engine_capacity = $request->engine_capacity;
$list->description =$request->description;
$list->trim =$request->trim;
$list->price = $request->price;
$list->negotiable = $request->negotiable?:"false";  
$list->active = 2; 
$list->save();
if ($list->id) {

        $image=$request->carimage1;
        if($image ){
        foreach ($image as  $value){
        //return response($value['path']);
        $strpos = strpos($value['path'],';');
        $sub = substr($value['path'],0,$strpos);
        $ex = explode('/',$sub)[1];
        $rand = mt_rand(100000, 999999);
        $name = time() . "_" .app('auth')->user()->id. "_" . $rand . "." .$ex;
        $img = Image::make($value['path'])->resize(200, 200);
        $upload_path = public_path()."/images/carpostimage/";
        $img->save($upload_path.$name);
        $image = new Carimage();
        $image->user_id  = app('auth')->user()->id;
        $image->post_id =$list['id'];
        $image->image =$name;
        $image->save();
}
}
else{
    return response()->json([
        'success' => true,
         'message'=>'Post Create Successfully',
         
    ],201);
 }
 


if ($image->id) {
  return response()->json([
      'success' => true,
       'message'=>'Post Create Successfully',
       'car'=>$list
  ],201);
} else {
    return response()->json([
        'success' => false,
         'message'=>'Post Create Failed',
         
    ],404);
}
}
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
        $image=Carimage::where('post_id',$id)->get();
        foreach ($image as $img ){
        $imagepath=public_path('/images/carpostimage/').$img->image;
       if(file_exists( $imagepath) && $img->image !='not-found.jpg' ){
           unlink($imagepath);
           $ide=Carimage::find($img->id);
           $ide->delete();
           

       }
    }
       $forcedele= Car::where('_id', $id)->forcedelete();
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
    
    public function deletecarimage($id)
    {
        $img=Carimage::find($id);
     
        $imagepath=public_path('/images/carpostimage/').$img->image;
       if(file_exists( $imagepath) && $img->image !='not-found.jpg' ){
           unlink($imagepath);
           $ide=Carimage::find($id);
           $ide->delete();
           return response()->json([
            'success' => true,
            
        ],200);

       }
    }
      

    public function bodytype()
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

public function carversion()
{
    
    $carversion = Carversion::latest()->get();
    if($carversion){
    return response()->json([
        'success'=>true,
        'message'=>'Carversion List',
        'carversion'=>$carversion],200);
}
else{
    return response()->json([
        'success'=>true,
        'message'=>' Record Not Found'
    ],404);
  
}
}
public function carmodel()
{
    
    $carmodel = Carmodel::latest()->get();
    if($carmodel){
    return response()->json([
        'success'=>true,
        'message'=>'Carmodel List',
        'carmodel'=>$carmodel],200);
}
else{
    return response()->json([
        'success'=>true,
        'message'=>' Record Not Found'
    ],404);
  
}
}

      public function carbrand()
    {
        
        $carbrand = Carbrand::latest()->get();
        if($carbrand){
        return response()->json([
            'success'=>true,
            'message'=>'Carbrand List',
            'carbrand'=>$carbrand],200);
    }
    else{
        return response()->json([
            'success'=>true,
            'message'=>' Record Not Found'
        ],404);
      
    }
}
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
}

public function usedcarstore(Request $request)
    {
   
        $this->validate($request,[
            'category' => 'required|min:3|max:80',
            //'condition' => 'required',
             'usedtime' => 'required',
            'carbrand' => 'required|min:3|max:30',
            'trim' => 'required|min:3|max:30',
            'bodytype' => 'required',
            'carmodel' => 'required|min:3|max:30',
            'carversion' => 'required|min:3|max:30',
            'bikemodelyear' => 'required',
             'kilometerrun' => 'required',
            'engine_capacity' => 'required',
            'description' => 'required|min:3|max:300',
            'price' => 'required',
           
        
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
        ],
        [
           
            'phone.required' => 'The phone  field is required.',
            'category.required' => 'The category  field is required.',
            // 'location.required' => 'The location  field is required.',
            'trim.required' => 'The trim  field is required.',
            'bodytype.required' => 'The body type  field is required.',
            'usettime.required' => 'The usettime  field is required.',
            'kilometerrun.required' => 'The kilometerrun  field is required.',
            'carbrand.required' => 'The car brand  field is required.',
            'carversion.required' => 'The car version  field is required.',
            'carmodelyear.required' => 'The car model year  field is required.',
            'carmodel.required' => 'The car model  field is required.',
            'price.required' => 'The price  field is required.',
            'engine_capacity.required' => 'The engine capacity  field is required.',
        ]);
        

    $list = New Car();
    $list->user_id  = app('auth')->user()->id;
    $list->admin_id =app('auth')->user()->admin_id; 
    $list->category_id =$request->category;
    $list->location = $request->location;
    $list->condition = $request->condition;
     $list->newused ='used';
    $list->fueltype =$request->auto;
    $list->transmission =$request->transmission;
    $list->carbrand_id =$request->carbrand;
    $list->bodytype_id =$request->bodytype;
    $list->carmodel_id =$request->carmodel;
    $list->carversion_id =$request->carversion;
    $list->bikemodelyear_id =$request->bikemodelyear;
    // $list->startingmethod=$request->startingmethod;
    $list->registration=$request->registration;
    $list->fueltype=$request->checkedNames;
     $list->kilometerrun = $request->kilometerrun;
     $list->usedtime = $request->usedtime;
    $list->engine_capacity = $request->engine_capacity;
    $list->description =$request->description;
    $list->trim =$request->trim;
    $list->price = $request->price;
    $list->negotiable = $request->negotiable?:"false";  
    $list->active = 2; 
    $list->save();
    if ($list->id) {

            $image=$request->allimage;
            foreach ($image as  $value){
            //return response($value['path']);
            $strpos = strpos($value['path'],';');
            $sub = substr($value['path'],0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $name = time() . "_" .app('auth')->user()->id. "_" . $rand . "." .$ex;
            $img = Image::make($value['path'])->resize(200, 200);
            $upload_path = public_path()."/images/carpostimage/";
            $img->save($upload_path.$name);
            $image = new Carimage();
            $image->user_id  = app('auth')->user()->id;
            $image->post_id =$list['id'];
            $image->image =$name;
            $image->save();
    }
     

  
if ($image->id) {
      return response()->json([
          'success' => true,
           'message'=>'Post Create Successfully',
           'car'=>$list
      ],201);
    } else {
        return response()->json([
            'success' => false,
             'message'=>'Post Create Failed',
             
        ],404);
    }
}
}


 public function reconditioncar(Request $request)
    {
   
        $this->validate($request,[
            'category' => 'required|min:3|max:80',
            'condition' => 'required',
            // 'biketype' => 'required',
            'carbrand' => 'required|min:3|max:30',
            'trim' => 'required|min:3|max:30',
            'bodytype' => 'required',
            'kilometerrun' => 'required',
            'registration' => 'required',
            'carmodel' => 'required|min:6|max:30',
            'carversion' => 'required|min:6|max:30',
            'bikemodelyear' => 'required|min:6|max:30',
            'usedtime' => 'required',
            'engine_capacity' => 'required',
            'description' => 'required|min:6|max:300',
            'price' => 'required',
           
        
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
        ],
        [
           
            'phone.required' => 'The phone  field is required.',
            'category.required' => 'The category  field is required.',
            'registration.required' => 'The registration  field is required.',
            'trim.required' => 'The trim  field is required.',
            'bodytype.required' => 'The body type  field is required.',
            'condition.required' => 'The condition  field is required.',
            'kilometerrun.required' => 'The kilometer run  field is required.',
            'usedtime.required' => 'The used time type  field is required.',
            'carbrand.required' => 'The car brand  field is required.',
            'carversion.required' => 'The car version  field is required.',
            'bikemodelyear.required' => 'The car model year  field is required.',
            'carmodel.required' => 'The car model  field is required.',
            'price.required' => 'The price  field is required.',
            'engine_capacity.required' => 'The engine capacity  field is required.',
            // 'gender.required' => 'The gender field is required.',
            // 'status.required' => 'The status field is required.',
            // 'contactdetails.required' => 'The contact details field is required.'
        ]);
        

    $list = New Car();
    $list->user_id  = app('auth')->user()->id;
    $list->admin_id =app('auth')->user()->admin_id; 
    $list->category_id =$request->category;
    $list->location = $request->location;
    $list->condition = $request->condition;
    // $list->biketype =$request->biketype;
    $list->fueltype =$request->auto;
    $list->transmission =$request->transmission;
    $list->carbrand_id =$request->carbrand;
    $list->bodytype_id =$request->bodytype;
    $list->carmodel_id =$request->carmodel;
    $list->carversion_id =$request->carversion;
    $list->bikemodelyear_id =$request->bikemodelyear;
    // $list->startingmethod=$request->startingmethod;
    $list->registration=$request->registration;
    $list->fueltype=$request->checkedNames;
     $list->kilometerrun = $request->kilometerrun;
    $list->engine_capacity = $request->engine_capacity;
    $list->description =$request->description;
    $list->trim =$request->trim;
    $list->price = $request->price;
    $list->negotiable = $request->negotiable?:"false";  
    $list->active = 2; 
    $list->save();
    if ($list->id) {

            $image=$request->allimage;
            foreach ($image as  $value){
            //return response($value['path']);
            $strpos = strpos($value['path'],';');
            $sub = substr($value['path'],0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $name = time() . "_" .app('auth')->user()->id. "_" . $rand . "." .$ex;
            $img = Image::make($value['path'])->resize(200, 200);
            $upload_path = public_path()."/images/carpostimage/";
            $img->save($upload_path.$name);
            $image = new Carimage();
            $image->user_id  = app('auth')->user()->id;
            $image->post_id =$list['id'];
            $image->image =$name;
            $image->save();
    }
     

  
if ($image->id) {
      return response()->json([
          'success' => true,
           'message'=>'Post Create Successfully',
           'car'=>$list
      ],201);
    } else {
        return response()->json([
            'success' => false,
             'message'=>'Post Create Failed',
             
        ],404);
    }
}
}

}