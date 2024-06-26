<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/hy', 'hello') ;    

Route::get('/data/{id?}/name/{nid?}' , function ($id=null , $nid = null){    //? this for both typee value
   
   if($id){

       return "<h1>ID: $id</h1>"."<h1>NAME ID: $nid</h1>";
   }else{
        return "<h1>ID: not found</h1>";
   };
});

// laraveal ROUTE CONSTRAINT

 //https://localhost/post/10 ----> whereNumber('id)
 //https://localhost/post/string ----> whereAlpha('name)
 //https://localhost/post/number&string ----> whereAlphaNumber('name')
 //https://localhost/post/spacic_Route ----> whereIn('category',['movie','song])
 //https://localhost/post/@10 ----> where('ic','[@0-9]+')

 Route::get('student/{id}', function($id = null) {
    if ($id) {
        return "<p>Student ID: $id</p>";
    } else {
        return "<p>Not Found</p>";
    }
})->whereNumber('id');

Route::get('students/{name}', function($name){
    return "<h5>NAME : $name</h5>";
})->whereAlpha('name');


Route::get('moj/{category}', function (string $category) {
    return "<h5>category : $category</h5>";
})->where('category', 'movie|song');


 // route name

 Route::view('/loharrrr' , 'lohar')->name('loh');
 Route::view('/kuldeepppp' , 'kuldeep')->name('kul');

 //ROute GROup
 Route::prefix('india')->group(function() {

        Route::get('/mp', function () {
            return "<h1>Madhya Pradesh</h1>";
        });

        Route::get('/rj', function () {
            return "<h1>Rajasthan</h1>";
        });

        Route::get('/motabhai', function () {
            return "<h1>Gujarat</h1>";
        });

        Route::redirect('/gj', '/india/motabhai');
    });           
  
    Route::fallback(function(){

        return "<h1>ROUTE not found</h1>";
    });