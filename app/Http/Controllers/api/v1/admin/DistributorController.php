<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Distributor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DistributorController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:Admin-List');
         //$this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        
        return Distributor::where('admin_id',Auth::guard('admin')->user()->id)->latest()->paginate(2);
      
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
            'distributor' => 'required|min:3|unique:distributors|max:350',
            'address' => 'required|min:3|max:160',
            'phone' => 'required|max:20',
            'fullname' => 'required|min:3|max:20',
            'description' => 'required|min:3',
            'profileimage' => 'required',
        ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }


    if ($request->profileimage) {
        $strpos = strpos($request->profileimage,';');
            $sub = substr($request->profileimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $profileimagename = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->profileimage)->resize(200, 200);
            $upload_path = public_path()."/images/distributorimage/";
            $img->save($upload_path.$profileimagename);
    }
     if ($request->coverimage!=null) {
        $strpos = strpos($request->coverimage,';');
            $sub = substr($request->coverimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $coverimagename = Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->coverimage)->resize(800, 600);
            $upload_path = public_path()."/images/distributorimage/";
            $img->save($upload_path.$coverimagename);
    }
    else{
     $coverimagename = 'not-found.jpg';
    };
    // $slug = SlugService::createSlug(Blog::class, 'slug', );
    $list = new Distributor();
    $list->distributor = $request->distributor;
    $list->address = $request->address;
    $list->phone = $request->phone;
    $list->fullname = $request->fullname;
    $list->description = $request->description;
    $list->profileimage = $profileimagename;
    $list->coverimage = $coverimagename;
    $list->admin_id  =  Auth::guard('admin')->user()->id;
     $list->save();

        if( $list->save()){
      return response()->json([
          'success' => true,
           
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
    
        $info = Distributor::where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'distributor' => $info], 200);
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

         $this->validate($request,[
            'distributor' => 'required|min:3|max:350|unique:distributors,distributor,'.$id,
            'address' => 'required|min:3|max:160',
            'phone' => 'required|max:16',
            'fullname' => 'required|min:3|max:160',
            'description' => 'required|min:3',
            'profileimage' => 'required',
        ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }

    $image=Distributor::find($id);
 if (($request->profileimage != $image->profileimage)) {
    $profileimage=public_path('/images/distributorimage/').$image->profileimage;
    if(file_exists( $profileimage)){
        unlink($profileimage);

    } 
        $strpos = strpos($request->profileimage,';');
            $sub = substr($request->profileimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $profileimagename = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->profileimage)->resize(200, 200);
            $upload_path = public_path()."/images/distributorimage/";
            $img->save($upload_path.$profileimagename);
    
    }
    else {
        $profileimagename= $image->profileimage;
    }

    if (($request->coverimage != $image->coverimage)) {
        $profileimage=public_path('/images/distributorimage/').$image->coverimage;
        if(file_exists( $profileimage) && $image->coverimage !='not-found.jpg' ){
            unlink($profileimage);
 
        } 
        $strpos = strpos($request->coverimage,';');
            $sub = substr($request->coverimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $coverimagename = Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->coverimage)->resize(800, 600);
            $upload_path = public_path()."/images/distributorimage/";
            $img->save($upload_path.$coverimagename);
    }
    else{
     $coverimagename = $image->coverimage;
    };
    // $slug = SlugService::createSlug(Blog::class, 'slug', );
    $list =Distributor::find($id);
    $list->distributor = $request->distributor;
    $list->address = $request->address;
    $list->phone = $request->phone;
    $list->fullname = $request->fullname;
    $list->description = $request->description;
    $list->profileimage = $profileimagename;
    $list->coverimage = $coverimagename;
    $list->admin_id  =  Auth::guard('admin')->user()->id;
     $list->save();

        if( $list->save()){
      return response()->json([
          'success' => true,
           
      ],201);
    } else {
        return response()->json([
            'success' => false,
             
             
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
        $image=Distributor::where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        
        $profileimage=public_path('/images/distributorimage/').$image->profileimage;
       if(file_exists( $profileimage) && $image->profileimage !='not-found.jpg' ){
           unlink($profileimage);

       } 
       $coverphoto=public_path('/images/distributorimage/').$image->coverimage;
       if(file_exists( $coverphoto) && $image->coverimage !='not-found.jpg' ){
           unlink($coverphoto);

       }
      
       if($image) {
        Distributor::destroy($id);
            return response()->json([
                'success' => true,
               ],200);
        } else {
            
            return response()->json([
                'success' => false,
                'message'=>'Record Not Found',
                'id'=>$id  
              ],404);
        }
    
    }

    public function deletecategorylist($id)
    {

    $category=Blogcategorylist::destroy($id);
        if($category){
    return response()->json([
    'success' => true,
    
],200);

       }
       }
    
   // account active inactive start
   public function distributoractive(Request $request){
       
    $id=$request->id;
     $activestatus = Distributor::find($id);
     $activestatus->status= 1;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
    public function distributordactive(Request $request){
       
    $id=$request->id;
     $activestatus = Distributor::find($id);
     $activestatus->status= 2;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }

 // account active inactive area end


 }
 
 //for get brand name only

 public function companybrandname(){
    $brandname=Company::select('id','brand')->get();
    return response($brandname);
}
public function distributorsearch(Request $request){
    $id =$request->s;
     if ($id !==null) {
        return Distributor::where('admin_id',Auth::guard('admin')->user()->id)->where('distributor','LIKE','%%%'.urldecode($id).'%%%')->paginate(3);
     }
    
else {
    return $this->index();
}
 }

}

