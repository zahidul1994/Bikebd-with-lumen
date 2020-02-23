<?php

namespace App\Http\Controllers\superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brands = Brand::all();
        return view('super_admin.Brand.index')->with('Brands',$Brands);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super_admin.Brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:40',

        ]);
        $newbrn = new Brand();
        // dd($newbrn);
        $newbrn->name = $request->name;

        if($newbrn->save()){
            return redirect('superadmin/brand')->with('message','Brand Created Successfully');
        }
        else {
            return redirect('superadmin/brand')->with('message','Erorr!!');
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
        $brand = Brand::find($id);
        //dd($brand);exit;
        return view('super_admin.Brand.edit',compact('brand'));
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
        $request->validate([
            'name'=>'required|max:40',

        ]);
        $newbrn =  Brand::find($id);

        $newbrn->name = $request->name;

        if($newbrn->save()){
            return redirect('superadmin/Brand')->with('message','Brand Created Successfully');
        }
        else {
            return redirect('superadmin/Brand')->with('message','Erorr!!');
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

        if(Brand::destroy($id)){
            return redirect('superadmin/Brand');
        }
        else{
            return redirect('superadmin/brand');
        }
    }
}
