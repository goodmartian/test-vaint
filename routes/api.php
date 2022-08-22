<?php

use App\Http\Controllers\API\Parser\GooglePlay\AppParserController;
use Illuminate\Support\Facades\Route;

Route::post('apps', [AppParserController::class, 'getAppIconUrlByName']);
