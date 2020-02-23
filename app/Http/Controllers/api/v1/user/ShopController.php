<?php

namespace App\Http\Controllers\api\v1\user;
use App\Bike;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
    
    if($request->ajax()){
        $shopinfo=User::where('_id', $id)->where('paidunpaid',1)->first();
        
        if($shopinfo->shoptype=="bike"){
            $bikepost=Bike::with('category','bikebrand','bikemodel','bikeimage')->where('user_id',$shopinfo->_id)->latest()->get();
            if($bikepost){
            return response()->json([
                'success'=>true,
                'shopinfo'=>$bikepost,
                
            ],200);
        }
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'User Not Found'],404);
        }
    }

return view('home');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request)
    {
       
        $this->validate($request,[
            
            'shoptype' => 'required',
           
        ]);
        
    $list = User::find(app('auth')->user()->id);
    $list->shoptype = $request->shoptype;
    $list->update();

    if ($list->save()) {
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            
            'payingby' => 'required',
            'transaction' => 'required|unique:shops|min:3|max:198',
            'paiddate' => 'required'

        ]);
        
    $list = new Shop();
    $list->payingby = $request->payingby;
    $list->transaction = $request->transaction;
    $list->admin_id =null;
    $list->paiddate = $request->paiddate;
    $list->user_id =  app('auth')->user()->id;
    $list->status =2;
    $list->save();

    if ($list->save()) {
      return response()->json([
          'success' => true,
           'message'=>'Sope  Create Successfully',
           'value'=>$list
      ],201);
    } else {
        return response()->json([
            'success' => false,
             'message'=>'Record Not Found',
             
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
        $userpaid=Shop::where('user_id', app('auth')->user()->id)->where('_id',$id)->first();
      return response()->json([
        'success'=> true,
        'message'=>'Record Found',
        'shoppayment'=>$userpaid
    ],200);
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
        $list =  Shop::find($id);
        if( $request->transaction==$list->transaction){
        $this->validate($request,[
            
             'payingby' => 'required',
            'paiddate' => 'required'

        ]);
    }
    
    else{
        $this->validate($request,[
            'payingby' => 'required',
            'transaction' => 'required|min:3|max:198|unique:shops,transaction,'.$id,
            'paiddate' => 'required'

        ]);

    }
        
    
   $list->payingby = $request->payingby;
    $list->transaction = $request->transaction;
    $list->paiddate = $request->paiddate;
    //$list->user_id =  app('auth')->user()->id;
    $list->status =2;
    $list->update();

    if ($list->update()) {
      return response()->json([
          'success' => true,
           'message'=>'Sope  Update  Successfully tipu',
           'value'=>$list
      ],201);
    } else {
        return response()->json([
            'success' => false,
             'message'=>'Record Not Found Tipu Sultan',
             
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
        
    $user = Shop::find($id);
    if(is_null($user)){
     return response()->json(["message"=>"Record not found"],404); 
    }

 $user = Shop::findOrFail($id);
 $user->delete();
 return response()->json([
     'success'=> true,
     'message'=>'Record Delete Successfully',
     'value'=>$user
 ],200);
    }
}
