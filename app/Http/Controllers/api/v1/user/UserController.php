<?php
namespace App\Http\Controllers\api\v1\user;
use App\User;
use App\Gender;
use App\Location;
use App\Sublocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'success' =>true,
            'token' => $token,
            'token_type' => 'bearer',
            'user'=> app('auth')->user(),
             'expires_in' => Auth::factory()->getTTL() * 6000
        ], 200);
        //redirect('https://www.example.com', 302);
    }


    public function login(Request $request)
    {
       
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6|max:30'

        ]);
          
        if (! $token =app('auth')->attempt(['email' => $request->email, 'password' => $request->password,'status_id'=>'5de6435d230300006d006552'])) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function store(Request $request)
    
    {
   
        $this->validate($request,[
            'username' => 'required|min:3|max:80',
            'userphone' => 'required|numeric|digits:11',
            'gender' => 'required',
            // 'country' => 'required|min:3|max:80',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:30',
            'confirm' => 'required|same:password',
            'division' => 'required',
            'subdivision' => 'required',
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:6048',     
        ],
        [
           
            'userphone.required' => 'The Phone  field is required.',
            'gender.required' => 'The Gender field is required.',
            'status.required' => 'The Status field is required.'
        ]);
        if ($request->userimage!=null) {
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
         $name = 'not-found.jpg';
        };

    $list = new User();
    //$list->created_by  = app('auth')->user()->id;
    $list->admin_id =null;
    $list->userphone = $request->userphone;
    $list->username = $request->username;
    $list->paidunpaid =2;
    $list->shoptype =0;
    $list->gender_id =$request->gender;
    $list->division_id =$request->division;
    $list->subdivision_id =$request->subdivision;
    $list->status_id ='5de6435d230300006d006553';
    $list->email = $request->email;
    $list->password = Hash::make($request->password);
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




public function genderlist()
{
    
    $gen = Gender::latest()->get();
    if($gen){
    return response()->json([
        'success'=>true,
        'message'=>'Gender List',
        'gender'=>$gen],200);
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

public function division()
    {
        
        $location = Location::latest()->get();
        if($location){
        return response()->json([
            'success'=>true,
            'message'=>'Division List',
            'division'=>$location],200);
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
    public function subdivisionlist()
    {
        
        $location = Sublocation::with('location')->latest()->get();
        if($location){
        return response()->json([
            'success'=>true,
            'message'=>'Sub-division List',
            'subdivision'=>$location],200);
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
    public function subdivision($id)
    {
        
        $location = Sublocation::where('division_id', $id)->get();
        if($location){
        return response()->json([
            'success'=>true,
            'message'=>'Sub-division List Found',
            'subdivision'=>$location],200);
    }
    else{
        return response()->json([
            'success'=>false,
            'message'=>' Record Not Found'
        ],404);
      
    }
        //dd($purchase);
       // 
    }

   
    }
