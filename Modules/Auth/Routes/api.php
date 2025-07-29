<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'api/auth','middleware'=>['api']], function() {
    // API endpoints: login, register, logout...
});