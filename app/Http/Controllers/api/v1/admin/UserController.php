<?php
namespace App\Http\Controllers\api\v1\admin;
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
    public function index(){
        $alluserlist=User::with('gender','location','sublocation')->get();
        //dd($superadmin);
        if($alluserlist){
            return response()->json([
                'success'=>true,
                'message'=>'User Info',
                'alluserlist'=>$alluserlist,
            ],200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'User Not Found'],404);
        }
    }
    
       // account active inactive start
       public function setapproval(Request $request){
       
        $id=$request->id;
         $activestatus = User::find($id);
         $activestatus->status_id='5de6435d230300006d006553';
         $activestatus->admin_id=Auth::guard('admin')->user()->id;
         $activestatus->save();
         if($activestatus->save()) {
            
             return response()->json(['success' => true],200);
         } else {
             
             return response()->json(['success' => false,],500);
         }
 
 
     }
     
     public function adminsetstatusactive(Request $request){
        
        $id=$request->id;
         $activestatus = User::find($id);
         $activestatus->status_id='5de6435d230300006d006552';
         $activestatus->admin_id=Auth::guard('admin')->user()->id;
         $activestatus->save();
         if($activestatus->save()) {
            
             return response()->json(['success' => true],200);
         } else {
             
             return response()->json(['success' => false,],500);
         }
 
 
     }
     public function destroy($id)
     {
         $image=User::where('_id',$id)->first();
         
         $imagepath=public_path('/images/profileimage/').$image->userimage;
        if(file_exists( $imagepath) && $image->userimage !='not-found.jpg' ){
            unlink($imagepath);
 
        }
        $forcedele=  User::where('_id', $id)->forcedelete();
        if($forcedele == true) {
            
             return response()->json([
                 'success' => true,
                 'message'=>'Data Delete Successfully'
             ],200);
         } else {
             
             return response()->json([
                 'success' => false,
                 'message'=>'Record Not Found',
                 'id'=>$id  
               ],404);
         }
     
     }


     public function manager(){
        $Userlist=User::with('gender','location','sublocation','status')->where('admin_id',Auth::guard('admin')->user()->id)->get();
        //dd($superadmin);
        if($Userlist){
            return response()->json([
                'success'=>true,
                'message'=>'User Info',
                'userlist'=>$Userlist,
            ],200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'User Not Found'],404);
        }
    }
   
    }
