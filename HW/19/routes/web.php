<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

// index page
Route::get('/', [SiteController::class, 'index'])->name('index');

// All routes for managing tickets:
// - Create
// - Show
// - Edit
// - Delete
Route::resource('ticket', TicketController::class);

// Search ticket by phone number and ticket_number
Route::get('/tracking', [SiteController::class, 'tracking'])
    ->name('tracking');

// Find ticket by phone number and ticket_number
Route::post('/tracking', [SiteController::class, 'find']);
