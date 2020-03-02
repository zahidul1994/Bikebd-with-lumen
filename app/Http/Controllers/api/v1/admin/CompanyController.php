<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Blog;
use App\Gender;
use App\Company;
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

class CompanyController extends Controller
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
        
        return Company::where('admin_id',Auth::guard('admin')->user()->id)->latest()->paginate(2);
      
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
            'shortname' => 'required|min:3|unique:companies|max:350',
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


    if ($request->profileimage) {
        $strpos = strpos($request->profileimage,';');
            $sub = substr($request->profileimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $profileimagename = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->profileimage)->resize(200, 200);
            $upload_path = public_path()."/images/companyimage/";
            $img->save($upload_path.$profileimagename);
    }
     if ($request->coverimage!=null) {
        $strpos = strpos($request->coverimage,';');
            $sub = substr($request->coverimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $coverimagename = Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->coverimage)->resize(800, 600);
            $upload_path = public_path()."/images/companyimage/";
            $img->save($upload_path.$coverimagename);
    }
    else{
     $coverimagename = 'not-found.jpg';
    };
    // $slug = SlugService::createSlug(Blog::class, 'slug', );
    $list = new Company();
    $list->shortname = $request->shortname;
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
    
        $info = Company::where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'companyinfo' => $info], 200);
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
            'shortname' => 'required|min:3|max:350|unique:companies,shortname,'.$id,
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

    $image=Company::find($id);
 if (($request->profileimage != $image->profileimage)) {
    $profileimage=public_path('/images/companyimage/').$image->profileimage;
    if(file_exists( $profileimage)){
        unlink($profileimage);

    } 
        $strpos = strpos($request->profileimage,';');
            $sub = substr($request->profileimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $profileimagename = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->profileimage)->resize(200, 200);
            $upload_path = public_path()."/images/companyimage/";
            $img->save($upload_path.$profileimagename);
    
    }
    else {
        $profileimagename= $image->profileimage;
    }

    if (($request->coverimage != $image->coverimage)) {
        $profileimage=public_path('/images/companyimage/').$image->coverimage;
        if(file_exists( $profileimage) && $image->coverimage !='not-found.jpg' ){
            unlink($profileimage);
 
        } 
        $strpos = strpos($request->coverimage,';');
            $sub = substr($request->coverimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $coverimagename = Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->coverimage)->resize(800, 600);
            $upload_path = public_path()."/images/companyimage/";
            $img->save($upload_path.$coverimagename);
    }
    else{
     $coverimagename = $image->coverimage;
    };
    // $slug = SlugService::createSlug(Blog::class, 'slug', );
    $list =Company::find($id);
    $list->shortname = $request->shortname;
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
        $image=Company::where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        
        $profileimage=public_path('/images/companyimage/').$image->profileimage;
       if(file_exists( $profileimage) && $image->profileimage !='not-found.jpg' ){
           unlink($profileimage);

       } 
       $coverphoto=public_path('/images/companyimage/').$image->coverimage;
       if(file_exists( $coverphoto) && $image->coverimage !='not-found.jpg' ){
           unlink($coverphoto);

       }
      
       if($image) {
         Company::destroy($id);
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
   public function companyactive(Request $request){
       
    $id=$request->id;
     $activestatus = Company::find($id);
     $activestatus->status= 1;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
    public function companydactive(Request $request){
       
    $id=$request->id;
     $activestatus = Company::find($id);
     $activestatus->status= 2;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
 
 
 

 

 // account active inactive area end

}
