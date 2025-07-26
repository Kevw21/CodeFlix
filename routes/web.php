<?php

use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscription/plans', [SubscribeController::class, 'showPlans'])->name('subscribe.plans');
Route::get('/subscription/plan/{plan}', [SubscribeController::class, 'checkoutPlan'])->name('subscribe.checkout');
