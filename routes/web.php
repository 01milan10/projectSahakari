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
})->name('landingPage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Backend Controller
//Users Controller
Route::get('/addUser','usersController@showRegisterForm')->name('show.registerForm');

Route::post('/addUser','usersController@addUser')->name('add.user');

Route::get('/listUser','usersController@listUser')->name('list.user');

Route::get('/userDelete/{id}','usersController@deleteUser')->name('delete.user');

Route::get('/updateUser/{id}','usersController@showUpdateForm')->name('show.updateForm');

Route::post('/updateUser/{id}','usersController@updateUser')->name('update.user');

Route::get('/resetPassword/{id}','usersController@showResetForm')->name('show.resetForm');

Route::post('/resetPassword/{id}','usersController@resetPassword')->name('reset.password');

//Gallery Controller
Route::get('/gallery','galleryController@showGallery')->name('show.gallery');

Route::post('/gallery', 'galleryController@upload')->name('image.upload');

Route::get('/gallery/{id}', 'galleryController@delete')->name('image.delete');

//Messages Controller
Route::get('/add_messages','messagesController@showMessageForm')->name('show.messageForm');

Route::post('/add_messages','messagesController@uploadMessage')->name('upload.message');

Route::get('/messages','frontendController@showMessage')->name('show.message');

//Downloads Controller
Route::get('/downloadables','downloadsController@showDownloadables')->name('show.downloadables');

Route::post('/downloadables','downloadsController@uploadDownloadables')->name('upload.downloadables');

Route::get('/delete_downloadables/{id}','downloadsController@deleteDownloadables')->name('delete.downloadables');

Route::get('/downloadables/{id}','downloadsController@makeDownload')->name('download.downloadables');

//Oppurtunities Controller
Route::get('/oppurtunities','backendController@showoppurtunitiesForm')->name('show.oppurtunitiesForm');

Route::get('/add_oppurtunities','backendController@addOppurtunities')->name('add.oppurtunities');

Route::get('/list_oppurtunities','backendController@listOppurtunities')->name('list.oppurtunities');

Route::get('/delete_oppurtunities/{id}','backendController@deleteOppurtunity')->name('delete.oppurtunity');

//Balance Controller
Route::get('/report','balanceController@showReportForm')->name('show.reportForm');

Route::post('/report','balanceController@addReport')->name('add.report');

Route::get('/retrieveBalance','balanceController@retrieveBalance')->name('retrieve.balance');

//Contacts Controller
Route::get('/addContacts','backendController@showContactForm')->name('show.contactForm');

Route::post('/addContacts','backendController@addContact')->name('add.contacts');

Route::get('/deleteContacts/{id}','backendController@deleteContact')->name('delete.contacts');

Route::get('/updateContacts/{id}','backendController@showUpdateContactForm')->name('show.updateContactsForm');

Route::post('/updateContacts/{id}','backendController@updateContact')->name('update.contacts');
