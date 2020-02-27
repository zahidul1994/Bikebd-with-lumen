<?php


namespace App\Http\Controllers\api\v1\superadmin;
use DB;
use App\Permissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Permissions::paginate(7);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('super_admin.roles.create',compact('permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions',
            
        ]);

        $list = new Permission();
        $list->name = $request->name;
        $list->guard_name = 'superadmin';
        $list->save();
        if ($list->save()) {
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
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->all();


        return view('super_admin.roles.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Permission::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'permission' => $info], 200);
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
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,'.$id,
            
        ]);

        $list =Permission::find($id);
        $list->name = $request->name;
       $list->save();
        if ($list->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Record Update Successfully',
                ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Record Create Failed',
            ], 404);
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
        if (Permission::destroy($id)) {
           
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
}
