<?php

Route::get('user', function () {
    echo 'Hello from the user package!';
});


Route::post('/login', 'Insyghts\Authentication\Controllers\UserController@login');

Route::post('/create-contacts', 'Insyghts\Authentication\Controllers\ContactController@store');
Route::get('/contacts', 'Insyghts\Authentication\Controllers\ContactController@contacts');
Route::get('/single-contact/{id}', 'Insyghts\Authentication\Controllers\ContactController@single');
Route::put('/update-contact/{id}', 'Insyghts\Authentication\Controllers\ContactController@update');
Route::delete('/delete-contact/{id}', 'Insyghts\Authentication\Controllers\ContactController@delete');
