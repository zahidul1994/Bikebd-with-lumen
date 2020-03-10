<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Cc;
use App\Blog;
use App\Bore;
use App\Ftyre;
use App\Gears;
use App\Rtyre;
use App\Engine;
use App\Gender;
use App\Stroke;
use App\Weight;
use App\Product;
use App\Cylinders;
use App\Ftcapacity;
use App\Productimage;
use App\Brandcategory;
use App\Betteryvoltage;
use App\Helper\CommonFx;
use App\Blogcategorylist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:Admin-List');
         //$this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        
        return Product::where('admin_id',Auth::guard('admin')->user()->id)->latest()->paginate(8);
      
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
       // return response($request->all());
        $this->validate($request,[
            
   
            //'category' => 'required|min:3|max:350',
            'title' => 'required|min:3|unique:products|max:350',
            'shortdescription' => 'required|min:3|max:500',
            'keyword' => 'required',
            'featureimage' => 'required',
            'images' => 'required',
            'slug' => 'unique:products',

        ]);

        $strpos = strpos($request->featureimage,';');
        $sub = substr($request->featureimage,0,$strpos);
        $ex = explode('/',$sub)[1];
        $rand = mt_rand(100000, 999999);
        $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
        $img = Image::make($request->featureimage)->resize(200, 200);
        $upload_path = public_path()."/images/productimages/";
        $img->save($upload_path.$name);

    $list = new Product();
     $list->keyword = $request->keyword;
    $list->title =$request->title;
    $list->slug =CommonFx::make_slug($request->slug);
    $list->cc = $request->cc;
    $list->producttype = $request->producttype;
    $list->marketstatus = $request->marketstatus;
    $list->keyword = $request->keyword;
    $list->regularprice = $request->regularprice;
    $list->offerprice = $request->offerprice;
    $list->offerurl = $request->offerurl;
    $list->displacement = $request->displacement;
    $list->mileage = $request->mileage;
    $list->rm = $request->rm;
    $list->rpm = $request->rpm;
    $list->torquenm = $request->torquenm;
    $list->torquerpm = $request->torquerpm;
    $list->brand_id = $request->company_id;
    $list->brandcategory_id = $request->brandcategory_id;
    $list->engine = $request->engine;
    $list->enginemaximumpower = $request->enginemaximumpower;
    $list->enginemaximumtorque = $request->enginemaximumtorque;
    $list->bore = $request->bore;
    $list->stroke = $request->stroke;
    $list->cylinder = $request->cylinder;
    $list->compressionratio = $request->compressionratio;
    $list->gears = $request->gears;
    $list->clutch = $request->clutch;
    $list->transmission = $request->transmission;
    $list->chassis = $request->chassis;
    $list->frontsuspension = $request->frontsuspension;
    $list->rearsuspension = $request->rearsuspension;
    $list->frontbrake = $request->frontbrake;
    $list->rearbrake = $request->rearbrake;
    $list->frontbrakediameter = $request->frontbrakediameter;
    $list->rearbrakediameter = $request->rearbrakediameter;
    $list->abs = $request->abs;
    $list->ftyre = $request->ftyre;
    $list->rtyre = $request->rtyre;
    $list->tubeless = $request->tubeless;
    $list->overalllength = $request->overalllength;
    $list->overallwidth = $request->overallwidth;
    $list->groundclearness = $request->groundclearness;
    $list->weight = $request->weight;
    $list->ftcapacity = $request->ftcapacity;
    $list->wheelbase = $request->wheelbase;
    $list->battery = $request->battery;
    $list->bvoltage = $request->bvoltage;
    $list->headlight = $request->headlight;
    $list->taillight = $request->taillight;
    $list->indicators = $request->indicators;
    $list->speedometer = $request->speedometer;
    $list->odometer = $request->odometer;
    $list->rpmmeter = $request->rpmmeter;
    $list->handle = $request->handle;
    $list->seattype = $request->seattype;
    $list->passenger = $request->passenger;
    $list->engineks = $request->engineks;
    $list->shortdescription = $request->shortdescription;
    $list->featureimage = $name;
    $list->headlight = $request->headlight;
    $list->embedurl = $request->embedurl;
     $list->embedurl = $request->embedurl;
   $list->admin_id  =  Auth::guard('admin')->user()->id;
     $list->save();
    if ($list->save()) {
        if ($request->images!=null) {
            foreach($request->images as $value)
         {
             $strpos = strpos($value['path'],';');
             $sub = substr($value['path'],0,$strpos);
             $ex = explode('/',$sub)[1];
             $rand = mt_rand(100000, 999999);
             $name = time() . "_" .app('auth')->user()->id. "_" . $rand . "." .$ex;
             $img = Image::make($value['path'])->resize(200, 200);
             $upload_path = public_path()."/images/productimages/slider/";
             $img->save($upload_path.$name);
             $image = new Productimage();
             $image->product_id =$list['id'];
             $image->productimage =$name;
             $image->save();
         }
 }
 
    
      return response()->json([
          'success' => true,
           'message'=>'Post Create Successfully',
           'value'=>$list
      ],201);
    } else {
        return response()->json([
            'success' => false,
             
             
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
        $blogpost = Blog::with('blogcategorylist')->where('admin_id', Auth::guard('admin')->user()->id)->find($id);
       
        if($blogpost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'blogpostdetails'=>$blogpost],200);
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
    $info = Product::where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'productinfo' => $info], 200);
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
         //return response($request->all());

        {
            
             $this->validate($request,[
                 'title' => 'required|min:3|max:350|unique:products,title,'.$id,
                 'slug' => 'required|min:3|max:350|unique:products,slug,'.$id,
                 'featureimage' => 'required',
             ]);
     
         // if ($validator->fails()) {
     
     
         //     return response()->json([
         //      'success' =>false,
         //      'message'=>'Validation Fails',
         //      'errors'=>$validator->errors()->all()],401);
         // }
     
         $image=Product::find($id);
         if (($request->featureimage != $image->featureimage)) {
            $imagepath=public_path('/images/productimages/').$image->featureimage;
            if(file_exists( $imagepath) && $image->featureimage !='not-found.jpg' ){
                unlink($imagepath);
        
            }
            $strpos = strpos($request->featureimage,';');
            $sub = substr($request->featureimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->featureimage)->resize(200, 200);
            $upload_path = public_path()."/images/productimages/";
            $img->save($upload_path.$name);
         }
         else{
          $name = $request->featureimage;
         };
     
         $list = Product::find($id);
         $list->keyword = $request->keyword;
         $list->title =$request->title;
         $list->slug =CommonFx::make_slug($request->slug);
         $list->cc = $request->cc;
         $list->producttype = $request->producttype;
         $list->marketstatus = $request->marketstatus;
         $list->keyword = $request->keyword;
         $list->regularprice = $request->regularprice;
         $list->offerprice = $request->offerprice;
         $list->offerurl = $request->offerurl;
         $list->displacement = $request->displacement;
         $list->mileage = $request->mileage;
         $list->rm = $request->rm;
         $list->rpm = $request->rpm;
         $list->torquenm = $request->torquenm;
         $list->torquerpm = $request->torquerpm;
         $list->brand_id = $request->brand_id;
         $list->brandcategory_id = $request->brandcategory_id;
         $list->engine = $request->engine;
         $list->enginemaximumpower = $request->enginemaximumpower;
         $list->enginemaximumtorque = $request->enginemaximumtorque;
         $list->bore = $request->bore;
         $list->stroke = $request->stroke;
         $list->cylinder = $request->cylinder;
         $list->compressionratio = $request->compressionratio;
         $list->gears = $request->gears;
         $list->clutch = $request->clutch;
         $list->transmission = $request->transmission;
         $list->chassis = $request->chassis;
         $list->frontsuspension = $request->frontsuspension;
         $list->rearsuspension = $request->rearsuspension;
         $list->frontbrake = $request->frontbrake;
         $list->rearbrake = $request->rearbrake;
         $list->frontbrakediameter = $request->frontbrakediameter;
         $list->rearbrakediameter = $request->rearbrakediameter;
         $list->abs = $request->abs;
         $list->ftyre = $request->ftyre;
         $list->rtyre = $request->rtyre;
         $list->tubeless = $request->tubeless;
         $list->overalllength = $request->overalllength;
         $list->overallwidth = $request->overallwidth;
         $list->groundclearness = $request->groundclearness;
         $list->weight = $request->weight;
         $list->ftcapacity = $request->ftcapacity;
         $list->wheelbase = $request->wheelbase;
         $list->battery = $request->battery;
         $list->bvoltage = $request->bvoltage;
         $list->headlight = $request->headlight;
         $list->taillight = $request->taillight;
         $list->indicators = $request->indicators;
         $list->speedometer = $request->speedometer;
         $list->odometer = $request->odometer;
         $list->rpmmeter = $request->rpmmeter;
         $list->handle = $request->handle;
         $list->seattype = $request->seattype;
         $list->passenger = $request->passenger;
         $list->engineks = $request->engineks;
         $list->shortdescription = $request->shortdescription;
         $list->featureimage = $name;
         $list->headlight = $request->headlight;
         $list->embedurl = $request->embedurl;
          $list->embedurl = $request->embedurl;
        $list->admin_id  =  Auth::guard('admin')->user()->id;
        $list->save();
        
             if( $list->save()){
           return response()->json([
               'success' => true,
                'message'=>'Post Update Successfully',
                          ],201);
         } else {
             return response()->json([
                 'success' => false,
                  
                  
             ],404);
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
        $destroy=Product::destroy($id);
        if ($destroy) {
             return response()->json([
            'success' => true,
            ],200);
    } 
    else {
        
        return response()->json([
            'success' => false,
             'message'=>'Record Not Found',
            'id'=>$id],404);
    }
    
    }

 
    
 
    
   // account active inactive start
   public function producactive(Request $request){
       
    $id=$request->id;
     $activestatus = Product::find($id);
     $activestatus->status= 1;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
    public function productinactive(Request $request){
       
    $id=$request->id;
     $activestatus = Product::find($id);
     $activestatus->status= 2;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
 
 //add productinfo dropdown start
 public function alldropwown(){
    $engin=Engine::all();
    $bore=Bore::all();
    $stroke=Stroke::all();
    $cylinder=Cylinders::all();
    $Gears=Gears::all();
    $cc=Cc::all();
    $Rtyre=Rtyre::all();
    $Ftyre=Ftyre::all();
    $Bettery=Betteryvoltage::all();
    $Weight=Weight::all();
    $ftcapacity=Ftcapacity::all();
    $brandcategory=Brandcategory::all();
    return response()->json([
'success'=>true,
'engine'=>$engin,
'bore'=>$bore,
'cylinder'=>$cylinder,
'stroke'=>$stroke,
'gear'=>$Gears,
'cc'=>$cc,
'fronttyre'=>$Ftyre,
'reartyre'=>$Rtyre,
'weight'=>$Weight,
'bettery'=>$Bettery,
'ftcapacity'=>$ftcapacity,
'brandcategory'=>$brandcategory,
    ],200);
}
//add productinfo dropdown end


//for search
 public function productsearch(Request $request){
    $id =$request->s;
     if ($id !==null) {
        return Product::where('admin_id',Auth::guard('admin')->user()->id)->where('title','LIKE','%%%'.urldecode($id).'%%%')->paginate();
     }
    
else {
    return $this->index();
}
 }

 public function sliderimage($id)
    {
        $productimage = Productimage::where('product_id',$id)->get();
       
        if($productimage){
        return response()->json([
            'success'=>true,
            'sliderim' => $productimage],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
    }
    }

 public function deleteproductimage($id)
 {
    $image=Productimage::find($id);
        
    $imagepath=public_path('/images/productimages/slider/').$image->productimage;
   unlink($imagepath);
   Productimage::destroy($id);
     if($imagepath){
 return response()->json([
 'success' => true,
 
],200);

    }
    }

}
