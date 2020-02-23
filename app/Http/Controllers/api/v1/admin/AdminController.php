<?php

namespace App\Http\Controllers\api\v1\admin;
use App\Shop;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
class AdminController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:Admin-list');
         //$this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'success' =>true,
            'token' => $token,
            'admin'=>Auth::guard('admin')->user(),
             'token_type' => 'bearer',
             'isAuthenticated' => true,
             'expires_in' => Auth::factory()->getTTL() * 60000
        ], 200);
        //redirect('https://www.example.com', 302);
    }
    
    public function login(Request $request)
    {
       
        $this->validate($request,[
                'email' => 'required|email',
            'password' => 'required|min:6|max:30'

        ]);
       //return response($request->all());
       
    
        // $validator = Validator::make($request->all(), [

        //     'email' => 'required|email',
        //     'password' => 'required|min:6|max:30'

        // ]);

        // if ($validator->fails()) {


        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Validation Fails',
        //         'errors' => $validator->errors()->all()
        //     ], 422);
        // }

        
        if (! $token = Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admins=Admin::with('gender','accounttype','status')->where('_id', Auth::guard('admin')->user()->id)->get()->first();
       
       if($admins){
       return response()->json([
           'success'=>true,
           'message'=>'Record Found',
           'adminprofile'=>$admins],200);
    }
    else{
        return response()->json([
            'success'=>false,
            'message'=>'Record Not  Found',
           ],404);
    }
    }
public function shoppaymentcheck(){
    $userpaid=Shop::latest()->get();
    return response()->json([
      'success'=> true,
      'message'=>'Record Found',
      'userpaid'=>$userpaid
  ],200);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Redirect::back('superadmin/dashboard');
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
        'accounttype.required' => 'The account Type field is required.',
        'active.required' => 'The account status field is required.',
        'gender.required' => 'The gender field is required.'
    ]);
    
    //    $validator=Validator::make($request->all(),[
    //     'name' => 'required|max:198|min:3',
    //     'phone' => 'required|max:40|min:11',
    //     'accounttype_id' => 'required',
    //     'status_id' => 'required',
    //     'gender_id' => 'required',
    //     'email' => 'required|email|unique:admins',
    //    'password' => 'required|min:6|max:30', 
    //    'confirm' => 'required|same:password', 
    //   // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
    // ]);
    // if($validator->fails()){
    //     return response()->json([
    //         'success'=>false,
    //         'message'=>'Validation Fails',
    //         'errors'=>$validator->errors()->all()
    //     ],422);
    // }

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

//dd($request);
 $userinfo = new Admin(array(
    'superadmin_id' =>Auth::guard('superadmin')->user()->id,
    'accounttype_id' => $request->accounttype,
    'status_id' => $request->active,
    'gender_id' => $request->gender,
    'name' => $request->accountname,
    'phone' => $request->phone,
    'image' => $name,
    'email' => $request->email,
    'password' =>Hash::make($request->password)
 
));
if($userinfo->save()){
return response()->json([
    'success'=>true,
    'message'=>'Data Create Success',
    'data'=>$userinfo],200);
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $admin = Admin::find($id);
        return response()->json(['admininfo'=>$admin],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
     {
      
        $validator=Validator::make($request->all(),[
            'name' => 'required|max:198|min:3',
            'phone' => 'required|numeric|digits:11',
            'gender_id' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
            'password' => 'min:6|max:30', 
            'confirm' => 'same:password', 
           // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',   
         
        ],
    [
        'gender.required' => 'The Gender field is required.'
    ]);
        // if($validator->fails()){
        //     return response()->json([
        //         'success'=>false,
        //         'message'=>'Validation Fails',
        //         'errors'=>$validator->errors()->all()
        //     ],422);
        // }
    
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
       $list->name = $request->name;
        $list->email = $request->email;
        $list->gender_id = $request->gender_id;
                // $list->password=Hash::make($request->password);
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Admin::where('_id',$id)->first();
        
        $imagepath=public_path('/images/profileimage/').$image->image;
       if(file_exists( $imagepath) && $image->image !='not-found.jpg' ){
           unlink($imagepath);

       }
       $forcedele=  Admin::where('_id', $id)->forcedelete();
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

    // public function adminuserdelete($id)
    // {
       

    // $forcedele=  User::where('id', $id)->forcedelete();
    //     if($forcedele == true) {
           
    //         return Redirect::route('addadmin.index');
           
    //     }
    //     else{  Notify::success("Admin Delete Fail", "Admin");
    //         return Redirect::route('addadmin.index');
    //     }
    // }

       // account active inactive start
    public function shoppaymentactive(Request $request){
       
       $id=$request->id;
        $activestatus = Shop::find($id);
        $activestatus->status= 1;
        $activestatus->admin_id=Auth::guard('admin')->user()->id;
        $activestatus->save();
        if($activestatus->save()) {
            if($activestatus){
                $user=User::where('_id',$activestatus->user_id)->first();
                $user->paidunpaid =1;
                $user->update();
            }
            if($user->save()) {
           
            return response()->json(['success' => true],200);
        } else {
            
            return response()->json(['success' => false,],500);
        }


    }
    }
    
    public function shoppaymentinactive(Request $request){
       
       $id=$request->id;
        $activestatus = Shop::find($id);
        $activestatus->status=2;
        $activestatus->admin_id=Auth::guard('admin')->user()->id;
        $activestatus->save();
        if($activestatus){
            $user=User::where('_id',$activestatus->user_id)->first();
            $user->paidunpaid =2;
            $user->update();
        }
        if($user->save()) {
           
            return response()->json(['success' => true],200);
        } else {
            
            return response()->json(['success' => false,],500);
        }


    }

    // account active inactive area end
    public function deleteusershow(){
        $deleteuser = User::with('admin')->onlyTrashed()->get();
        return view('super_admin.allusers.deleteuser')->with('allusers',$deleteuser);
    }
    // public function restoreuser($id){
    //     User::withTrashed()->find($id)->restore();
    //    Notify::success("User Recover Successfully", "User");
    //         return Redirect::route('addadmin.index');
    // }
}

