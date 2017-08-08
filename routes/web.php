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



/********************************************************************************
users
 - list 
 - profile
news
 - list
 - details
********************************************************************************/

// in real life, data must be retrieved from db
function getUsers() {
    return [
        (object) ['id' => 1, 'name' => 'gilbert', 'age' => 28],
        (object) ['id' => 2, 'name' => 'ghenoie', 'age' => 35],
        (object) ['id' => 3, 'name' => 'sohpie', 'age' => 13],
    ];
}



// GET /users?id=123
Route::get('/users', function() {
    
    $users = getUsers();

    return view('users.list', ['users' => $users]);
    
});

Route::get('/users/{id}', function($id) {  
    
    $id = (int) $id;


    $users =  array_filter(
        getUsers(), 
        function($x) use($id) { return $x->id === $id; }
    );

    $user = $users[$id- 1];

    return view('users.details', ['user' => $user]);
    
});

Route::get('/users/details', function() {
    
    return view('users.details');
    
});




Route::get('/news', function() {
    
    return view('news.list');
    
});

Route::get('/news/details', function() {
    
    return view('news.details');
    
});

