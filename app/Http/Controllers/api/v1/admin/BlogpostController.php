<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Blog;
use App\Gender;
use App\Blogcategorylist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Redirect;
use App\Helper\CommonFx;

class BlogpostController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:Admin-list');
    //      //$this->middleware('permission:role-create', ['only' => ['create','store']]);
    //     // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        
        return Blog::with('blogcategorylist')->where('admin_id',Auth::guard('admin')->user()->id)->where('language', Auth::guard('admin')->user()->language)->latest()->paginate(3);
      
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
            
            'title' => 'required|min:3|max:350',
            'language' => 'required',
            //'category' => 'required|min:3|max:350',
            'title' => 'required|min:3|max:350',
            'description' => 'required|min:3',
            'metadescription' => 'required|min:3|max:160',
            'shortdescription' => 'required|min:3|max:160',
            'keyword' => 'required',
            'postimage' => 'required',
            'slug' => 'unique:blogs',

        ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }


    if ($request->postimage!=null) {
        $strpos = strpos($request->postimage,';');
            $sub = substr($request->postimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->postimage)->resize(200, 200);
            $upload_path = public_path()."/images/blogpost/";
            $img->save($upload_path.$name);
    }
    else{
     $name = 'not-found.jpg';
    };
    // $slug = SlugService::createSlug(Blog::class, 'slug', );
    $list = new Blog();
    $list->language = $request->language;
    $list->keyword = $request->keyword;
    $list->title =$request->title;
    $list->slug =CommonFx::make_slug($request->slug);
    $list->description = $request->description;
    $list->url = $request->url;
    $list->metadescription = $request->metadescription;
    $list->shortdescription = $request->shortdescription;
    $list->postimage = $name;
    $list->admin_id  =  Auth::guard('admin')->user()->id;
     $list->save();

    if ($list->save()) {
        for ($i = 0; $i < count($request->category); $i++) {
            $category= new Blogcategorylist();
            $category->blog_id = $list->id;
            $category->categorylist = $request['category'][$i];
            $category->save();
        }
    }
        if( $category->save()){
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
    
        $info = Blog::with('blogcategorylist')->where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'blogpost' => $info], 200);
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
                 
                 'title' => 'required|min:3|max:350',
                 'language' => 'required',
                 //'category' => 'required|min:3|max:350',
                 'title' => 'required|min:3|max:350|unique:blogs,title,'.$id,
                 'description' => 'required|min:3',
                 'shortdescription' => 'required|min:3|max:160',
                 'keyword' => 'required',
                 'metadescription' => 'required|min:3|max:160',
             ]);
     
         // if ($validator->fails()) {
     
     
         //     return response()->json([
         //      'success' =>false,
         //      'message'=>'Validation Fails',
         //      'errors'=>$validator->errors()->all()],401);
         // }
     
         $image=Blog::find($id);
         if (($request->postimage != $image->postimage)) {
            $imagepath=public_path('/images/blogpost/').$image->postimage;
            if(file_exists( $imagepath) && $image->postimage !='not-found.jpg' ){
                unlink($imagepath);
        
            }
             $strpos = strpos($request->postimage,';');
                 $sub = substr($request->postimage,0,$strpos);
                 $ex = explode('/',$sub)[1];
                 $rand = mt_rand(100000, 999999);
                 $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
                 $img = Image::make($request->postimage)->resize(200, 200);
                 $upload_path = public_path()."/images/blogpost/";
                 $img->save($upload_path.$name);
         }
         else{
          $name = $request->postimage;
         };
     
         $list = Blog::find($id);
         $list->keyword = $request->keyword;
         $list->language = $request->language;
        $list->metadescription = $request->metadescription;
         $list->title = $request->title;
         $list->description = $request->description;
         $list->shortdescription = $request->shortdescription;
         $list->postimage = $name;
         $list->admin_id  =  Auth::guard('admin')->user()->id;
          $list->update();
          if ($list->update()) {
              if($request->category !==null){
            for ($i = 0; $i < count($request->category); $i++) {
                $list= new Blogcategorylist();
                $list->blog_id =$id;
                $list->categorylist = $request['category'][$i];
                $list->save();
            }}
        }
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
        $image=Blog::where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        
        $imagepath=public_path('/images/profileimage/').$image->postimage;
       if(file_exists( $imagepath) && $image->postimage !='not-found.jpg' ){
           unlink($imagepath);

       }
       $forcedele=  Blog::where('id', $id)->forcedelete();
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
   public function blogpostactive(Request $request){
       
    $id=$request->id;
     $activestatus = Blog::find($id);
     $activestatus->status= 1;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
    public function blogpostinactive(Request $request){
       
    $id=$request->id;
     $activestatus = Blog::find($id);
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
