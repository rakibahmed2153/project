<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Login
Route::get('/login/index', 'LoginController@index')->name('login.index');
Route::post('/login/index', 'LoginController@valid');

//registraion
Route::get('/home/Registraion', 'LoginController@registration')->name('registration.index');
Route::post('/home/Registraion', 'LoginController@create');

//Logout
Route::get('/logout', 'LogoutController@index')->name('logout.index');


Route::group(['middleware'=>['sessionCheck']], function(){

Route::get('/admin/index', 'AdminController@index')->name('admin.index');

//Scout
Route::get('/admin/AddScout', 'AdminController@addscout')->name('admin.addscout');

Route::post('/admin/AddScout', 'AdminController@createscout');

Route::get('/admin/ScoutList', 'AdminController@scoutlist')->name('admin.scoutlist');

Route::get('/admin/EditScout/{sid}', 'AdminController@editscout')->name('admin.editscout');
Route::post('/admin/EditScout/{sid}', 'AdminController@editSco');

Route::get('/admin/ScoutDelete/{sid}', 'AdminController@deletescout')->name('admin.deletescout');
Route::post('/admin/ScoutDelete/{sid}', 'AdminController@destroyscout');

//User
Route::get('/admin/AddUser', 'AdminController@adduser')->name('admin.adduser');

Route::post('/admin/AddUser', 'AdminController@createuser');

Route::get('/admin/UserList', 'AdminController@userlist')->name('admin.userlist');

Route::get('/admin/EditUser/{sid}', 'AdminController@edituser')->name('admin.edituser');
Route::post('/admin/EditUser/{sid}', 'AdminController@editUse');

Route::get('/admin/UserDelete/{sid}', 'AdminController@deleteuser')->name('admin.deleteuser');
Route::post('/admin/UserDelete/{sid}', 'AdminController@destroyscout');

//Request
Route::get('/admin/RequestList', 'AdminController@requestlist')->name('admin.requestlist');
Route::get('/admin/ValidRequest/{sid}', 'AdminController@reqvalid')->name('admin.reqvalid');

Route::get('/admin/DeleteRequest/{sid}', 'AdminController@deletereq')->name('admin.deletereq');

//Place Request
Route::get('/admin/PlaceRequestList', 'AdminController@placereqlist')->name('admin.placereqlist');
Route::get('/admin/ValidPlaceRequest/{sid}', 'AdminController@placereqvalid')->name('admin.placereqvalid');

Route::get('/admin/DeletePlaceRequest/{sid}', 'AdminController@deleteplacereq')->name('admin.deleteplacereq');
Route::get('/admin/EditPlaceRequest/{sid}', 'AdminController@editreqplace')->name('admin.editreqplace');
Route::post('/admin/EditPlaceRequest/{sid}', 'AdminController@editreqPla');

//Show Place

Route::get('/admin/ShowPlaceList', 'AdminController@showplacelist')->name('admin.showplacelist');
Route::get('/admin/DeletePlace/{sid}', 'AdminController@admindeleteplace')->name('admin.admindeleteplace');
Route::get('/admin/EditPlace/{sid}', 'AdminController@admineditplace')->name('admin.admineditplace');
Route::post('/admin/EditPlace/{sid}', 'AdminController@admineditPla');

//Comment
Route::get('/admin/UserComment', 'AdminController@usercomment')->name('admin.usercomment');

Route::get('/admin/DeleteComment/{sid}', 'AdminController@deletecomment')->name('admin.deletecomment');

//Profile
Route::get('/admin/Profile', 'AdminController@profile')->name('admin.profile');
Route::post('/admin/Profile', 'AdminController@editProfile');


//Change Password
Route::get('/admin/ChangePassword', 'AdminController@cngpassword')->name('admin.cngpassword');
Route::post('/admin/ChangePassword', 'AdminController@Password');



//Scout Route Start
Route::get('/Scout/index', 'ScoutController@index')->name('scout.index');

//Profile
Route::get('/scout/Profile', 'ScoutController@profile')->name('scout.profile');
Route::post('/scout/Profile', 'ScoutController@editProfile');

//Change Password
Route::get('/scout/ChangePassword', 'ScoutController@cngpassword')->name('scout.cngpassword');
Route::post('/scout/ChangePassword', 'ScoutController@Password');

//Place
Route::get('/scout/AddPlace', 'ScoutController@addplace')->name('scout.addplace');

Route::post('/scout/AddPlace', 'ScoutController@createplace');

Route::get('/scout/PlaceList', 'ScoutController@placelist')->name('scout.placelist');

Route::get('/scout/EditPlace/{sid}', 'ScoutController@editplace')->name('scout.editplace');
Route::post('/scout/EditPlace/{sid}', 'ScoutController@editPla');


//User Part

Route::get('/user/index', 'UserController@index')->name('user.index');

//Profile
Route::get('/user/Profile', 'UserController@profile')->name('user.profile');
Route::post('/user/Profile', 'UserController@editProfile');


//Change Password
Route::get('/user/ChangePassword', 'UserController@cngpassword')->name('user.cngpassword');
Route::post('/user/ChangePassword', 'UserController@Password');

//Placelist
Route::get('/user/PlaceList', 'UserController@showpublishedplace')->name('user.showpublishedplace');

Route::get('/user/PlaceDetails/{sid}', 'UserController@placedetails')->name('user.placedetails');
Route::post('/user/PlaceDetails/{sid}', 'UserController@usercomment');

Route::get('/user/Wish/{sid}', 'UserController@wish')->name('user.wish');

Route::get('/user/WishList', 'UserController@wishlist')->name('user.wishlist');

Route::get('/user/PlaceList/search','UserController@search')->name('user.search');



});
