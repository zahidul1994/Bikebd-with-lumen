<?php

namespace App\Http\Controllers\api\v1\superadmin;
use App\User;
use App\Admin;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Admin::with('gender','status')->latest()->paginate(3);
       
      
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


  
    $this->validate($request,[
        'accountname' => 'required|max:198|min:3',
        'phone' => 'required|numeric|digits:11',
        'language' => 'required',
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
        'superadmin_id' =>Auth::guard('superadmin')->user()->id,
        'language' => $request->language,
        'status_id' => $request->active,
        'gender_id' => $request->gender,
        'name' => $request->accountname,
        'phone' => $request->phone,
        'image' => $name,
        'email' => $request->email,
        'password' =>Hash::make($request->password)
     
    ));


        if($userinfo->save()){
            $userinfo->assignRole($request->input('roles'));
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
        return response()->json(['teammemberlist'=>$admin],200);
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
            'language' => 'required',
            'status_id' => 'required',
            'gender_id' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
           // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',   
         
        ],
        [
            'name.required' => 'The account name type field is required.',
            
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


        $list =  Admin::find($id);
        if(!empty($request->password)){
            $request->merge([ $list->password => Hash::make($request['password'])]);
        }
        
        $list->language = $request->language;
        $list->name = $request->name;
        $list->email = $request->email;
        $list->gender_id = $request->gender_id;
        $list->status_id = $request->status_id;
        $list->superadmin_id = Auth::guard('superadmin')->user()->id;
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
        $image=Admin::find($id);
        
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

    public function adminuserdelete($id)
    {
       

    $forcedele=  User::where('id', $id)->forcedelete();
        if($forcedele == true) {
            Notify::success("Admin Delete Successfully", "Admin");
            return Redirect::route('addadmin.index');
           
        }
        else{
            Notify::success("Admin Delete Fail", "Admin");
            return Redirect::route('addadmin.index');
        }
    }

       // account active inactive start
    public function setapproval(Request $request){
       
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
    
    public function adminsetstatusactive(Request $request){
       
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

    // account active inactive area end
    public function deleteusershow(){
        $deleteuser = User::with('admin')->onlyTrashed()->get();
        return view('super_admin.allusers.deleteuser')->with('allusers',$deleteuser);
    }
    public function restoreuser($id){
        User::withTrashed()->find($id)->restore();
       Notify::success("User Recover Successfully", "User");
            return Redirect::route('addadmin.index');
    }

    public function allrolename(Request $request){
        // return response('hi');
        $role = Role::all();
        return response()->json(['allrolename'=>$role],200);
    }
}

