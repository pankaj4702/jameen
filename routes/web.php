<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FestivalGreetingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SiteMapController;
use Spatie\Sitemap\SitemapGenerator;


// Admin
Route::prefix('/admin')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::post('/login',[AdminController::class,'login'])->name('loginAdmin');
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware('checkAdminAuth');
    Route::get('/logout',[AdminController::class,'logout'])->name('logoutAdmin');
    Route::get('/add-project',[AdminController::class,'add_project'])->name('addProject')->middleware('checkAdminAuth');
    Route::post('/sell-property',[AdminController::class,'sell_property_store'])->name('sell_property_store');
    Route::get('/properties',[AdminController::class,'all_property'])->name('property');
    Route::get('/add-property-attributes',[AdminController::class,'property_attribute'])->name('property_attribute');
    Route::post('/store-attributes',[AdminController::class,'store_attributes'])->name('store_attribute');
    Route::get('/add-configuration',[AdminController::class,'configuration'])->name('addconfiguration');
    Route::post('/store-configuration',[AdminController::class,'store_configuration'])->name('store_configuration');
    Route::get('/get-configuration',[AdminController::class,'getconfiguration'])->name('configuration');
    Route::get('/add-city',[AdminController::class,'addCity'])->name('addCity');
    Route::post('/store-city',[AdminController::class,'store_city'])->name('storeCity');
    Route::get('/add-post-user',[AdminController::class,'addPostUser'])->name('addPostUser');
    Route::post('/store-post-user',[AdminController::class,'storePostUser'])->name('storePostUser');
    Route::get('/project-detail/{id}',[AdminController::class,'project_detail'])->name('project_detail');
    Route::get('/add-asset-management',[AdminController::class,'getAssetManagement'])->name('getAssetManagement');
    Route::post('/store-asset-management',[AdminController::class,'storeAsset'])->name('storeAsset');
    Route::get('/asset-delete/{id}',[AdminController::class,'removeAsset'])->name('removeAsset');
    Route::get('/testimonial',[AdminController::class,'addTestimonial'])->name('addTestimonial');
    Route::post('/store-testimonial',[AdminController::class,'storeTestimonial'])->name('storeTestimonial');
    Route::get('/inquiryData',[AdminController::class,'inquiryData'])->name('inquiryData');
    Route::get('/add-category',[AdminController::class,'addCategory'])->name('addCategory');
    Route::post('/store-category',[AdminController::class,'storeCategory'])->name('storeCategory');
    Route::get('/add-feature&amenities',[AdminController::class,'addFeatureAmenities'])->name('addFeatureAmenities');
    Route::post('/store-feature&amenities',[AdminController::class,'storeFeatureAmenities'])->name('storeFeatureAmenities');
    Route::get('/get-cate',[AdminController::class,'getCategory'])->name('getCategory');

});

Route::post('/store-inquiryData',[HomeController::class,'storeInquiryData'])->name('storeInquiryData');

Route::prefix('/admin/service')->group(function () {

    Route::get('/comprehensive-service',[AdminController::class,'getService'])->name('getService');
    Route::post('/store-comprehensive-service',[AdminController::class,'storeService'])->name('storeService');
    Route::get('/services',[AdminController::class,'allServices'])->name('allServices');
    Route::get('/service-delete/{id}',[AdminController::class,'removeService'])->name('removeService');


});

// admin market trends
Route::prefix('/admin/market-trend')->group(function () {
    Route::get('/add-news',[AdminController::class,'getNews'])->name('getNews');
    Route::post('/store-news',[AdminController::class,'storeNews'])->name('storeNews');

    Route::get('/add-media',[AdminController::class,'getMedia'])->name('getMedia');
    Route::post('/store-media',[AdminController::class,'storeMedia'])->name('storeMedia');

    Route::get('/add-blog',[AdminController::class,'getBlog'])->name('getBlog');
    Route::post('/store-blog',[AdminController::class,'storeBlog'])->name('storeBlog');

    Route::get('/add-property-insight',[AdminController::class,'getInsight'])->name('getInsight');
    Route::post('/store-insight',[AdminController::class,'storeInsight'])->name('storeInsight');
});

// front-end user
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/login-user',[LoginController::class,'index'])->name('loginpage')->middleware('checkUserAuth');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/signup',[RegisterController::class,'index'])->name('signup')->middleware('checkUserAuth');
Route::post('/register',[RegisterController::class,'register'])->name('register');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

// profile
Route::get('/user-profile',[ProfileController::class,'index'])->name('user_profile');
Route::post('/edit-profile',[ProfileController::class,'update_profile'])->name('update_profile');


// sell
Route::get('/sell',[HomeController::class,'sell_property'])->name('sell_property');

Route::get('/sell-properties/{id}',[HomeController::class,'BuyPropertyList'])->name('BuyPropertyList');

Route::get('/rent-properties/{id}',[HomeController::class,'RentPropertyList'])->name('RentPropertyList');

Route::get('/pg-properties/{id}',[HomeController::class,'PgPropertyList'])->name('PgPropertyList');

Route::get('/property-detail/{id}',[HomeController::class,'propertyDetail'])->name('propertyDetail');

Route::get('/get-bedroom',[HomeController::class,'getbedroom'])->name('getbedroom');

Route::get('/get-location',[LocationController::class,'getLocation']);

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

Route::get('/send-mymail',[FestivalGreetingController::class,'sendGreetings'])->name('sendGreetings');

Route::get('/monthlyPlan',[PaymentController::class,'createPlan'])->name('montlyPlan');
Route::get('/create-prod',[PaymentController::class,'createProduct'])->name('createProduct');
Route::get('/prod-list',[PaymentController::class,'getProductList'])->name('getProductList');
Route::get('/prod-delete',[PaymentController::class,'deleteProduct'])->name('deleteProduct');
Route::get('/get-firstPlan',[PaymentController::class,'firstPlan'])->name('firstPlan');
Route::get('/payment_store',[PaymentController::class,'payment_store'])->name('payment_store');

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
});
Route::get('/sitemap',[SiteMapController::class,'index']);

