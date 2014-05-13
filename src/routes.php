<?php
Route::get('exceptions', 'ExceptionViewerController@listall');
Route::get('exceptions/flush', 'ExceptionViewerController@flush');
Route::get('exceptions/{id}', 'ExceptionViewerController@show');