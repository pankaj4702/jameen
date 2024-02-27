<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FestivalGreetingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SiteMapController;
use Spatie\Sitemap\SitemapGenerator;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/sell-properties/{id}',[HomeController::class,'BuyPropertyList'])->name('BuyPropertyList');
Route::get('/rent-properties/{id}',[HomeController::class,'RentPropertyList'])->name('RentPropertyList');
Route::get('/pg-properties/{id}',[HomeController::class,'PgPropertyList'])->name('PgPropertyList');
Route::get('/commercial-properties/{id}',[HomeController::class,'CommPropertyList'])->name('CommPropertyList');
Route::get('/property-detail/{id}',[HomeController::class,'propertyDetail'])->name('propertyDetail');
Route::get('/get-bedroom',[HomeController::class,'propertyFilter'])->name('propertyFilter');
// Route::get('/get-location',[LocationController::class,'getLocation']);
Route::get('/get-featureAmenities',[HomeController::class,'featureAmenities'])->name('featureAmenities');
Route::get('/send-mail',[MailController::class,'index'])->name('subscribe');


// services
Route::prefix('/services')->group(function () {
Route::get('/asset-management',[ServiceController::class,'getAsset'])->name('getAsset');
Route::get('/holiday-homes',[ServiceController::class,'getHolidayHomes'])->name('getHolidayHomes');
Route::get('/commercial',[ServiceController::class,'getCommercial'])->name('getCommercial');
Route::get('/investment-advisory',[ServiceController::class,'investAdvisory'])->name('investAdvisory');
Route::get('/conveyance',[ServiceController::class,'conveyance'])->name('conveyance');
Route::get('/property-valuation',[ServiceController::class,'valuation'])->name('valuation');
});

// Events
Route::prefix('/services')->group(function () {
Route::get('/send-mail',[EventController::class,'sendMail'])->name('sendQueueMail');
Route::post('/add-mail',[EventController::class,'addMail'])->name('addQueueMail');
Route::get('/send-msg',[EventController::class,'sendWhatsApp'])->name('sendMsg');

});

// Route::get('/send-mymail',[FestivalGreetingController::class,'sendGreetings'])->name('sendGreetings');

// reviews
Route::get('/client-reviews',[HomeController::class,'reviews'])->name('reviews');
Route::get('/property-list/{id}',[HomeController::class,'propertyList'])->name('propertyList');

// Market and Trends

Route::get('/jameen-online-news',[HomeController::class,'news'])->name('News');
Route::get('/jameen-news/{id}',[HomeController::class,'singleNews'])->name('SingleNews');
Route::get('/jameen-insights',[HomeController::class,'insights'])->name('Insights');
Route::get('/jameen-insight/{id}',[HomeController::class,'singleInsight'])->name('singleInsight');
Route::get('/jameen-media',[HomeController::class,'media'])->name('Media');
Route::get('/jameen-media/{id}',[HomeController::class,'singleMedia'])->name('SingleMedia');
Route::get('/jameen-blog',[HomeController::class,'blog'])->name('Blog');
Route::get('/jameen-blog/{id}',[HomeController::class,'singleBlog'])->name('singleBlog');

Route::get('/search-news',[HomeController::class,'newsSearch'])->name('NewsSearch');
Route::get('/search-insight',[HomeController::class,'InsightSearch'])->name('InsightSearch');
Route::get('/search-blog',[HomeController::class,'BlogSearch'])->name('BlogSearch');
Route::get('/search-media',[HomeController::class,'MediaSearch'])->name('MediaSearch');


// About
Route::prefix('/about')->group(function () {
Route::get('/company-profile',[HomeController::class,'companyProfile'])->name('companyProfile');
Route::get('/chairman-message',[HomeController::class,'chairmanMessage'])->name('chairmanMessage');
Route::get('/ceo-message',[HomeController::class,'ceoMessage'])->name('ceoMessage');
Route::get('/corporate-team',[HomeController::class,'corporateTeam'])->name('corporateTeam');
});

Route::get('/sitemap',[SiteMapController::class,'index']);
Route::post('/store-inquiryData',[HomeController::class,'storeInquiryData'])->name('storeInquiryData');


