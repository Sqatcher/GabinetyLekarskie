<?php


use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\BalanceController;
use App\Http\Controllers\Account\BuyPremiumController;
use App\Http\Controllers\Account\DeleteAccountController;
use App\Http\Controllers\Account\AccountHistoryController;
use App\Http\Controllers\BetResultController;
use App\Http\Controllers\BetsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LiveBetsController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\RegisterConfirmController;
use App\Http\Controllers\ScratchController;
use App\Http\Controllers\SpecialBetsController;
use App\Models\BlikCode;
use App\Models\Event;
use App\Models\Odds;
use App\Models\Bet;
use App\Models\Premium;
use App\Models\SpecialEvent;
use App\Models\User;
use Codeception\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isNull;

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

Route::get('/', function () {
    $user = Auth::user();
    if ($user) {
        return view('dashboard')->with('user', $user);
    }
    return view('welcome');
})->name('welcome');


#Route::get('/register', 'RegistrationController@create');
#Route::post('register', 'RegistrationController@store');


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/strona_glowna', [DashboardController::class, 'strona_glowna'])->name('strona_glowna');
    Route::get('/dashboard', [DashboardController::class, 'strona_glowna'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'strona_glowna'])->name('home');

});



Route::middleware(['admin'])->group(function () {
    Route::get('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, "create"])->name("register");
    Route::post('create', [\App\Http\Controllers\Auth\RegisteredUserController::class, "store"])->name("register");
    Route::get('create', [\App\Http\Controllers\Auth\RegisteredUserController::class, "create"])->name("create");
    Route::get('allusers', [\App\Http\Controllers\Auth\RegisteredUserController::class, "allusers"])->name("allusers");
    Route::get('edituser/{id}', [\App\Http\Controllers\Auth\RegisteredUserController::class, "edituser"])->name("edituser");
    Route::post('update/{id}', [\App\Http\Controllers\Auth\RegisteredUserController::class, "update"])->name("update");

});



require __DIR__.'/auth.php';
