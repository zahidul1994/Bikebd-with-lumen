<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Blog;
use App\Blogcategorylist;
use App\Blogcomment;
use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class BlogpostController extends Controller
{
    public function index()
    {
        
        $blogpost = Blog::with('blogcategorylist')->where('language', '=' , 'en')->where('status',1)->latest()->get();
        if($blogpost){
        return response()->json([
            'success'=>true,
            'blogpost'=>$blogpost],200);
    }
    else{
        return response()->json([
            'success'=>true,
            'message'=>' Record Not Found'
        ],404);
      
    }

    } 


    public function bnindex()
    {
        
        $blogpost = Blog::with('blogcategorylist')->where('language', '=' , 'bn')->where('status',1)->latest()->get();
        if($blogpost){
        return response()->json([
            'success'=>true,
            'blogpost'=>$blogpost],200);
    }
    else{
        return response()->json([
            'success'=>true,
            'message'=>' Record Not Found'
        ],404);
      
    }

    } 

    public function lindex()
    {
        
       $blogpost = Blog::with('blogcategorylist')->latest()->get();
    return view('fontpage.homepage')->with('blogpost',$blogpost);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    { 
         if($request->ajax()){
        $blogpost = Blog::with('blogcategorylist','admin','blogcomment')->whereSlug(urldecode($id))->get()->first();
        $blogpost->clickview +=1;
        $blogpost->update();
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
return view('home');
}
 public function bnshow(Request $request, $id)
    { 
         if($request->ajax()){
        $blogpost = Blog::with('blogcategorylist','admin','blogcomment')->whereSlug(urldecode($id))->get()->first();
        $blogpost->clickview +=1;
        $blogpost->update();
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
return view('bnhome');
}

    public function lshow($id)
    {
        $blogpost = Blog::with('blogcategorylist')->find($id);
        return view('fontpage.blogdetails')->with('blogpost',$blogpost);
       
  
    }
    

     public function comment(Request $request)
     {

       // return response($request->all());
            $this->validate($request,[
                    
                'name' => 'required|min:3|max:180',
                'comment' => 'required|min:10|max:580',
                'email' => 'required|email',
                
            ]);
            $blog = Blog::whereSlug($request->id)->get()->first();
            //return response($blog);
            $list = new Blogcomment();
            $list->blog_id = $blog->id;
            $list->name = $request->name;
            $list->comment = $request->comment;
            $list->email = $request->email;
            $list->save();
        if($list){
            return response()->json([
                'success'=>true,
                ],200);
        }
        else{
            return response()->json([
                'success'=>false,
                ],404);
        }
            
        }


        public function bnrelatedblog($id)
        {
            $p= Blog::whereSlug(urldecode($id))->get()->first();
            $blogpost = Blog::where('slug', '!=' , $p->slug)->where('title', 'like', '%' .$p->title. '%')->get();
            if($blogpost){
            return response()->json([
                'success'=>true,
                'bnblogpost'=>$blogpost],200);
        }
        else{
            return response()->json([
                'success'=>true,
                'message'=>' Record Not Found'
            ],404);
          
        }

    
}

public function relatedblog($id)
{
    $p= Blog::whereSlug($id)->get()->first();
    $blogpost = Blog::where('slug', '!=' , $p->slug)->where('language','en')->where('title', 'like', '%' .$p->title. '%')->get();
    if($blogpost){
    return response()->json([
        'success'=>true,
        'blogpost'=>$blogpost],200);
}
else{
    return response()->json([
        'success'=>true,
        'message'=>' Record Not Found'
    ],404);
  
}


}
}
//test::create($request->all());