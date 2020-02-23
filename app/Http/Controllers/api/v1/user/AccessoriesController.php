<?php

namespace App\Http\Controllers\api\v1\user;

use App\Gender;
use App\Carimage;
use App\Category;
use App\Bikebrand;
use App\Bikemodel;
use App\Accessories;
use App\Accessoriesimge;
use App\Accessoriestype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;


class AccessoriesController extends Controller
{
    public function index()
    {
        //$bikepost=Accessories::with('category','bikeimage')->where('user_id', app('auth')->user()->id)->latest()->get();
        $accessorepost = Accessories::with('category','accessoriesimge')->where('user_id',app('auth')->user()->id)->latest()->get();
       
        if($accessorepost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'accessorieslist'=>$accessorepost],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
     }
    }
    
    public function accusedbike()
    {
        
       
    } 
    
    public function accnewcar()
    {
        
       
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
        //   'condition' => 'required',
            'waight' => 'required',
            'accessoriestypename' => 'required',
            'accessoriesname' => 'required|min:3|max:30',
            'madeby' => 'required',
            'size' => 'required',
            'color' => 'required',
            'material' => 'required',
            'description' => 'required|min:6|max:300',
            'price' => 'required',
           
        
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
        ],
        [
           
            
            'category.required' => 'The category  field is required.',
            'material.required' => 'The material  field is required.',
            'accessoriesname.required' => 'The accessories name  field is required.',
            //'condition.required' => 'The condition  field is required.',
            'madeby.required' => 'The made by run  field is required.',
            //'usedtime.required' => 'The used time type  field is required.',
            'accessoriestypename.required' => 'The accessoriestypename  field is required.',
            'color.required' => 'The bike color  field is required.',
            'size.required' => 'The size  field is required.',
            'bikemodel.required' => 'The bike model  field is required.',
            'price.required' => 'The price  field is required.',
            'waight.required' => 'The waight  field is required.',
           
        ]);
        

    $list = New Accessories();
    $list->user_id  = app('auth')->user()->id;
    $list->admin_id =app('auth')->user()->admin_id; 
    $list->newused = 'new';
    $list->category_id =$request->category;
    $list->accessoriesname =$request->accessoriesname;
    $list->madeby =$request->madeby;
    $list->accessoriestype_id =$request->accessoriestypename;
    $list->color =$request->color;
    $list->size =$request->size;
    $list->waight =$request->waight;
    // $list->startingmethod=$request->startingmethod;
    $list->material=$request->material;
    $list->description =$request->description;
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
            $upload_path = public_path()."/images/accpostimage/";
            $img->save($upload_path.$name);
            $image = new Accessoriesimge();
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
            $accessoriesdetails=Accessories::with('category','accessoriesimge','accessoriestype','user')->where('_id',$id)->get();
           
            if($accessoriesdetails){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'accessoriesdetails'=>$accessoriesdetails],200);
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
        $accessoriesnewbike=Accessories::with('accessoriesimge','category')->find($id);
        return response()->json([
            'success'=>true,
            'message'=>"Record Found",
            'accnewbikeinfo'=>$accessoriesnewbike
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
       
        $this->validate($request,[
            'category_id' => 'required|min:3|max:80',  //for used accessoreis bike edit
        //   'condition' => 'required',
            'waight' => 'required',
            'accessoriestype_id' => 'required|min:3|max:30',
            'accessoriesname' => 'required|min:3|max:30',
            'madeby' => 'required',
            'size' => 'required',
            'color' => 'required',
            'material' => 'required',
            'description' => 'required|min:6|max:300',
            'price' => 'required',
           
        
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
        ],
        [
           
            
            'category_id.required' => 'The category  field is required.',
            'material.required' => 'The material  field is required.',
            'accessoriesname.required' => 'The accessories name  field is required.',
            //'condition.required' => 'The condition  field is required.',
            'madeby.required' => 'The made by run  field is required.',
            //'usedtime.required' => 'The used time type  field is required.',
            'accessoriestype_id.required' => 'The accessories type   field is required.',
            'color.required' => 'The bike color  field is required.',
            'size.required' => 'The size  field is required.',
            'price.required' => 'The price  field is required.',
            'waight.required' => 'The waight  field is required.',
           
        ]);
        

   
    $list = Accessories::find($id);
    $list->user_id  = app('auth')->user()->id;
    $list->admin_id =app('auth')->user()->admin_id; 
    $list->category_id =$request->category_id;
    $list->accessoriesname =$request->accessoriesname;
    $list->madeby =$request->madeby;
    $list->accessoriestype_id =$request->accessoriestype_id;
    $list->color =$request->color;
    $list->size =$request->size;
    $list->waight =$request->waight;
    // $list->startingmethod=$request->startingmethod;
    $list->material=$request->material;
    $list->description =$request->description;
    $list->price = $request->price;
    $list->negotiable = $request->negotiable?:"false";
    $list->active = 2; 
    $list->save();
    if ($list->id) {
        $image=$request->accessoriesimge1;
        if($image ){
            //return response($value['path']);
            $strpos = strpos($value['path'],';');
            $sub = substr($value['path'],0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $name = time() . "_" .app('auth')->user()->id. "_" . $rand . "." .$ex;
            $img = Image::make($value['path'])->resize(200, 200);
            $upload_path = public_path()."/images/accpostimage/";
            $img->save($upload_path.$name);
            $image = new Accessoriesimge();
            $image->user_id  = app('auth')->user()->id;
            $image->post_id =$list['id'];
            $image->image =$name;
            $image->save();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Accessoriesimge::where('post_id',$id)->get();
        foreach ($image as $img ){
        $imagepath=public_path('/images/accpostimage/').$img->image;
       if(file_exists( $imagepath) && $img->image !='not-found.jpg' ){
           unlink($imagepath);
           $ide=Accessoriesimge::find($img->id);
           $ide->delete();

       }
    }
       $forcedele= Accessories::where('_id', $id)->delete();
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


    public function deleteaccnewbikeimage($id)
    {
        $img=Accessoriesimge::find($id);
     
        $imagepath=public_path('/images/accpostimage/').$img->image;
       if(file_exists( $imagepath) && $img->image !='not-found.jpg' ){
           unlink($imagepath);
           $ide=Accessoriesimge::find($id);
           $ide->delete();
           return response()->json([
            'success' => true,
            
        ],200);

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


      public function accessoriestype()
    {
        
        $accessoriestype = Accessoriestype::latest()->get();
        if($accessoriestype){
        return response()->json([
            'success'=>true,
            'message'=>'Accessories List',
            'accessoriestype'=>$accessoriestype],200);
    }
    else{
        return response()->json([
            'success'=>true,
            'message'=>' Record Not Found'
        ],404);
      
    }
}
}
