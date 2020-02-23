<?php
namespace App\Http\Controllers\api\v1\user;
use App\User;
use App\Gender;
use App\Location;
use App\Shop;
use App\Sublocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    public function index(){
        $userinfo=User::with('gender','location','sublocation')->where('_id', app('auth')->user()->id)->get()->first();
        //dd($superadmin);
        if($userinfo){
            return response()->json([
                'success'=>true,
                'message'=>'User Info',
                'userinfo'=>$userinfo,
            ],200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'User Not Found'],404);
        }
      }



    public function update(Request $request, $id)
    
    {
   
        $this->validate($request,[
            'username' => 'required|min:3|max:80',
            'userphone' => 'required|numeric|digits:11',
            'gender_id' => 'required',
            // 'country' => 'required|min:3|max:80',
            // 'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'min:6|max:30',
            'confirm' => 'same:password',
            'division_id' => 'required',
            'subdivision_id' => 'required',
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
        ],
        [
           
            'username.required' => 'The Your Name  field is required.',
            'username.required' => 'The Gender field is required.',
            'status.required' => 'The Status field is required.',
            'userphone.required' => 'The Phone  field is required.',
            'gender.required' => 'The Gender field is required.',
            'status.required' => 'The Status field is required.'
        ]);
        if ($request->userimage !=app('auth')->user()->userimage ) {
            $strpos = strpos($request->userimage,';');
                $sub = substr($request->userimage,0,$strpos);
                $ex = explode('/',$sub)[1];
                $rand = mt_rand(100000, 999999);
                $name = time() . "_" . Auth::id() . "_" . $rand . "." .$ex;
                $img = Image::make($request->userimage)->resize(200, 200);
                $upload_path = public_path()."/images/profileimage/";
                $img->save($upload_path.$name);
        }
        else{
         $name = app('auth')->user()->userimage;
        };

    $list = User::find($id);
        $list->userphone = $request->userphone;
    $list->username = $request->username;
    $list->gender_id =$request->gender_id;
    $list->division_id =$request->division_id;
    $list->subdivision_id =$request->subdivision_id;
      $list->userimage = $name;
   
    $list->save();

    if ($list->id) {
      return response()->json([
          'success' => true,
           'message'=>'User Create Successfully',
           'user'=>$list
      ],201);
    } else {
        return response()->json([
            'success' => false,
             'message'=>'User Create Failed',
             
        ],404);
    }
}



public function updateemail(Request $request, $id)
    
{

    $this->validate($request,[
        
        'email' => 'required|email|unique:users,email,'.$id,
          
   
    ]);
    
$id1=app('auth')->user()->id();
$list = User::find($id1);
    $list->email = $request->email;
$list->save();

if ($list->id) {
  return response()->json([
      'success' => true,
       'message'=>'Email Update Successfully',
         ],201);
} else {
    return response()->json([
        'success' => false,
         'message'=>'User Create Failed',
         
    ],404);
}
}
    public function edit($id)
    {
  $info = User::find($id);

  return response()->json(['userinfo' => $info], 200);
    }


public function updatepassword(Request $request, $id){
    
    $this->validate($request, [
       'updatepassword' => 'required|min:6|max:20',
        'confirm' => 'same:updatepassword',
    ]);
    $user=User::find( app('auth')->user()->id);
    $user->password=Hash::make($request->updatepassword);
    $user->update();
    if ($user->update()) {
        return response()->json([
            'success'=> true,
            'message'=>'Record Found',
                      
        ],200);
    }
        else {
            return response()->json([
                'success' => false,
                 'message'=>'Record Not found',
                 'password'=>bcrypt($id),
                 
            ],404);
           
    }

   
    
}
public function passwordcheeck($password){
    $user=User::where('_id', app('auth')->user()->id)->where('password', '=',Hash::make($password))->get()->first();
    if ($user) {
        return response()->json([
            'success'=> true,
            'message'=>'Record Found',
            'password'=>$password,
            
        ],200);
    }
        else {
            return response()->json([
                'success' => false,
                 'message'=>'Record Not found',
                 'password'=> Hash::make($password),
                 
            ],404);
           
    }
}
  public function paidview(){
      $userpaid=Shop::where('user_id', app('auth')->user()->id)->get();
      return response()->json([
        'success'=> true,
        'message'=>'Record Found',
        'userpaid'=>$userpaid
    ],200);
  } 
   

public function destroy($id)
{
    $user = User::find($id);
    if(is_null($user)){
     return response()->json(["message"=>"Record not found"],404); 
    }

 $user = User::findOrFail($id);
 $user->delete();
 return response()->json([
     'success'=> true,
     'message'=>'Record Delete Successfully',
     'value'=>$user
 ],200);
 

}



   
    }
