<?php
Route::get('exceptions', 'ExceptionviewerController@listall');
Route::get('exceptions/flush', 'ExceptionviewerController@flush');
Route::get('exceptions/{id}', 'ExceptionviewerController@show');
Route::get('exceptions/delete/{id}', 'ExceptionviewerController@delete');