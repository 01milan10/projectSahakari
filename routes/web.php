<?php


Route::any('/our-features', function () {
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
Route::group(['middleware' => 'auth'], function () {
    //Inbox Route
    Route::get('/inbox', 'backendController@inboxMessages')->name('inbox');

    Route::get('/inbox/{id}/delete', 'backendController@deleteMessage')->name('delete.message');

    Route::post('/sendMessage', 'backendController@sendMessage')->name('send.message');

    Route::get('/mail/old/{id}', 'backendController@makeOld')->name('make.old');

    Route::get('/new-mail-count', 'backendController@newMessageCounter');

    //Users Routes
    Route::get('/addUser', 'usersController@create')->name('create.user');

    Route::post('/addUser', 'usersController@store')->name('store.user');

    Route::get('/listUser', 'usersController@index')->name('list.user');

    Route::get('/userDelete/{user}', 'usersController@destroy')->name('delete.user');

    Route::get('/updateUser/{id}', 'usersController@showUpdateForm')->name('show.userUpdateForm');

    Route::post('/updateUser/{user}', 'usersController@update')->name('update.user');

    Route::get('/resetPassword/{user}', 'usersController@showResetForm')->name('show.resetForm');

    Route::post('/resetPassword/{user}', 'usersController@resetPassword')->name('reset.password');

    Route::post('/changeAvatar/{id}', 'usersController@changeAvatar')->name('change.avatar');

    //Gallery Routes
    Route::get('/gallery', 'galleryController@showGallery')->name('show.gallery');

    Route::post('/gallery', 'galleryController@upload')->name('image.upload');

    Route::get('/gallery/{id}', 'galleryController@delete')->name('image.delete');

    //Messages Routes
    Route::get('/add_messages', 'messagesController@showMessageForm')->name('show.messageForm');

    Route::post('/add_messages', 'messagesController@uploadMessage')->name('upload.message');

    Route::get('/messages', 'frontendController@showMessage')->name('show.message');

    //Downloads Routes
    Route::get('/downloadables', 'downloadsController@showDownloadables')->name('show.downloadables');

    Route::post('/downloadables', 'downloadsController@uploadDownloadables')->name('upload.downloadables');

    Route::get('/delete_downloadables/{id}', 'downloadsController@deleteDownloadables')->name('delete.downloadables');

    Route::get('/downloadables/{id}', 'downloadsController@makeDownload')->name('download.downloadables');

    //Oppurtunities Routes
    Route::get('/oppurtunities', 'opportunitiesController@showoppurtunitiesForm')->name('show.oppurtunitiesForm');

    Route::get('/add_oppurtunities', 'opportunitiesController@addOppurtunities')->name('add.oppurtunities');

    Route::get('/list_oppurtunities', 'opportunitiesController@listOppurtunities')->name('list.oppurtunities');

    Route::get('/delete_oppurtunities/{id}', 'opportunitiesController@deleteOppurtunity')->name('delete.oppurtunity');

    //Balance Routes
    Route::get('/report', 'balanceController@showReportForm')->name('show.reportForm');

    Route::post('/report', 'balanceController@addReport')->name('add.report');

    Route::get('/retrieveBalance', 'balanceController@retrieveBalance')->name('retrieve.balance');

    Route::get('/download', 'balanceController@downloadCollectorReport')->name('download.collector.report');

    //Contacts Routes
    Route::get('/addContacts', 'contactController@showContactForm')->name('show.contactForm');

    Route::post('/addContacts', 'contactController@addContact')->name('add.contacts');

    Route::get('/deleteContacts/{id}', 'contactController@deleteContact')->name('delete.contacts');

    Route::get('/updateContacts/{id}', 'contactController@showUpdateContactForm')->name('show.updateContactsForm');

    Route::post('/updateContacts/{id}', 'contactController@updateContact')->name('update.contacts');

    //Committee Routes
    Route::get('/team', 'committeeController@showTeamForm')->name('show.teamForm');

    Route::post('/team', 'committeeController@addTeam')->name('add.team');

    Route::get('/team/delete/{id}', 'committeeController@deleteTeam')->name('delete.team');

    Route::post('/team/update/{id}', 'committeeController@updateTeam')->name('update.team');

    Route::get('/team/update/{id}', 'committeeController@showUpdateForm')->name('show.updateForm');

    //Vision and Objective Routes
    Route::get('/vision', 'visionController@showVisionForm')->name('show.visionForm');

    Route::post('/vision', 'visionController@addVision')->name('add.vision');


    //Client's Comments Routes
    Route::get('/client-comments', 'commentController@showCommentForm')->name('show.commentForm');

    Route::post('/client-comments', 'commentController@addComment')->name('add.comment');

    Route::get('/client-comments/{id}', 'commentController@deleteComment')->name('delete.comment');

    //Features Routes
    Route::get('features/create', 'FeatureController@create')->name('create.feature');

    Route::post('features', 'FeatureController@store')->name('store.feature');

    Route::get('features/{feature}/edit', 'FeatureController@edit')->name('edit.feature');

    Route::get('features/{feature}', 'FeatureController@destroy')->name('delete.feature');

    Route::put('features/{feature}', 'FeatureController@update')->name('update.feature');

    Route::get('features/{feature}/show', 'FeatureController@show')->name('show.feature');

    //Clients Routes
    Route::get('clients/create', 'ClientsController@create')->name('create.client');

    Route::post('clients', 'ClientsController@store')->name('store.client');

    Route::get('clients/{client}/edit', 'ClientsController@edit')->name('edit.client');

    Route::put('clients/{client}', 'ClientsController@update')->name('update.client');

    Route::get('clients/{client}', 'ClientsController@destroy')->name('delete.client');
});
