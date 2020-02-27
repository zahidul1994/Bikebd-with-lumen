<?php
namespace App\Helper;

use App\Viewcount;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Request; 
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CommonFx{
    public static function make_slug($string) {
    return preg_replace('/\s+/u', '-', trim($string));
}
public static function createViewLog($page) {
    $postViews= new Viewcount();
    $postViews->post_id = $page->id;
    // $postViews->url = \Request::url();
    // $postViews->session_id = \Request::getSession()->getId();
    // $postViews->user_id = (\Auth::check())?\Auth::id():null; //this check will either put the user id or null, no need to use \Auth()->user()->id as we have an inbuild function to get auth id
    // $postViews->ip = $page->window.location.host;
     //$ip=  \Request::ip();
    // $postViews->agent = \Request::header('User-Agent');
    $postViews->save();//please note to save it at lease, very important
}
}
