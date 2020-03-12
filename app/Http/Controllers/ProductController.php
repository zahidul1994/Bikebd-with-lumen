<?php

namespace App\Http\Controllers;

use App\Product;
use App\Helper\CommonFx;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $product = Product::where('status',1)->latest()->get();
        $recentproduct = Product::where('status',1)->orderByRaw('updated_at - created_at DESC')
        ->get(); 
        $oldbike = Product::where('status',1)->where('producttype','=','old')->limit(3)->get();
        $newbike = Product::where('status',1)->where('producttype','=','new')->limit(3)->get();
        $upcomingbike = Product::where('status',1)->where('producttype','=','upcoming')->limit(3)->get();
        $bestprice = Product::where('status',1)->where('regularprice','>',1000)->limit(5)->get();
        $upcommingproduct = Product::where('status',1)->where('producttype','=','upcoming')->get();
        $Compare = Product::whereRaw('regularprice > offerprice')
        ->latest()
        ->get();;
        $popular = Product::where('status',1)->where('producttype','=','upcoming')->get();
        $feature = Product::where('status',1)->where('producttype','=','upcoming')->get();
        $bestprice = Product::where('status',1)->where('producttype','=','upcoming')->get();
        return response()->json([
            'success'=>true,
            'oldbike'=>$oldbike,
            'newbike'=>$newbike,
            'upcomingbike'=>$upcomingbike,
            'recentproduct'=>$recentproduct,
            'upcommingproduct'=>$upcommingproduct,
            'comparebike'=>$Compare,
            'popular'=>$popular,
            'feature'=>$feature,
            'bestpricebike'=>$bestprice,
        ],200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if($request->ajax()){
            $product = Product::with('images')->whereSlug($id)->get()->first();
            $product->clickview +=1;
            $product->update();
            if($product){
            return response()->json([
                'success'=>true,
                'message'=>'Record Found',
                'productdetails'=>$product],200);
         }
         else{
             return response()->json([
                 'success'=>false,
                 'message'=>'Record Not  Found',
                ],404);
        }
    }
    return view('home');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
