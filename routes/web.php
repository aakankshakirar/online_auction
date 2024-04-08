<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('items.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // For Item Listing Page
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');

    // Fetch highest bids for each item
    Route::get('/items/highest-bids', [ItemController::class, 'fetchHighestBidsForEachItem'])->name('items.highest-bids');

    // Determine winners
    Route::get('/items/determine-winner', [ItemController::class, 'determineWinners'])->name('items.determine-winner');

    // For submitting a bid
    Route::post('/bids', [BidController::class, 'store'])->name('bids.store');

    Route::get('/check-winning-bids', [BidController::class, 'checkWinningBids']);
});

require __DIR__ . '/auth.php';
