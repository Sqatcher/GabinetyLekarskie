<?php


use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\BalanceController;
use App\Http\Controllers\Account\BuyPremiumController;
use App\Http\Controllers\Account\DeleteAccountController;
use App\Http\Controllers\Account\AccountHistoryController;
use App\Http\Controllers\BetResultController;
use App\Http\Controllers\BetsController;
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
        return view('welcome')->with('user', $user);
    }
    return view('welcome');
})->name('welcome');

require __DIR__.'/auth.php';
