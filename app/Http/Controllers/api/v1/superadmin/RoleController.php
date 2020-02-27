<?php
namespace App\Http\Controllers\api\v1\superadmin;
use App\Accounttype;
use App\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
public function index()
{
    return Role::paginate(7);
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
       //return response($request->all());
        // $validator = Validator::make($request->all(), [

        //     'accounttype' => 'required|min:3|max:15|unique:accounttypes',

        // ]);

        // if ($validator->fails()) {


        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Validation Failed',
        //         'errors' => $validator->errors()->all()
        //     ], 422);
        // }
        $this->validate($request,[
            
            'name' => 'required|unique:roles',
            'permission' => 'required',

        ]);

        $role = Role::create(['name' => $request->input('name'),'guard_name'=>'superadmin']);
        $role->syncPermissions($request->input('permission'));
        if ($role) {
            return response()->json([
                'success' => true,
                'message' => 'Record Create Successfully',
               ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Record Create Failed',
            ], 404);
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
       
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")

            ->where("role_has_permissions.role_id",$id)

            ->get();
            return response()->json([
                 'rolepermissiondetails' =>$rolePermissions], 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->get('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
       
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'editroleinfo' => $role,
                'permission' => $permission,
                'rolepermissioninfo' =>$rolePermissions], 200);
     
       

        
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
         // $validator = Validator::make($request->all(), [
 
         //     'accounttype' => 'required|min:3|max:15|unique:accounttypes',
 
         // ]);
 
         // if ($validator->fails()) {
 
 
         //     return response()->json([
         //         'success' => false,
         //         'message' => 'Validation Failed',
         //         'errors' => $validator->errors()->all()
         //     ], 422);
         // }
         $this->validate($request,[
             
             'name' => 'required|unique:roles,name,'.$id,

             'permission' => 'required',
 
         ]);
 
         $role = Role::find($id);
         $role->name=$request->name;
         $role->save();
         $role->syncPermissions($request->input('permission'));
         if ($role) {
             return response()->json([
                 'success' => true,
                 'message' => 'Record Create Successfully',
                ], 201);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'Record Create Failed',
             ], 404);
         }
     }
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Role::destroy($id)) {
           
            return response()->json([
                'success' => true,
                'message'=>'Record Delete Successfully'
            ],200);
        } else {
            
            return response()->json([
                'success' => false,
                 'message'=>'Record Not Found',
                'id'=>$id],404);
        }
    
    }
    public function allpermissionlist(){
        $info = Permission::all();
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'permissionlist' => $info], 200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'Record Not Found',
                'id' => $id], 404);
        }

    }
}
