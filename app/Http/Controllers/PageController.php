<?php
namespace App\Http\Controllers;
use App\Page;
use App\Gender;
use App\Blogpage;
use App\Viewcount;
use App\Blogcategorylist;
use App\Pagecategorylist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Helper\CommonFx;


class PageController extends Controller
{
    public function index()
    {
        
        $blogpage = Page::latest()->where('language','=','en')->where('status',1)->get();
        if($blogpage){
        return response()->json([
            'success'=>true,
            'blogpage'=>$blogpage],200);
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

  
    public function show(Request $request, $id)
    {
        //return response($id);
        if($request->ajax()){
        $page = Page::with('admin')->whereSlug($id)->get()->first();
        $page->clickview +=1;
        $page->update();
        CommonFx::createViewLog($page);
       if($page){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'pagedetails'=>$page],200);
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

public function category($id)
{
    $p= Page::whereSlug($id)->get()->first();
    $blogpage = Page::where('slug', '!=' , $id)->where('pagetitle', 'like', '%' .$p->pagetitle. '%')->get();
    if($blogpage){
    return response()->json([
        'success'=>true,
        'category'=>$blogpage],200);
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



 
    }
    
 

