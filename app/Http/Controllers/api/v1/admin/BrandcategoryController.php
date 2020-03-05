<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Brandcategory;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrandcategoryController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:Admin-List');
         //$this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        
        return Brandcategory::with('company')->where('admin_id',Auth::guard('admin')->user()->id)->latest()->paginate(7);
      
        //dd($purchase);
       // 
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
       // return response($request->all());
        $this->validate($request,[
            'company_id' => 'required',
            'brandcategory' => 'required|min:3|max:160|unique:brandcategories',
            
        ]);

 
    $list = new Brandcategory();
    $list->company_id = $request->company_id;
    $list->brandcategory = $request->brandcategory;
     $list->admin_id = Auth::guard('admin')->user()->id;
     $list->save();

        if( $list->save()){
      return response()->json([
          'success' => true,
           
      ],201);
    } else {
        return response()->json([
            'success' => false,
             
             
        ],404);
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
        $blogpost = Brandcategory::with('blogcategorylist')->where('admin_id', Auth::guard('admin')->user()->id)->find($id);
       
        if($blogpost){
        return response()->json([
            'success'=>true,
            'message'=>'Record Found',
            'blogpostdetails'=>$blogpost],200);
     }
     else{
         return response()->json([
             'success'=>false,
             'message'=>'Record Not  Found',
            ],404);
    }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $info = Brandcategory::where('admin_id', Auth::guard('admin')->user()->id)->find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'brandcategory' => $info], 200);
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
         //return response($request->all());
         $this->validate($request,[
            'company_id' => 'required',
            'brandcategory' => 'required|min:3|max:160|unique:brandcategories,brandcategory,'.$id,
            
        ]);

 
    $list =Brandcategory::find($id);
    $list->company_id = $request->company_id;
    $list->brandcategory = $request->brandcategory;
     $list->admin_id = Auth::guard('admin')->user()->id;
     $list->save();

        if( $list->save()){
      return response()->json([
          'success' => true,
           
      ],201);
    } else {
        return response()->json([
            'success' => false,
             
             
        ],404);
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

    $brandcategory=Brandcategory::destroy($id);
        if($brandcategory){
    return response()->json([
    'success' => true,
    
],200);

       }
       }
       
       
        
        public function getbrandcategory($id)
        {

        $brandcategory=Brandcategory::where('company_id',$id)->get();
            if($brandcategory){
        return response()->json([
        'success' => true,
        'brandcategory' => $brandcategory,
        
    ],200);

        }
        }
    
   // account active inactive start
   public function companyactive(Request $request){
       
    $id=$request->id;
     $activestatus = Company::find($id);
     $activestatus->status= 1;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
    public function companydactive(Request $request){
       
    $id=$request->id;
     $activestatus = Company::find($id);
     $activestatus->status= 2;
     $activestatus->admin_id=Auth::guard('admin')->user()->id;
     $activestatus->save();
     if($activestatus->save()) {
                
         return response()->json(['success' => true],200);
     } else {
         
         return response()->json(['success' => false,],500);
     }


 }
 
 // account active inactive area end








}
