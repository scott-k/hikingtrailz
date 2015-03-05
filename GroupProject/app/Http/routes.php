<?php

Route::get('/', function(){
	return view('home');
});

Route::get('/profile', function(){
	return view('profile');
});

Route::get('/signup', function(){
	return view('signup');
});

//Mountains
Route::get('/Mountains', function(){return redirect('/Mountains/all');});
Route::get('/Mountains/all', 'MountainController@getAll');
Route::get('/Mountains/{mountain_id}', 'MountainController@getMountain');


//Trails
// Route::get('/Trails/{mountain_id}', 'TrailController@getAll($mountain_id)');
Route::get('/Trails', function(){return redirect('/Mountains/all');});
Route::get('/Trails/all', 'TrailController@getAll');
Route::get('/Trails/{mountain_id}/{trail_id}', 'TrailController@getTrail');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);