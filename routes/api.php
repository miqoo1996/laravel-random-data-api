<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;




Route::get('users',[UserController::class,'getRandomUsers']);
