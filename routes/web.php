<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
//superadmin area start
$router->get('superadmin/login', function () use ($router) {
    return view('superadmin');
});
$router->get('/superadmin', function () use ($router) {
    return view('superadmin');
});
//superadmin area end

//admin area start
$router->get('admin/login', function () use ($router) {
    return view('admin');
});
$router->get('/admin', function () use ($router) {
    return view('admin');
});
//admin area end

$router->get('/', function () use ($router) {
    return view('home');
});

//user login and dashboard
$router->get('register', function () use ($router) {
    return view('home');
});
$router->get('/login', function () use ($router) {
    return view('home');
});

$router->get('/bn', function () use ($router) {
    return view('bnhome');
});
$router->get('/user', function () use ($router) {
    return view('user');
});
//user login and dashboard
$router->get('category','CategoryController@index');
$router->get('latestblog','BlogpostController@index');
 $router->get('llatestblog','BlogpostController@lindex');
$router->get('blogpostdetails/{id}','BlogpostController@show');
$router->get('lblogpostdetails/{id}','BlogpostController@lshow');
$router->post('blogpagelist', 'PageController@index');
$router->group([
    'prefix'=>'/',
    ],

function()use($router){
    $router->get('blog/{id}','BlogpostController@show');
    $router->post('createcomment','BlogpostController@comment');
    $router->post('relatedblog/{id}','BlogpostController@relatedblog');
    //page area start
    $router->get('page/{id}','PageController@show'); 
    $router->post('pagelist','PageController@pagelist'); //page link in dropdown
    $router->post('relatedpage/{id}','PageController@relatedpage');


    $router->post('login','UserController@login'); //for user login
});

$router->group([
    'prefix'=>'bn',
    ],

function()use($router){
    $router->get('latestblog','BlogpostController@bnindex');
    $router->get('blog/{id}','BlogpostController@bnshow');
    $router->post('relatedblog/{id}','BlogpostController@relatedblog');
    $router->post('createcomment','BlogpostController@comment');
//bn page area start
    $router->get('page/{id}','PageController@bnshow');
    $router->post('pagelist','PageController@bnpagelist');//page link in dropdown
     $router->post('relatedpage/{id}','PageController@bnrelatedpage');
});


$router->group([
    'prefix'=>'superadmin',
    'namespace' => 'api\v1\superadmin',
       
   
    ],

function()use($router){
$router->post('login','SuperadminController@login');

$router->group(['middleware'=>'superadmin'],function() use($router){
    $router->post('profile','SuperadminController@profile');
    $router->get('dashboard','SuperadminController@dashboard');
    //Status area start 
    $router->get('statuslist','StatusController@index');
    $router->post('createstatus','StatusController@store');
    $router->get('editstatus/{id}','StatusController@edit');
    $router->patch('updatestatus/{id}','StatusController@update');
    $router->delete('deletestatus/{id}','StatusController@destroy');
    //Status Area end
    //Genderarea start
    $router->get('genderlist','GenderController@index');
    $router->post('creategender','GenderController@store');
    $router->get('editgender/{id}','GenderController@edit');
    $router->patch('updategender/{id}','GenderController@update');
    $router->delete('deletegender/{id}','GenderController@destroy');
   //Genderarea End
     //Accounttype Start
     $router->get('accounttypelist','AccountypeController@index');
     $router->post('createaccounttype','AccountypeController@store');
     $router->get('editaccountype/{id}','AccountypeController@edit');
     $router->patch('updateaccountype/{id}','AccountypeController@update');
     $router->delete('deleteaccounttype/{id}','AccountypeController@destroy');
     //Accounttype End 
  //AccountPermission Start
  $router->get('permissionlist','PermissionController@index');
  $router->get('createpermission','PermissionController@store');
  $router->post('createpermission','PermissionController@store');
  $router->get('editpermission/{id}','PermissionController@edit');
  $router->patch('updatepermission/{id}','PermissionController@update');
  $router->delete('deletepermission/{id}','PermissionController@destroy');
  //AccountPermission End

     //AccountRole Start
     $router->get('accountrolelist','RoleController@index');
     $router->get('createaccountrole','RoleController@store');
     $router->post('createaccountrole','RoleController@store');
     $router->post('allpermissionlist','RoleController@allpermissionlist');
     $router->get('editaccountrole/{id}','RoleController@edit');
     $router->get('showrolepermission/{id}','RoleController@show');
     $router->put('updateaccountrole/{id}','RoleController@update');
     $router->delete('deleteaccountrole/{id}','RoleController@destroy');
     //AccountRole End

     $router->post('adminsetstatus/{id}', 'AdminController@setapproval'); //for inactive account status
     $router->post('adminsetstatusactive/{id}', 'AdminController@adminsetstatusactive');//for active account status




     //Accountcreate Start
     $router->get('teammemberlist','AdminController@index');
     $router->post('allrolename','AdminController@allrolename');
     $router->get('createteammember','AdminController@store');
     $router->post('createteammember','AdminController@store');
     $router->get('editteammember/{id}','AdminController@edit');
     $router->put('updateteammember/{id}','AdminController@update');
     $router->delete('deleteteammember/{id}','AdminController@destroy');
     //Accountcreate  End
});


});

//Admin area start

$router->group([
    'prefix'=>'admin',
    'namespace' => 'api\v1\admin',
       
   
    ],

function()use($router){
$router->post('login','AdminController@login');

$router->group(['middleware'=>'admin'],function() use($router){
    //Admin profile area start
    $router->get('adminprofile','AdminController@index');
    $router->get('editadminprofile/{id}','AdminController@edit');
    $router->put('updateadminprofile/{id}','AdminController@update');
    $router->get('shoppaymentcheck','AdminController@shoppaymentcheck');
    $router->post('shoppaymentactive/{id}', 'AdminController@shoppaymentactive'); //for inactive account status
    $router->post('shoppaymentinactive/{id}', 'AdminController@shoppaymentinactive');//for active account status
     //Admin profile area end
    $router->get('dashboard','SuperadminController@dashboard');
    //Location area start 
    $router->get('divisionlist','LocationController@index');
    $router->post('createdivision','LocationController@store');
    $router->get('editdivision/{id}','LocationController@edit');
    $router->patch('updatedivision/{id}','LocationController@update');
    $router->delete('deletedivision/{id}','LocationController@destroy');
    //Location Area end 
    
    //Category area start 
    $router->get('categorylist','CategoryController@index');
    $router->post('createcategory','CategoryController@store');
    $router->get('editcategory/{id}','CategoryController@edit');
    $router->patch('updatecategory/{id}','CategoryController@update');
    $router->delete('deletecategory/{id}','CategoryController@destroy');
    //Category Area end 
    
  
    //bikemodel area start 
    $router->get('bikemodellist','BikemodelController@index');
    $router->post('createbikemodel','BikemodelController@store');
    $router->get('editbikemodel/{id}','BikemodelController@edit');    
    $router->patch('updatebikemodel/{id}','BikemodelController@update');
    $router->delete('deletebikemodel/{id}','BikemodelController@destroy');
    //Bikemodel Area end 


     //Subdivision area start 
    $router->get('subdivisionlist','SublocationController@index');
    $router->post('createsubdivision','SublocationController@store');
    $router->get('editsubdivision/{id}','SublocationController@edit');
    $router->patch('updatesubdivision/{id}','SublocationController@update');
    $router->delete('deletesubdivision/{id}','SublocationController@destroy');
    //Subdivision Area end

    //version controler
    $router->get('bikeversionlist','BikeversionController@index');
    $router->post('createbikeversion','BikeversionController@store');
    $router->get('editbikeversion/{id}','BikeversionController@edit');
    $router->patch('updatebikeversion/{id}','BikeversionController@update');
    $router->delete('deletebikeversion/{id}','BikeversionController@destroy');
    //version controller end

        //bikeBrand controler start
        $router->get('bikebrandlist','BikebrandController@index');
        $router->post('createbikebrand','BikebrandController@store');
        $router->get('editbikebrand/{id}','BikebrandController@edit');
        $router->patch('updatebikebrand/{id}','BikebrandController@update');
        $router->delete('deletebikebrand/{id}','BikebrandController@destroy');
        //Bikebrand controller end

    
     $router->post('adminsetstatus/{id}', 'AdminController@setapproval'); //for inactive account status
     $router->post('adminsetstatusactive/{id}', 'AdminController@adminsetstatusactive');//for active account status




     //Accountcreate Start
     $router->get('teammemberlist','AdminController@index');
     $router->post('createteammember','AdminController@store');
     $router->get('editteammember/{id}','AdminController@edit');
     $router->put('updateteammember/{id}','AdminController@update');
     $router->delete('deleteteammember/{id}','AdminController@destroy');
     //Accountcreate  End


     //active inactive useraccountlist
     $router->get('alluseraccountlist','UserController@index');
     $router->post('usersetstatus/{id}', 'UserController@setapproval'); //for inactive account status
     $router->post('usersetstatusactive/{id}', 'UserController@adminsetstatusactive');//for active account status
     $router->delete('deleteuser/{id}','UserController@destroy');
    
     //active inactive useraccountlist
     //Admin user manager
     $router->get('adminmanager','UserController@manager');
     //Admin user manager
    //user bike post
    $router->get('userbikepostlist', 'BikeController@index');
    $router->post('userbikeactive/{id}', 'BikeController@setapproval'); //for bike post  active
    $router->post('userbikeinactive/{id}', 'BikeController@setinactive');//for bike post  inactive
    $router->get('bikepostdetails/{id}', 'BikeController@show');//for bike post  details
    $router->delete('deleteuserbikepostlist/{id}', 'BikeController@destroy');//for bike post  delete
    //user bike post
 

  //blog area start 
  $router->get('blogpost','BlogpostController@index');
  $router->get('bloginsearch','BlogpostController@bloginsearch');   //for search
  $router->post('createblogpost','BlogpostController@store');
  $router->get('createblogpost','BlogpostController@store');
  $router->get('blogpostdetails/{id}','BlogpostController@show');
  $router->get('editblogpost/{id}','BlogpostController@edit');
 $router->put('updateblogpost/{id}','BlogpostController@update');
 $router->post('deletecategorylist/{id}','BlogpostController@deletecategorylist');
 $router->post('blogpostactive/{id}','BlogpostController@blogpostactive');
 $router->post('blogpostinactive/{id}','BlogpostController@blogpostinactive');
  $router->delete('deleteblogpost/{id}','BlogpostController@destroy');
  //blog Area end 


  //blog page start 
  $router->get('blogpage','PageController@index');
$router->post('createblogpage','PageController@store');
  $router->get('createblogpage','PageController@store');
  $router->get('editblogpage/{id}','PageController@edit');
  $router->put('updateblogpage/{id}','PageController@update');
 $router->post('deletecategorylist/{id}','PageController@deletecategorylist');
 $router->post('pageactive/{id}','PageController@pageactive');
 $router->post('pageinactive/{id}','PageController@pageinactive');
  $router->delete('deleteblogpage/{id}','PageController@destroy');
  $router->get('parentpage','PageController@parentpage');
  //blog page end 
  
  
  // User Account create Start
      $router->get('userlist','CreateuserController@index');
      $router->get('adminlist','CreateuserController@adminview');
      $router->post('createuseraccount','CreateuserController@store');
      $router->get('createuseraccount','CreateuserController@store');
      $router->get('editcreateadmin/{id}','CreateuserController@editadmin');
      $router->get('editcreateuser/{id}','CreateuserController@edit');
      $router->put('updatecreateadmin/{id}','CreateuserController@updateadmin');
      $router->put('updatecreateuser/{id}','CreateuserController@update');
      $router->delete('deleteteuser/{id}','CreateuserController@destroy');
      $router->delete('deleteteadmin/{id}','CreateuserController@admindestroy');
      $router->get('accounttypelist','CreateuserController@accounttype');
      $router->get('genderlist','CreateuserController@gender');
      $router->get('statuslist','CreateuserController@status');
      $router->post('adminusrcreate/{id}', 'CreateuserController@setapproval'); //for inactive user create account status
      $router->post('adminusercreateactive/{id}', 'CreateuserController@adminusercreateactive');//for user create active account status
      $router->post('admincreate/{id}', 'CreateuserController@setapprovaladmin'); //for inactive user create account status
      $router->post('admincreateactive/{id}', 'CreateuserController@adminusercreateactiveadmin');//for user create active account status
      //User Account create  End


 //Parent Page area start 
 $router->get('parentpagelist','ParentpageController@index');
 $router->post('createparentpage','ParentpageController@store');
 $router->get('editparentpage/{id}','ParentpageController@edit');    
 $router->patch('updateparentpage/{id}','ParentpageController@update');
 $router->delete('deleteparentpage/{id}','ParentpageController@destroy');
 //Parent Page  Area end 
 
 //Company area start 
 $router->get('companylist','CompanyController@index');
 $router->get('companybrandname','CompanyController@companybrandname'); //for get all brand name only
 $router->get('createcompany','CompanyController@store');
 $router->post('createcompany','CompanyController@store');
 $router->get('editcompany/{id}','CompanyController@edit');    
 $router->patch('updatecompany/{id}','CompanyController@update');
 $router->delete('deletecompany/{id}','CompanyController@destroy');
 $router->post('companydactive/{id}', 'CompanyController@companydactive'); //for inactive company
 $router->post('companyactive/{id}', 'CompanyController@companyactive');//for user create active account status
 //Company  Area end 

 //Brand area start 
 $router->get('brandcategorylist','BrandcategoryController@index');
$router->get('createbrandcategory','BrandcategoryController@store');
 $router->post('createbrandcategory','BrandcategoryController@store');
 $router->post('brandcategory/{id}','BrandcategoryController@getbrandcategory');
 $router->get('editbrandcategory/{id}','BrandcategoryController@edit');    
 $router->patch('updatebrandcategory/{id}','BrandcategoryController@update');
 $router->delete('deletebrandcategory/{id}','BrandcategoryController@destroy');
 $router->post('brandcategorydactive/{id}', 'BrandcategoryController@companydactive'); //for inactive company
 $router->post('brandcategoryactive/{id}', 'BrandcategoryController@companyactive');//for user create active account status
 //Brand  Area end 
 
 
 
 // product all start
 
 
    //Engine area start 
    $router->get('enginelist','EngineController@index');
    $router->post('createengine','EngineController@store');
    $router->get('editeengine/{id}','EngineController@edit');
    $router->patch('updateengine/{id}','EngineController@update');
    $router->delete('deleteengine/{id}','EngineController@destroy');
    //Engine Area end  
 
     //bore area start 
    $router->get('borelist','BoreController@index');
    $router->post('createbore','BoreController@store');
    $router->get('editbore/{id}','BoreController@edit');
    $router->patch('updatebore/{id}','BoreController@update');
    $router->delete('deletebore/{id}','BoreController@destroy');
    //bore  Area end 
    
    //stroke area start 
    $router->get('strokelist','StrokeController@index');
    $router->post('createstroke','StrokeController@store');
    $router->get('editstroke/{id}','StrokeController@edit');
    $router->patch('updatestroke/{id}','StrokeController@update');
    $router->delete('deletestroke/{id}','StrokeController@destroy');
    //stroke  Area end 
    
    //cylinder area start 
    $router->get('cylinderelist','CylindersController@index');
    $router->post('createcylinder','CylindersController@store');
    $router->get('editcylinder/{id}','CylindersController@edit');
    $router->patch('updatecylinder/{id}','CylindersController@update');
    $router->delete('deletecylinder/{id}','CylindersController@destroy');
    //cylinder  Area end 
    
    //gear area start 
    $router->get('gearlist','GearsController@index');
    $router->post('creategear','GearsController@store');
    $router->get('editgear/{id}','GearsController@edit');
    $router->patch('updategear/{id}','GearsController@update');
    $router->delete('deletegear/{id}','GearsController@destroy');
    //gear  Area end
    
    //clutch area start 
    $router->get('clutchlist','ClutchController@index');
    $router->post('createclutch','ClutchController@store');
    $router->get('editclutch/{id}','ClutchController@edit');
    $router->patch('updateclutch/{id}','ClutchController@update');
    $router->delete('deleteclutch/{id}','ClutchController@destroy');
    //clutch  Area end  
    
    //chassis area start 
    $router->get('chassislist','ChassisController@index');
    $router->post('createchassis','ChassisController@store');
    $router->get('editchassis/{id}','ChassisController@edit');
    $router->patch('updatechassis/{id}','ChassisController@update');
    $router->delete('deletechassis/{id}','ChassisController@destroy');
    //chassis  Area end 
 
 
  //CC area start 
  $router->get('cclist','CcController@index');
  $router->post('createcclist','CcController@store');
  $router->get('editcclist/{id}','CcController@edit');
  $router->patch('updatecclist/{id}','CcController@update');
  $router->delete('deletecclist/{id}','CcController@destroy');
  //CC Area end 
  
   //ftyre area start 
    $router->get('ftyrelist','FtyreController@index');
    $router->post('createftyre','FtyreController@store');
    $router->get('editftyre/{id}','FtyreController@edit');
    $router->patch('updateftyre/{id}','FtyreController@update');
    $router->delete('deleteftyre/{id}','FtyreController@destroy');
    //ftyre  Area end
    
    //ftyre area start 
    $router->get('rtyrelist','RtyreController@index');
    $router->post('creatertyre','RtyreController@store');
    $router->get('editrtyre/{id}','RtyreController@edit');
    $router->patch('updatertyre/{id}','RtyreController@update');
    $router->delete('deletertyre/{id}','RtyreController@destroy');
    //ftyre  Area end 
    
    //Weight area start 
    $router->get('weightlist','WeightController@index');
    $router->post('createweight','WeightController@store');
    $router->get('editweight/{id}','WeightController@edit');
    $router->patch('updateweight/{id}','WeightController@update');
    $router->delete('deleteweight/{id}','WeightController@destroy');
    //Weight  Area end 
    
    //Ftcapacity area start 
    $router->get('ftcapacitylist','FtcapacityController@index');
    $router->post('createftcapacity','FtcapacityController@store');
    $router->get('editftcapacity/{id}','FtcapacityController@edit');
    $router->patch('updateftcapacity/{id}','FtcapacityController@update');
    $router->delete('deleteftcapacity/{id}','FtcapacityController@destroy');
    //Ftcapacity  Area end 
    
    //Bvoltage area start 
    $router->get('bvoltagelist','BetteryvoltageController@index');
    $router->post('createbvoltage','BetteryvoltageController@store');
    $router->get('editbvoltage/{id}','BetteryvoltageController@edit');
    $router->patch('updatebvoltage/{id}','BetteryvoltageController@update');
    $router->delete('deletebvoltage/{id}','BetteryvoltageController@destroy');
    //Bvoltage  Area end 
 
 
 
 //Product area start 
 $router->get('productlist','ProductController@index');
 $router->get('createproduct','ProductController@store');
 $router->post('createproduct','ProductController@store');
 $router->post('alldropdown','ProductController@alldropwown'); //for select option all info get
 $router->get('editcompany/{id}','ProductController@edit');    
 $router->patch('updatecompany/{id}','ProductController@update');
 $router->delete('deletecompany/{id}','ProductController@destroy');
 $router->post('companydactive/{id}', 'ProductController@companydactive'); //for inactive company
 $router->post('companyactive/{id}', 'ProductController@companyactive');//for user create active account status
 //Product  Area end 
 
 // product all end

});


});
//admin area end
//user area start



//user area end