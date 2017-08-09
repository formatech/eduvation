<?php

use Illuminate\Http\Request;

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

// GET /users
Route::get('/users', function() {
    
    $usersRepo = new \App\Repositories\Users();

    $users = $usersRepo->all();

    return view('users.list', ['users' => $users]);
    
});

// GET /users/create
// Important note: specific routes should be registered first
Route::get('/users/create', function() {
    
    return view('users.create');

});


// GET /users/1
Route::get('/users/{id}', function($id) {  

    $usersRepo = new \App\Repositories\Users();

    $id = (int) $id;

    $user = $usersRepo->find($id);

    if($user == null) {
        abort(404);
    }

    return view('users.details', ['user' => $user]);
    
});


// POST /users
Route::post('/users', function () {

    $usersRepo = new \App\Repositories\Users;

    $usersRepo->create(request()->only(['age', 'name']));

    return redirect('/users');

});