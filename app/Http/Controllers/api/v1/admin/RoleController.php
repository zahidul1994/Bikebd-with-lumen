<?php


namespace App\Http\Controllers\admin;


use DB;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class RoleController extends Controller

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

        $roles = Role::where('admin_id', Auth::user()->id)->orderBy('id','DESC')->paginate(5);

        return view('admin.roles.index',compact('roles'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $permission = Permission::all();

        return view('admin.roles.create',compact('permission'));

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

            'name' =>['required', Rule::unique('roles')->where(function ($query) {
    return $query->where('admin_id', Auth::user()->id);
})   ]

        ]);


        $role = Role::create(['name'=> $request->input('name').Auth::user()->id,'admin_id'=>Auth::user()->id,'created_by' =>Auth::user()->owner_name]);

        $role->syncPermissions($request->input('permission'));


        return redirect()->route('userrole.index')->with('success','Role created successfully');

    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $role = Role::where('admin_id', Auth::user()->id)->orderBy('id','DESC')->find($id);

        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")

            ->where("role_has_permissions.role_id",$id)

            ->get();


        return view('admin.roles.show',compact('role','rolePermissions'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $role = Role::where('admin_id', Auth::user()->id)->orderBy('id','DESC')->find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)

            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')

            ->all();


        return view('admin.roles.edit',compact('role','permission','rolePermissions'));

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

            'name' => 'required|unique:roles,name,' . $id,


            // 'permission' => 'required',

        ]);


        $role = Role::where('admin_id', Auth::user()->id)->orderBy('id','DESC')->find($id);

        $role->name = $request->input('name').Auth::user()->id;
        $role->admin_id = Auth::user()->id;
        $role->created_by = Auth::user()->owner_name;

        $role->save();


        $role->syncPermissions($request->input('permission'));


        return redirect()->route('userrole.index')

                        ->with('success','Role updated successfully');

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        DB::table("roles")->where('id',$id)->delete();

        return redirect()->route('userrole.index')

                        ->with('success','Role deleted successfully');

    }

}