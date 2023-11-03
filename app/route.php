<?php


Route::run("", "home@main");
Route::run("visitorCard", "visitor@card");
Route::run("showVisit", "visitor@show");
Route::run("visitor", "visitor@control");


Route::run("test",function(){
   echo "test";
});

Route::run("tr",function(){
   Lang::switch("tr");
   header("location:/");
});
Route::run("en",function(){
   Lang::switch("en");
   header("location:/");
});