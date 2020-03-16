<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Page;
use App\Parentpage;
use App\Helper\CommonFx;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class PageController extends Controller
{
    public function index()
    {  
        return Page::where('admin_id',Auth::guard('admin')->user()->id)->where('language', Auth::guard('admin')->user()->language)->latest()->paginate(7); 
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
            
            'pagetitle' => 'required|min:3|max:350',
            'language' => 'required',
            'pagekeyword' => 'required',
            //'category' => 'required|min:3|max:350',
            //'title' => 'required|min:3|max:350',
            'description' => 'required|min:3',
            'pageimage' => 'required',
            'pagemetadescription' => 'required',
            'parentpage' => 'required|unique:parentpages',
            'slug' => 'unique:pages',

        ]);

    // if ($validator->fails()) {


    //     return response()->json([
    //      'success' =>false,
    //      'message'=>'Validation Fails',
    //      'errors'=>$validator->errors()->all()],401);
    // }


    if ($request->pageimage!=null) {
        $strpos = strpos($request->pageimage,';');
            $sub = substr($request->pageimage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->pageimage)->resize(200, 200);
            $upload_path ="images/blogpage/";
            $img->save($upload_path.$name);
    }
    else{
     $name = 'not-found.jpg';
    };

    $list = new Page();
    $list->language = $request->language;
    $list->pagetitle = $request->pagetitle;
    $list->pagename = $request->parentpage;
    $list->slug =CommonFx::make_slug($request->slug);
    $list->pagekeyword = $request->pagekeyword;
    $list->pageurl = $request->pageurl;
    $list->parentpage_id = $request->parentpagename;
    $list->pagemetadescription = $request->pagemetadescription;
    $list->description = $request->description;
    $list->pageimage = $name;
    $list->admin_id  =  Auth::guard('admin')->user()->id;
     $list->save();

    if ($list->save()) {
        $parent = new Parentpage();
        $parent->parentpage = $request->parentpage;
        $parent->admin_id  =  Auth::guard('admin')->user()->id;
        $parent->save();
    }
            if($parent->save()){
           return response()->json([
          'success' => true,
           'message'=>'Blog Page Create Successfully',
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
        $page = Page::with('pagecategorylist')->where('admin_id', Auth::guard('admin')->user()->id)->find($id);
      
        if($page){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'blogpagedetails'=>$page],200);
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
    
        $info = Page::where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'blogpage' => $info], 200);
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

                 'pagetitle' => 'required|min:3|max:350',
                 'language' => 'required',
                 'pagekeyword' => 'required',
                 //'category' => 'required|min:3|max:350',
                 //'title' => 'required|min:3|max:350',
                 'description' => 'required|min:3',
                 'pageimage' => 'required',
                 'slug' => 'unique:pages,slug,'.$id,
                 'pagename' => 'required|unique:pages,pagename,'.$id,
     
             ]);
     
         // if ($validator->fails()) {
     
     
         //     return response()->json([
         //      'success' =>false,
         //      'message'=>'Validation Fails',
         //      'errors'=>$validator->errors()->all()],401);
         // }
     
         $image=Page::find($id);
         if (($request->pageimage != $image->pageimage)) {
            $imagepath='images/blogpage/'.$image->pageimage;
            if(file_exists( $imagepath) && $image->pageimage !='not-found.jpg' ){
                unlink($imagepath);
        
            }
             $strpos = strpos($request->pageimage,';');
                 $sub = substr($request->pageimage,0,$strpos);
                 $ex = explode('/',$sub)[1];
                 $rand = mt_rand(100000, 999999);
                 $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
                 $img = Image::make($request->pageimage)->resize(200, 200);
                 $upload_path ="images/blogpage/";
                 $img->save($upload_path.$name);
         }
         else{
          $name = $request->pageimage;
         };
     
         $list = Page::find($id);
         $list->language = $request->language;
        $list->pagetitle = $request->pagetitle;
        $list->pagekeyword = $request->pagekeyword;
        $list->pageurl = $request->pageurl;
        $list->slug =CommonFx::make_slug($request->slug);
        $list->pagename = $request->pagename;
        $list->parentpage_id = $request->parentpage_id;
        $list->pagemetadescription = $request->pagemetadescription;
        $list->description = $request->description;
        $list->pageimage = $name;
         $list->admin_id  =  Auth::guard('admin')->user()->id;
          $list->update();
        //   if ($list->update()) {
        //     $user = Parentpage::firstOrNew(array('parentpage' => Input::get('parentpage_id')));
        //     $user->parentpage = Input::get('parentpage_id');
        //     $user->admin_id  =  Auth::guard('admin')->user()->id;
        //     $user->save();
        
        //     }
        }
        
             if( $list->update()){
           return response()->json([
               'success' => true,
                'message'=>'Page Update Successfully',
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
        $pagedelete= Page::destroy($id);
       if($pagedelete) {
           
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

    $category=Pagecategorylist::destroy($id);
        if($category){
    return response()->json([
    'success' => true,
    
],200);

       }
       }
    
   // account active inactive start
   public function pageactive(Request $request){
       
    $id=$request->id;
     $activestatus = Page::find($id);
     $activestatus->status= 1;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
    public function pageinactive(Request $request){
       
    $id=$request->id;
     $activestatus = Page::find($id);
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

 public function parentpage()
    {
        
        $parent = Parentpage::latest()->get();
        if($parent){
        return response()->json([
            'parentpageinfo'=>$parent],200);
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

       //for search
 public function pageinsearch(Request $request){
    $id =$request->s;
     if ($id !==null) {
        return Page::where('admin_id',Auth::guard('admin')->user()->id)->where('language', Auth::guard('admin')->user()->language)->where('pagetitle','LIKE','%%%'.urldecode($id).'%%%')->paginate();
     }
    
else {
    return $this->index();
}
 }
}
