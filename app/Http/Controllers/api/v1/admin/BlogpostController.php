<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Blog;
use App\Gender;
use App\Category;
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

class BlogpostController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:Admin-List');
         //$this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        
        return Blog::with('blogcategorylist')->where('admin_id',Auth::guard('admin')->user()->id)->where('language', Auth::guard('admin')->user()->language)->latest()->paginate(8);
      
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
            'title' => 'required|min:3|unique:blogs|max:350',
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
            $upload_path ="images/blogpost/";
            $img->save($upload_path.$name);
    }
    else{
     $name = 'not-found.jpg';
    };
    // $slug = SlugService::createSlug(Blog::class, 'slug', );
    $list = new Blog();
    $list->language = $request->language;
    $list->keyword = $request->keyword;
     $list->slug =CommonFx::make_slug($request->slug);
    $list->title =$request->title;
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
                 
               
                 'language' => 'required',
                 //'category' => 'required|min:3|max:350',
                 'title' => 'required|min:3|max:350|unique:blogs,title,'.$id,
                 'slug' => 'required|min:3|max:350|unique:blogs,slug,'.$id,
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
            $imagepath=('images/blogpost/').$image->postimage;
            if(file_exists( $imagepath) && $image->postimage !='not-found.jpg' ){
                unlink($imagepath);
        
            }
             $strpos = strpos($request->postimage,';');
                 $sub = substr($request->postimage,0,$strpos);
                 $ex = explode('/',$sub)[1];
                 $rand = mt_rand(100000, 999999);
                 $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
                 $img = Image::make($request->postimage)->resize(200, 200);
                 $upload_path ="images/blogpost/";
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
         $list->slug =CommonFx::make_slug($request->slug);
         $list->description = $request->description;
         $list->url = $request->url;
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
        $id= Blog::destroy($id);
       if($id) {
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
 
   //for search
 public function bloginsearch(Request $request){
    $id =$request->s;
     if ($id !==null) {
        return Blog::with('blogcategorylist')->where('admin_id',Auth::guard('admin')->user()->id)->where('language', Auth::guard('admin')->user()->language)->where('title','LIKE','%%%'.urldecode($id).'%%%')->paginate();
     }
    
else {
    return $this->index();
}
 }

 public function blogcategory($id)
 {
     $blogcategory = Blogcategorylist::where('blog_id',$id)->get();
    
     if($blogcategory){
     return response()->json([
         'success'=>true,
         'blogcate' => $blogcategory],200);
  }
  else{
      return response()->json([
          'success'=>false,
          'message'=>'Record Not  Found',
         ],404);
 }
 }
  public function createblogcategory(Request $request)
 {
     //return response($request->all());
    for ($i = 0; $i < count($request->category); $i++) {
        $list= new Blogcategorylist();
        $list->blog_id =$request->id;
        $list->categorylist = $request['category'][$i];
        $list->save();
    }
    if($list->save()){
       
     $blogcat = Blogcategorylist::where('blog_id',$request->id)->get();
            
     return response()->json([
     'success' => true,
     'blogcate' => $blogcat
    ],200);
    
        }
 }

 public function deleteblogcategory($id)
 {
    $blogcategory=Blogcategorylist::find($id);
        
    
  if($blogcategory){
    Blogcategorylist::destroy($id);
        $blogcat = Blogcategorylist::where('blog_id',$blogcategory->blog_id)->get();
        
 return response()->json([
 'success' => true,
 'blogcate' => $blogcat
],200);

    }
    } 
    
    public function updatebnenurl(Request $request)
 {
    $blog=Blog::find($request->id);
        $blog->url=$request->url;
        $blog->save();
    
  if($blog->save()){
return response()->json([
 'success' => true,
 ],200);

    }
    }

}
