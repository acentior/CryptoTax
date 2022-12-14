<?php

use App\Http\Controllers\Customer\SocialiteController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::view('/', 'pages.landing-pages.index')->name('index');
Route::view('/accounts', 'pages.landing-pages.account')->name('accounts');
Route::view('/portfolios', 'pages.landing-pages.portfolio')->name('portfolios');
Route::view('/tax', 'pages.landing-pages.tax')->name('tax');
Route::view('/contact', 'pages.landing-pages.contact')->name('contact');
Route::view('/faqs', 'pages.landing-pages.faqs')->name('faqs');
Route::view('/terms', 'pages.landing-pages.terms')->name('terms');
Route::view('/policy', 'pages.landing-pages.policy')->name('policy');
Route::view('/pricing', 'pages.landing-pages.pricing')->name('pricing');
Route::view('/about', 'pages.landing-pages.about')->name('about');
Route::view('/blog', 'pages.landing-pages.blogs')->name('blog');
Route::view('/risk', 'pages.landing-pages.risk')->name('risk');
Route::view('/imprint', 'pages.landing-pages.imprint')->name('imprint');
Route::view('/help', 'pages.landing-pages.help')->name('help');

Route::redirect('blog-detail', 'blog-detail/1');
Route::get('blog-detail/{id?}', function($id = 1){
    return view('pages.landing-pages.blog', [
        "id" => $id
    ]);
})->name('blog-detail');

// Affilate Page
Route::view('/affiliate', 'pages.landing-pages.affiliate')->name('affiliate');
Route::get('affili/{userAffiliate:hash}', function (\App\Models\UserAffiliate $userAffiliate) {
    return \App\Services\AffiliateService::instance()->redirect($userAffiliate);
});

// Logout
Route::get('logout', function() {
    auth()->logout();

    return redirect(route("customer.dashboard"));
});

//Route::get("test/coingecko", [\App\Http\Controllers\TestController::class, "coingeckoGetCoinMarkets"]);

// Auth routes for socialize
Route::get('auth/facebook', [SocialiteController::class, 'facebookRedirect'])->name("auth.facebook");
Route::get('auth/facebook/callback', [SocialiteController::class, 'facebookCallback']);
Route::get('auth/google', [SocialiteController::class, 'googleRedirect'])->name("auth.google");
Route::get('auth/google/callback', [SocialiteController::class, 'googleCallback']);
