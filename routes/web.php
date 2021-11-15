<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Customer\LinkController;
use App\Http\Controllers\Customer\TeamController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Customer\InvitationController;
use App\Http\Controllers\Customer\MemberShipController;
use App\Http\Controllers\Customer\DashBoardController as CustomerDashBoard;

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


Route::get('/' , [HomeController::class,'index'])->name('home');

Route::group(['middleware' =>['auth'],'as' => 'customer.'],function()
  {
    Route::get('dashboard', [CustomerDashBoard::class,'index'])->name('dashboard.index');

   # Route::get('invitation', [TeamController::class,'invitation'])->name('team.invitation');

    Route::resource('invitation', InvitationController::class);

    #Route::post('invitation/{id}', [TeamController::class,'UpdateInvitationStatus'])->name('team.invitation.update.status');

   # Route::get('team/member/invite', [TeamController::class,'invite'])->name('team.member.invite');

   # Route::post('team/member/invite', [TeamController::class,'sendInvitation'])->name('team.member.invite.send');

    Route::resource('team', TeamController::class);

    Route::resource('link', LinkController::class);

    Route::get('membership', [MemberShipController::class,'index'])->name('membership.index');

    Route::get('membership/upgrade', [MemberShipController::class,'upgrade'])->name('membership.upgrade');
});

# social login  

Route::get('login' , [SocialLoginController::class,'showLoginForm'])->name('login');

Route::get('auth/{driver}', [SocialLoginController::class,'redirectToProvider'])->name('login-provider');

Route::get('auth/{driver}/callback', [SocialLoginController::class,'handleProviderCallback'])->name('login-callback');

Route::post('logout', [SocialLoginController::class,'logout'])->name('logout');
