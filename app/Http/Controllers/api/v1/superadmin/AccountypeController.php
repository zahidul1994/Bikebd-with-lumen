<?php
namespace App\Http\Controllers\api\v1\superadmin;

use App\Accounttype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AccountypeController extends Controller
{
public function index()
{
    $accounttype = Accounttype::latest()->get();
    if ($accounttype) {
        return response()->json([
            'success' => true,
            'message' => 'Record Found',
            'accounttype' => $accounttype
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'Message' => 'Record Not Found.'
        ], 404);
    }
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
            
            'accounttype' => 'required|min:3|max:15|unique:accounttypes',

        ],
        [
            'accounttype.required'=>"The account type field is required",
            'accounttype.min'=>"The account type must be at least 3 characters",
            'accounttype.max'=>"The account type must be at least 15 characters",
             ]);

        $list = new Accounttype();
        $list->accounttype = $request->accounttype;
        $list->created_by  =  Auth::guard('superadmin')->user()->superadminname;
        $list->superadmin_id =  Auth::guard('superadmin')->user()->id;
        $list->save();
        if ($list->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Record Create Successfully',
                'value' => $list
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $info = Accounttype::find($id);
        if($info){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'accounttypes' => $info], 200);
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

        $this->validate($request,[
            
            'accounttype' => 'required|min:3|max:15|unique:accounttypes,accounttype,' . $id,

        ],[
        'accounttype.required'=>"The account type field is required",
        'accounttype.min'=>"The account type must be at least 3 characters",
        'accounttype.max'=>"The account type must be at least 15 characters",
         ]);
        // $validator = Validator::make($request->all(), [

        //     'accounttype' => 'required|min:3|max:15|unique:accounttypes,accounttype,' . $id,

        // ]);



        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Validation Failed',
        //         'errors' => $validator->errors()->all()
        //     ], 422);
        // }
        $list = Accounttype::find($id);
        $list->accounttype = $request->accounttype;
        $list->created_by  =  Auth::guard('superadmin')->user()->superadminname;
        $list->superadmin_id =  Auth::guard('superadmin')->user()->id;
        $list->update();
       
        if ($list->update()) {
            return response()->json([
                'success' => true,
                 'message'=>'Record Update Successfully',
                 'value'=>$list
            ],200);
          } else {
              return response()->json([
                  'success' => false,
                   'message'=>'Record Update Failed',
                   
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
        if (Accounttype::destroy($id)) {
           
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
