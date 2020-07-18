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

// Route::get('/{vue_capture?}', function () {
//     return view('welcome');
// })->where(
//     'vue_capture',
//     '[\/\w\.-]*'
// );

//Frontend Routes
Route::any('/features', function () {
    return view('welcome');
});
Route::any('/about-us', function () {
    return view('welcome');
});
Route::any('/contact-us', function () {
    return view('welcome');
});
Route::any('/our-gallery', function () {
    return view('welcome');
});
Route::any('/downloads', function () {
    return view('welcome');
});
Route::any('/our-team', function () {
    return view('welcome');
});
Route::any('/testimonials', function () {
    return view('welcome');
});
Route::any('/career', function () {
    return view('welcome');
});
Route::any('/our-contacts', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
})->name('landingPage');


//Auth Routes
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//Backend Controller
//Inbox Route
Route::get('/inbox', 'backendController@inboxMessages')->name('inbox');
Route::get('/inbox/{id}', 'backendController@deleteMessage')->name('delete.message');
Route::post('/sendMessage', 'backendController@sendMessage')->name('send.message');
Route::get('/mail/old/{id}', 'backendController@makeOld')->name('make.old');
Route::get('/new-mail-count', 'backendController@newMessageCounter');

//Users Routes
Route::get('/addUser', 'usersController@showRegisterForm')->name('show.registerForm')->middleware('auth');

Route::post('/addUser', 'usersController@addUser')->name('add.user')->middleware('auth');

Route::get('/listUser', 'usersController@listUser')->name('list.user')->middleware('auth');

Route::get('/userDelete/{id}', 'usersController@deleteUser')->name('delete.user')->middleware('auth');

Route::get('/updateUser/{id}', 'usersController@showUpdateForm')->name('show.updateForm')->middleware('auth');

Route::post('/updateUser/{id}', 'usersController@updateUser')->name('update.user')->middleware('auth');

Route::get('/resetPassword/{id}', 'usersController@showResetForm')->name('show.resetForm')->middleware('auth');

Route::post('/resetPassword/{id}', 'usersController@resetPassword')->name('reset.password')->middleware('auth');

Route::post('/changeAvatar/{id}', 'usersController@changeAvatar')->name('change.avatar')->middleware('auth');

//Gallery Routes
Route::get('/gallery', 'galleryController@showGallery')->name('show.gallery')->middleware('auth');

Route::post('/gallery', 'galleryController@upload')->name('image.upload')->middleware('auth');

Route::get('/gallery/{id}', 'galleryController@delete')->name('image.delete')->middleware('auth');

//Messages Routes
Route::get('/add_messages', 'messagesController@showMessageForm')->name('show.messageForm')->middleware('auth');

Route::post('/add_messages', 'messagesController@uploadMessage')->name('upload.message')->middleware('auth');

Route::get('/messages', 'frontendController@showMessage')->name('show.message')->middleware('auth');

//Downloads Routes
Route::get('/downloadables', 'downloadsController@showDownloadables')->name('show.downloadables')->middleware('auth');

Route::post('/downloadables', 'downloadsController@uploadDownloadables')->name('upload.downloadables')->middleware('auth');

Route::get('/delete_downloadables/{id}', 'downloadsController@deleteDownloadables')->name('delete.downloadables')->middleware('auth');

Route::get('/downloadables/{id}', 'downloadsController@makeDownload')->name('download.downloadables')->middleware('auth');

//Oppurtunities Routes
Route::get('/oppurtunities', 'opportunitiesController@showoppurtunitiesForm')->name('show.oppurtunitiesForm')->middleware('auth');

Route::get('/add_oppurtunities', 'opportunitiesController@addOppurtunities')->name('add.oppurtunities')->middleware('auth');

Route::get('/list_oppurtunities', 'opportunitiesController@listOppurtunities')->name('list.oppurtunities')->middleware('auth');

Route::get('/delete_oppurtunities/{id}', 'opportunitiesController@deleteOppurtunity')->name('delete.oppurtunity')->middleware('auth');

//Balance Routes
Route::get('/report', 'balanceController@showReportForm')->name('show.reportForm')->middleware('auth');

Route::post('/report', 'balanceController@addReport')->name('add.report')->middleware('auth');

Route::get('/retrieveBalance', 'balanceController@retrieveBalance')->name('retrieve.balance')->middleware('auth');

Route::get('/download', 'balanceController@downloadCollectorReport')->name('download.collector.report')->middleware('auth');

//Contacts Routes
Route::get('/addContacts', 'contactController@showContactForm')->name('show.contactForm')->middleware('auth');

Route::post('/addContacts', 'contactController@addContact')->name('add.contacts')->middleware('auth');

Route::get('/deleteContacts/{id}', 'contactController@deleteContact')->name('delete.contacts')->middleware('auth');

Route::get('/updateContacts/{id}', 'contactController@showUpdateContactForm')->name('show.updateContactsForm')->middleware('auth');

Route::post('/updateContacts/{id}', 'contactController@updateContact')->name('update.contacts')->middleware('auth');

//Committee Routes
Route::get('/team', 'committeeController@showTeamForm')->name('show.teamForm')->middleware('auth');

Route::post('/team', 'committeeController@addTeam')->name('add.team')->middleware('auth');

Route::get('/team/delete/{id}', 'committeeController@deleteTeam')->name('delete.team')->middleware('auth');

Route::post('/team/update/{id}', 'committeeController@updateTeam')->name('update.team')->middleware('auth');

Route::get('/team/update/{id}', 'committeeController@showUpdateForm')->name('show.updateForm')->middleware('auth');

//Vision and Objective Routes
Route::get('/vision', 'visionController@showVisionForm')->name('show.visionForm')->middleware('auth');

Route::post('/vision', 'visionController@addVision')->name('add.vision')->middleware('auth');


//Client's Comments Routes
Route::get('/client-comments', 'commentController@showCommentForm')->name('show.commentForm')->middleware('auth');
Route::post('/client-comments', 'commentController@addComment')->name('add.comment')->middleware('auth');
Route::get('/client-comments/{id}', 'commentController@deleteComment')->name('delete.comment')->middleware('auth');
