<?php

use App\Http\Controllers\Etudiants\EtudiantsController;
use Illuminate\Support\Facades\Route;

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


Auth::routes(['register' => true]);

Route::group(['middleware'=>['guest']],function(){
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(['middleware' => ['auth']], function() {

    // Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('home',[App\Http\Controllers\AccueilController::class, 'index'])->name('home');
    // Route::get('home','EtudiantsController@index')->name('home');
    Route::get('/logoutUser', 'LogoutController@logoutUser')->name('logoutUser');

//------------------niveauxdetudes -----------------
Route::group(['namespace'=>'niveauxdetudes'],function(){
    Route::resource('niveauxdetudes', 'niveauxdetudesController');
 });

 //-----------------Classes-------------------------
 Route::group(['namespace'=>'Classes'],function(){

    Route::resource('classe','ClassesController');
    Route::post('deleteall','ClassesController@deleteall')->name("deleteall");


 });
 //-----------------Sections-------------------------
 Route::group(['namespace'=>'Sections'],function(){

    Route::resource('sections','SectionsController');
    Route::get('primaire','SectionsController@primaire_index')->name('primaire');
    Route::get('lycee','SectionsController@lycee_index')->name('lycee');
    Route::get('college','SectionsController@college_index')->name('college');
    Route::get('test_b','SectionsController@test_b')->name('test_b');
    // Route::get('/getclasses/{id}','SectionsController@getclasses');

 });


 //-----------------Parentes -------------------
 Route::group(['namespace'=>'Parentes'],function(){
     Route::resource('parentes','ParentesController');
     Route::get('/edit_parentes/{id}','ParentesController@edit')->name('edit_parentes');
 });


 //------------------ Enseignants ---------------
 Route::group(['namespace'=>'Enseignants'],function(){
     Route::resource('enseignants','EnseignantsController');
 });

  //------------------Etudiants---------------

  Route::group(['namespace'=>'Etudiants'],function(){
    Route::resource('etudiants', 'EtudiantsController');
    Route::get('/getclasses/{id}','EtudiantsController@getclasses');
    Route::get('/getsections/{id}','EtudiantsController@getsections');
    Route::post('upload_picesjoint','EtudiantsController@upload_picesjoint')->name('upload_picesjoint');
    Route::get('telecharge_picesjoint/{Nom_etudiant}/{Nom_pices}','EtudiantsController@telecharge_picesjoint')->name('telecharge_picesjoint');
    Route::post('delete_picesjoint','EtudiantsController@delete_picesjoint')->name('delete_picesjoint');
});


//---------------Comptes

Route::group(['namespace'=>'Frais'],function(){
    Route::resource('frais', 'FraisController');
});

//---------------Facture

Route::group(['namespace'=>'Facture'],function(){
    Route::resource('facture', 'FactureController');
    Route::get('craete_facture/{id}','FactureController@show')->name('craete_facture');
    // Route::get('edit/{id}','FactureController@edit')->name('edit');
    Route::get('/getmontante/{id}','FactureController@getmontante');

});



//----------------Recu_Etudaint

Route::group(['namespace'=>'RecuEtudaint'],function(){
    Route::resource('RecuEtudaint','RecuEtudiantController');
});





 });
