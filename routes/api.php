<?php
use Illuminate\Http\Request;
use App\Http\Resources\Chatter_categoriesResource;
use App\Chatter_categories;
use App\Http\Resources\UserResource;
use App\User;
use App\Http\Resources\CategorieResource;
use App\Categorie;
use App\Http\Resources\Chatter_discussionResource;
use App\Chatter_discussion;
use App\Http\Resources\Chatter_postResource;
use App\Chatter_post;
use App\Http\Resources\Chatter_user_discussionResource;
use App\Chatter_user_discussion;
use App\Http\Resources\ClientResource;
use App\Client;
use App\Http\Resources\EmployeResource;
use App\Employe;
use App\Http\Resources\RequeteResource;
use App\Requete;
use App\Http\Resources\ServiceResource;
use App\Service;


/*
|--------------------------------------------------------------------------
|  Routes
|--------------------------------------------------------------------------
|
| Here is where you can register  routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "" middleware group. Enjoy building your !
|
*/


Route::get('/chatter_categories/{chatter_categories}', function(Chatter_categories $chatter_categories) {
    return new Chatter_categoriesResource($chatter_categories);
});

Route::get('/chatter_categories', function() {
    return new Chatter_categoriesResource(Chatter_categories::all());
});



//////////User
Route::get('/user/{user}', 'UserController@show');

Route::get('/user', 'UserController@index');

Route::post('/user', 'UserController@store');



Route::put('/user/{id}', 'UserController@update');


Route::delete('/user/{id}', 'UserController@destroy');

//////////'ChatterCategoriesController
Route::get('/categorie/{Categorie}', 'ChatterCategoriesController@show');
Route::get('/categorie', 'ChatterCategoriesController@index');
Route::post('/categorie', 'ChatterCategoriesController@store');



Route::put('/categorie', 'ChatterCategoriesController@update');


//////////ChatterDiscussion
Route::get('/chatter_discussion/{Chatter_discussion}', 'ChatterDiscussionController@show');

Route::get('/chatter_discussion', 'ChatterDiscussionController@index');
Route::post('/chatter_discussion', 'ChatterDiscussionController@store');
Route::put('/chatter_discussion', 'ChatterDiscussionController@store');
Route::delete('/Chatter_discussion/{id}', 'ChatterDiscussionController@destroy');


//////////Chatter_post
Route::get('/chatter_post/{Chatter_post}', function(Chatter_post $Chatter_post) {
    return new Chatter_categoriesResource($Chatter_post);
});

Route::get('/chatter_post', function() {
    return new Chatter_postResource(Chatter_post::all());
});
Route::post('/chatter_post', 'Chatter_postController@store');



Route::put('/chatter_post', 'Chatter_postController@store');


Route::delete('/chatter_post/{id}', 'Chatter_postController@destroy');

//////////Chatter_user_discussion
Route::get('/chatter_user_discussion/{Chatter_user_discussion}', function(Chatter_user_discussion $Chatter_user_discussion) {
    return new Chatter_categoriesResource($Chatter_user_discussion);
});

Route::get('/chatter_user_discussion', function() {
    return new Chatter_user_discussionResource(Chatter_user_discussion::all());
});
Route::post('/chatter_user_discussion', 'Chatter_user_discussionController@store');



Route::put('/chatter_user_discussion', 'Chatter_user_discussionController@store');


Route::delete('/chatter_user_discussion/{id}', 'Chatter_user_discussionController@destroy');

//////////Client
Route::get('/client/{Client}', function(Client $Client) {
    return new Chatter_categoriesResource($Client);
});

Route::get('/client', function() {
    return new ClientResource(Client::all());
});
Route::post('/client', 'ClientController@store');



Route::put('/client', 'ClientController@store');


Route::delete('/client/{id}', 'ClientController@destroy');

//////////Employe
Route::get('/employe/{Employe}', function(Employe $Employe) {
    return new Chatter_categoriesResource($Employe);
});

Route::get('/employe', function() {
    return new EmployeResource(Employe::all());
});
Route::post('/employe', 'EmployeController@store');



Route::put('/employe', 'EmployeController@store');

Route::delete('/employe/{id}', ['middleware' => 'cors' , '/employe/{id}'=> 'EmployeController@destroy']);

//////////Requete
Route::get('/requete/{Requete}', function(Requete $Requete) {
    return new Chatter_categoriesResource($Requete);
});

Route::get('/requete', function() {
    return new RequeteResource(Requete::all());
});
Route::post('/requete', 'RequeteController@store');



Route::put('/requete', 'RequeteController@store');


Route::delete('/requete/{id}', 'RequeteController@destroy');

//////////Service
Route::get('/service/{Service}', function(Service $Service) {
    return new Chatter_categoriesResource($Service);
});

Route::get('/service', function() {
    return new ServiceResource(Service::all());
});
Route::post('/service', 'ServiceController@store');



Route::put('/service', 'ServiceController@store');


Route::delete('/service/{id}', 'ServiceController@destroy');

//Route::post('login', 'UserController@login');
//Route::post('register', 'UserController@register');
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
});

