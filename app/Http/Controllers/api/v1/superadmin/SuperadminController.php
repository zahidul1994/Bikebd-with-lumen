<?php
namespace App\Http\Controllers\api\v1\superadmin;
use App\Superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class SuperadminController extends Controller
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
            'superadmin'=>Auth::guard('superadmin')->user(),
             'token_type' => 'bearer',
             //'expires_in' => Auth::factory()->getTTL() * 60
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

        
        if (! $token = Auth::guard('superadmin')->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function profile(){
      $superadmin=Auth::guard('superadmin')->user();
      //dd($superadmin);
      if($superadmin){
          return response()->json([
              'success'=>true,
              'message'=>'Superadmin Info',
              'superadmininfo'=>$superadmin,
          ],200);
      }
      else{
          return response()->json([
              'success'=>false,
              'message'=>'Superadmin Not Found'],404);
      }
    }

   
    }
