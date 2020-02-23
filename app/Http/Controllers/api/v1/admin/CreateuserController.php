<?php

namespace App\Http\Controllers\api\v1\admin;

use App\User;
use App\Admin;
use App\Gender;
use App\Status;
use App\Createuser;
use App\Accounttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CreateuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $admins=User::with('gender','accounttype','status')->latest()->get();
        
        if($admins){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'teammemberlist'=>$admins],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
     }
     }

     public function adminview()
     {
         
         $admins1=Admin::with('gender','accounttype','status')->latest()->get();
         
         if($admins1){
         return response()->json([
             'success'=>true,
             'message'=>'Record Found',
             'adminteammemberlist'=>$admins1],200);
      }
      else{
          return response()->json([
              'success'=>false,
              'message'=>'Record Not  Found',
             ],404);
      }
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
    
     if ($request->photo!=null) {
        $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $rand = mt_rand(100000, 999999);
            $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/images/profileimage/";
            $img->save($upload_path.$name);
    }
    else{
     $name = 'not-found.jpg';
    };
    
    if ($request->accounttype==2){
        $this->validate($request,[
            'accountname' => 'required|max:198|min:3',
            'phone' => 'required|numeric|digits:11',
            'accounttype' => 'required',
            'active' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:30', 
            'confirm' => 'required|same:password', 
    
            ],
        [
            'accountname.required' => 'The account name field is required.',
            'accounttype.required' => 'The account type  field is required.',
            'active.required' => 'The active status field is required.',
            'gender.required' => 'The gender field is required.',
            'phone.required' => 'The phone field is required.',
        ]);
     $userinfo = new User(array(
        //'superadmin_id' =>Auth::guard('superadmin')->user()->id,
        'admin_id' =>Auth::guard('admin')->user()->id,
        'accounttype_id' => $request->accounttype,
        'status_id' => $request->active,
        'gender_id' => $request->gender,
        'name' => $request->accountname,
        'phone' => $request->phone,
        'image' => $name,
        'email' => $request->email,
        'password' =>Hash::make($request->password)
     
    ));
    }
    else{
        $this->validate($request,[
            'accountname' => 'required|max:198|min:3',
            'phone' => 'required|numeric|digits:11',
            'accounttype' => 'required',
            'active' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|max:30', 
            'confirm' => 'required|same:password', 
    
            ],
        [
            'accountname.required' => 'The account name field is required.',
            'accounttype.required' => 'The account type  field is required.',
            'active.required' => 'The active status field is required.',
            'gender.required' => 'The gender field is required.',
            'phone.required' => 'The phone field is required.',
        ]);
        $userinfo = new Admin(array(
            //'superadmin_id' =>Auth::guard('superadmin')->user()->id,
            'admin_id' =>Auth::guard('admin')->user()->id,
            'accounttype_id' => $request->accounttype,
            'status_id' => $request->active,
            'gender_id' => $request->gender,
            'name' => $request->accountname,
            'phone' => $request->phone,
            'image' => $name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
         
        ));
    
    }
    if($userinfo->save()){
    return response()->json([
        'success'=>true,
        'message'=>'Data Create Success',
        'data'=>'user'],200);
    }
    else{
        return response()->json([
            'success'=>false,
            'message'=>'Data Create Faild',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        return response()->json(['teammemberlist'=>$admin],200);
    }  
    public function editadmin($id)
    {
        $admin = Admin::find($id);
        return response()->json(['adminteammemberlist'=>$admin],200);
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
      
        $validator=Validator::make($request->all(),[
            'name' => 'required|max:198|min:3',
            'phone' => 'required|numeric|digits:11',
            'accounttype_id' => 'required',
            'status_id' => 'required',
            'gender_id' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
           // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',   
         
        ],
        [
            'name.required' => 'The account name type field is required.',
            'accounttype.required' => 'The account type field is required.',
            'active.required' => 'The active Status field is required.',
            'gender.required' => 'The gender field is required.',
            'phone.required' => 'The phone field is required.',
        ]);
    
    $image=User::find($id);
 if (($request->image != $image->image)) {
      $imagepath=public_path('/images/profileimage/').$image->image;
    if(file_exists( $imagepath) && $image->image !='not-found.jpg' ){
        unlink($imagepath);

    }
    $strpos = strpos($request->image,';');
        $sub = substr($request->image,0,$strpos);
        $ex = explode('/',$sub)[1];
        $rand = mt_rand(100000, 999999);
        $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
        $img = Image::make($request->image)->resize(200, 200);
        $upload_path = public_path()."/images/profileimage/";
        $img->save($upload_path.$name);
}
else{
 $name = $image->image;
};

if(!empty($request->password)){
    $request->merge(['password' => Hash::make($request['password'])]);
}

        $list =  User::find($id);
        $list->accounttype_id = $request->accounttype_id;
        $list->name = $request->name;
        $list->email = $request->email;
        $list->gender_id = $request->gender_id;
        $list->status_id = $request->status_id;
        $list->phone = $request->phone;
        //$list->superadmin_id = Auth::guard('superadmin')->user()->id;
         $list->password=Hash::make($request->password);
        $list->image = $name;
        $list->update();
        if($list->update()){
            return response()->json([
                'success'=>true,
                'message'=>'Data Update Success',
                'data'=>$list],200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'Data Update Faild',
                 'id'=>$id,
        
            ],404);
        }
        

}

public function updateadmin(Request $request, $id)
{
  
    $validator=Validator::make($request->all(),[
        'name' => 'required|max:198|min:3',
        'phone' => 'required|numeric|digits:11',
        'accounttype_id' => 'required',
        'status_id' => 'required',
        'gender_id' => 'required',
        'email' => 'required|email|unique:admins,email,'.$id,
       // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',   
     
    ],
    [
        'name.required' => 'The account name type field is required.',
        'accounttype.required' => 'The account type field is required.',
        'active.required' => 'The active Status field is required.',
        'gender.required' => 'The gender field is required.',
        'phone.required' => 'The phone field is required.',
    ]);

$image=Admin::find($id);
if (($request->image != $image->image)) {
  $imagepath=public_path('/images/profileimage/').$image->image;
if(file_exists( $imagepath) && $image->image !='not-found.jpg' ){
    unlink($imagepath);

}
$strpos = strpos($request->image,';');
    $sub = substr($request->image,0,$strpos);
    $ex = explode('/',$sub)[1];
    $rand = mt_rand(100000, 999999);
    $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
    $img = Image::make($request->image)->resize(200, 200);
    $upload_path = public_path()."/images/profileimage/";
    $img->save($upload_path.$name);
}
else{
$name = $image->image;
};

if(!empty($request->password)){
$request->merge(['password' => Hash::make($request['password'])]);
}

    $list =  Admin::find($id);
    $list->accounttype_id = $request->accounttype_id;
    $list->name = $request->name;
    $list->email = $request->email;
    $list->gender_id = $request->gender_id;
    $list->status_id = $request->status_id;
    $list->phone = $request->phone;
    //$list->superadmin_id = Auth::guard('superadmin')->user()->id;
     $list->password=Hash::make($request->password);
    $list->image = $name;
    $list->update();
    if($list->update()){
        return response()->json([
            'success'=>true,
            'message'=>'Data Update Success',
            'data'=>$list],200);
    }
    else{
        return response()->json([
            'success'=>false,
            'message'=>'Data Update Faild',
             'id'=>$id,
    
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
        $image=User::where('id',$id)->first();
        
        $imagepath=public_path('/images/profileimage/').$image->image;
       if(file_exists( $imagepath) && $image->image !='not-found.jpg' ){
           unlink($imagepath);

       }
       $forcedele=  User::where('id', $id)->forcedelete();
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

    public function admindestroy($id)
    {
        $image=Admin::where('id',$id)->first();
        
        $imagepath=public_path('/images/profileimage/').$image->image;
       if(file_exists( $imagepath) && $image->image !='not-found.jpg' ){
           unlink($imagepath);

       }
       $forcedele=  Admin::where('id', $id)->forcedelete();
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

        public function accounttype()
    {
        
        $accounttype = Accounttype::latest()->get();
        if($accounttype){
        return response()->json([
            'success'=>true,
            'message'=>'Accounttype List',
            'hiaccount'=>$accounttype],200);
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

    
   
    public function gender()
    {
        
        $gender = Gender::latest()->get();
        if($gender){
        return response()->json([
            'success'=>true,
            'message'=>'Gender List',
            'genderinfo'=>$gender],200);
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

    public function status()
    {
        
        $status = Status::latest()->get();
        if($status){
        return response()->json([
            'success'=>true,
            'message'=>'Status List',
            'statusinfo'=>$status],200);
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

     // account user create active inactive start
     public function setapproval(Request $request){
       
        $id=$request->id;
         $activestatus = User::find($id);
         $activestatus->status_id='1';
         $activestatus->save();
         if($activestatus->save()) {
            
             return response()->json(['success' => true],200);
         } else {
             
             return response()->json(['success' => false,],500);
         }
 
 
     }
     
     public function adminusercreateactive(Request $request){
        
        $id=$request->id;
         $activestatus = User::find($id);
         $activestatus->status_id='2';
         $activestatus->save();
         if($activestatus->save()) {
            
             return response()->json(['success' => true],200);
         } else {
             
             return response()->json(['success' => false,],500);
         }
 
 
     }
 
     // account user create  active inactive area end

  // account user create active inactive start
  public function setapprovaladmin(Request $request){
       
    $id=$request->id;
     $activestatus = Admin::find($id);
     $activestatus->status_id='1';
     $activestatus->save();
     if($activestatus->save()) {
        
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
 
 public function adminusercreateactiveadmin(Request $request){
    
    $id=$request->id;
     $activestatus = Admin::find($id);
     $activestatus->status_id='2';
     $activestatus->save();
     if($activestatus->save()) {
        
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }

 // account user create  active inactive area end

}
