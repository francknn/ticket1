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



//////////User
Route::get('/user/{user}', 'UserController@show');

Route::get('/user', 'UserController@index');

Route::post('/user', 'UserController@store');




//////////'ChatterCategoriesController
Route::get('/chatterCategories/{Categorie}', 'ChatterCategoriesController@show');
Route::get('/chatterCategories', 'ChatterCategoriesController@index');
Route::post('/chatterCategories', 'ChatterCategoriesController@store');



Route::put('/chatterCategories', 'ChatterCategoriesController@update');



//////////Chatter_user_discussion
Route::get('/chatter_user_discussion/{Chatter_user_discussion}', 'ChatterUserDiscussionController@show');

Route::get('/chatter_user_discussion', 'ChatterUserDiscussionController@index');
Route::post('/chatter_user_discussion', 'ChatterUserDiscussionController@store');



Route::put('/chatter_user_discussion', 'ChatterUserDiscussionController@store');


Route::delete('/chatter_user_discussion/{id}', 'ChatterUserDiscussionController@destroy');


//////////Employe



Route::put('/employe', 'EmployeController@store');
//Route::delete('/employe/{id}'





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

Route::group([
    'middleware' => 'CORS',
], function () {
    Route::get('/employe/{Employe}', 'EmployeController@show');

    Route::get('/employe', 'EmployeController@index');
    Route::post('/employe', 'EmployeController@store');
    Route::put('/employe/{id}','EmployeController@update');
    Route::delete('/employe/{id}','EmployeController@destroy');

    
Route::put('/user/{id}', 'UserController@update');


Route::delete('/user/{id}', 'UserController@destroy');



//////////Client
Route::get('/client/{Client}', 'ClientController@show');

Route::get('/client', 'ClientController@index');
Route::post('/client', 'ClientController@store');



Route::put('/client/{Client}', 'ClientController@update');


Route::delete('/client/{id}', 'ClientController@destroy');


//////////Service
Route::get('/service/{Service}', 'ServiceController@show');

Route::get('/service', 'ServiceController@index');
Route::post('/service', 'ServiceController@store');



Route::put('/service/{service}', 'ServiceController@update');


Route::delete('/service/{id}', 'ServiceController@destroy');


//////////Requete
Route::get('/requete/{Requete}', 'RequeteController@show');

Route::get('/requete', 'RequeteController@index');
Route::put('/requete/{Requete}', 'RequeteController@update');



Route::post('/requete', 'RequeteController@store');


Route::delete('/requete/{id}', 'RequeteController@destroy');


//////////ChatterDiscussion
Route::get('/chatter_discussion/{Chatter_discussion}', 'ChatterDiscussionController@show');

Route::get('/chatter_discussion', 'ChatterDiscussionController@index');
Route::post('/chatter_discussion', 'ChatterDiscussionController@store');
Route::put('/chatter_discussion/{Chatter_discussion}', 'ChatterDiscussionController@update');
Route::delete('/Chatter_discussion/{id}', 'ChatterDiscussionController@destroy');

//////////Chatter_post
Route::get('/chatter_post/{Chatter_post}', 'ChatterDiscussionController@show');

Route::get('/chatter_post', 'ChatterPostController@index');
Route::post('/chatter_post', 'ChatterPostController@store');



Route::put('/chatter_post/{id}', 'ChatterPostController@update');


Route::delete('/chatter_post/{id}', 'ChatterPostController@destroy');



//////////role
Route::get('/role/{role}', 'RoleController@show');

Route::get('/role', 'RoleController@index');
Route::post('/role', 'RoleController@store');



Route::put('/role/{role}', 'RoleController@update');


Route::delete('/role/{id}', 'RoleController@destroy');

Route::get('/privilege/{role}', 'PermissionController@show');

Route::get('/privilege', 'PermissionController@index');
  



Route::get('/roleperm/{role}', 'RolepermissionController@show');

Route::get('/roleperm', 'RolepermissionController@index');



//////////Categorie
Route::get('/Categorie/{Categorie}', 'CategorieController@show');

Route::get('/Categorie', 'CategorieController@index');
Route::post('/Categorie', 'CategorieController@store');



Route::put('/Categorie/{Categorie}', 'CategorieController@update');


Route::delete('/Categorie/{id}', 'CategorieController@destroy');

//////////Entreprise
Route::get('/Entreprise/{Entreprise}', 'EntrepriseController@show');

Route::get('/Entreprise', 'EntrepriseController@index');
Route::post('/Entreprise', 'EntrepriseController@store');

Route::post('/image', 'ImageController@store');

Route::put('/Entreprise/{Entreprise}', 'EntrepriseController@update');


Route::delete('/Entreprise/{id}', 'EntrepriseController@destroy');
  
});