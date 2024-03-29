<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('/admin')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::post('/login',[AdminController::class,'login'])->name('loginAdmin');
    Route::get('/logout',[AdminController::class,'logout'])->name('logoutAdmin');
});

Route::prefix('/admin')->middleware('checkAdminAuth')->group(function () {

    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/profile',[AdminController::class,'adminProfile'])->name('adminProfile');


    Route::get('/add-category',[AdminController::class,'addCategory'])->name('addCategory');
    Route::post('/store-category',[AdminController::class,'storeCategory'])->name('storeCategory');
    Route::post('/store-configuration',[AdminController::class,'store_configuration'])->name('store_configuration');
    Route::get('/delete-configuration/{id}',[AdminController::class,'delete_configuration'])->name('delete_configuration');
    Route::get('/get-configuration',[AdminController::class,'getconfiguration'])->name('configuration');
    Route::get('/add-featureAmenities',[AdminController::class,'addFeatureAmenities'])->name('addFeatureAmenities');
    Route::post('/store-featureamenities',[AdminController::class,'storeFeatureAmenities'])->name('storeFeatureAmenities');
    Route::get('/delete-featureamenities/{id}',[AdminController::class,'deleteFeature'])->name('deleteFeature');

    Route::get('/add-property',[AdminController::class,'add_property'])->name('addProperty')->middleware('checkAdminAuth');
    Route::post('/store-property',[AdminController::class,'store_property'])->name('store_property');

    Route::get('/properties',[AdminController::class,'all_property'])->name('property');
    Route::get('/property-detail/{id}',[AdminController::class,'property_detail'])->name('property_detail');
    Route::get('/property-delete/{id}',[AdminController::class,'property_delete'])->name('property_delete');

    Route::get('/add/property-attributes',[AdminController::class,'property_attribute'])->name('property_attribute');
    Route::post('/store-attributes',[AdminController::class,'store_attributes'])->name('store_attribute');
    Route::get('/delete-status/{id}',[AdminController::class,'deleteStatus'])->name('deleteStatus');
    Route::get('/delete-source/{id}',[AdminController::class,'deleteSource'])->name('deleteSource');

    Route::get('/add/city',[AdminController::class,'addCity'])->name('addCity');
    Route::post('/store-city',[AdminController::class,'store_city'])->name('storeCity');
    Route::get('/delete-city/{id}',[AdminController::class,'deleteCity'])->name('deleteCity');

    Route::get('/add/post-user',[AdminController::class,'addPostUser'])->name('addPostUser');
    Route::get('/delete-post-user/{id}',[AdminController::class,'deletePostUser'])->name('deletePostUser');
    Route::post('/store-post-user',[AdminController::class,'storePostUser'])->name('storePostUser');

    Route::get('/add/testimonial',[AdminController::class,'addTestimonial'])->name('addTestimonial');
    Route::get('/testimonials',[AdminController::class,'allTestimonial'])->name('Testimonials');
    Route::post('/store-testimonial',[AdminController::class,'storeTestimonial'])->name('storeTestimonial');
    Route::get('/delete-testimonial/{id}',[AdminController::class,'deleteTestimonial'])->name('deleteTestimonial');
    Route::get('/approve-testimonial/{id}',[AdminController::class,'approveTestimonial'])->name('approveTestimonial');

    Route::get('/inquiryData',[AdminController::class,'inquiryData'])->name('inquiryData');
    Route::get('/delete-category/{id}',[AdminController::class,'deleteCategory'])->name('deleteCategory');
    Route::get('/get-cate',[AdminController::class,'getCategory'])->name('getCategory');

});

    Route::prefix('/admin/service')->middleware('checkAdminAuth')->group(function () {
        Route::get('/add-service',[AdminController::class,'getService'])->name('getService');
        Route::post('/store-service',[AdminController::class,'storeService'])->name('storeService');
        Route::get('/services',[AdminController::class,'allServices'])->name('allServices');
        Route::get('/service-delete/{id}',[AdminController::class,'removeService'])->name('removeService');
    });

// admin market trends
    Route::prefix('/admin/market-trend')->middleware('checkAdminAuth')->group(function () {
        Route::get('/add-news',[AdminController::class,'getNews'])->name('addNews');
        Route::get('/edit-news/{id}',[AdminController::class,'editNews'])->name('editNews');
        Route::get('/News',[AdminController::class,'News'])->name('getNews');
        Route::get('/delete-news/{id}',[AdminController::class,'deleteNews'])->name('deleteNews');
        Route::post('/store-news',[AdminController::class,'storeNews'])->name('storeNews');
        Route::post('/update-news',[AdminController::class,'updateNews'])->name('updateNews');

        Route::get('/add-media',[AdminController::class,'getMedia'])->name('addMedia');
        Route::get('/edit-media/{id}',[AdminController::class,'editMedia'])->name('editMedia');
        Route::get('/media',[AdminController::class,'Media'])->name('getMedia');
        Route::get('/delete-media/{id}',[AdminController::class,'deleteMedia'])->name('deleteMedia');
        Route::post('/store-media',[AdminController::class,'storeMedia'])->name('storeMedia');
        Route::post('/update-media',[AdminController::class,'updateMedia'])->name('updateMedia');


        Route::get('/add-blog',[AdminController::class,'getBlog'])->name('addBlog');
        Route::get('/edit-blog/{id}',[AdminController::class,'editBlog'])->name('editBlog');
        Route::get('/blog',[AdminController::class,'Blog'])->name('getBlog');
        Route::get('/delete-blog/{id}',[AdminController::class,'deleteBlog'])->name('deleteBlog');
        Route::post('/store-blog',[AdminController::class,'storeBlog'])->name('storeBlog');
        Route::post('/update-blog',[AdminController::class,'updateBlog'])->name('updateBlog');

        Route::get('/add-property-insight',[AdminController::class,'getInsight'])->name('addInsight');
        Route::get('/edit-property-insight/{id}',[AdminController::class,'editInsight'])->name('editInsight');
        Route::get('/insight',[AdminController::class,'Insight'])->name('getInsight');
        Route::get('/delete-insight/{id}',[AdminController::class,'deleteInsight'])->name('deleteInsight');
        Route::post('/store-insight',[AdminController::class,'storeInsight'])->name('storeInsight');
        Route::post('/update-insight',[AdminController::class,'updateInsight'])->name('updateInsight');

    });

    //Admin about section
    Route::prefix('/admin/about')->middleware('checkAdminAuth')->group(function () {
        Route::get('/add-profile',[AdminController::class,'getCompanyProfile'])->name('getCompanyProfile');
        Route::post('/store-profile',[AdminController::class,'storeCompanyProfile'])->name('storeCompanyProfile');
        Route::get('/profiles',[AdminController::class,'allProfile'])->name('allProfile');
        Route::get('/delete-profile/{id}',[AdminController::class,'removeProfile'])->name('removeProfile');
        Route::get('/ceo-message',[AdminController::class,'getCompanyMessageCeo'])->name('getCompanyMessageCeo');
        Route::get('/chairman-message',[AdminController::class,'getCompanyMessageChairman'])->name('getCompanyMessageChairman');
        Route::get('/edit-message/{id}',[AdminController::class,'editCompanyMessage'])->name('editCompanyMessage');
        Route::post('/update-message',[AdminController::class,'updateCompanyMessage'])->name('updateCompanyMessage');
        Route::get('/corporate-team',[AdminController::class,'getCorporateTeam'])->name('getCorporateTeam');
        Route::get('/add-corporate-team',[AdminController::class,'addCompanyProfile'])->name('addCompanyProfile');
        Route::post('/store-corporate-team',[AdminController::class,'storeCorporateTeam'])->name('storeCorporateTeam');
        Route::get('/remove-corporate-team/{id}',[AdminController::class,'removeTeam'])->name('removeTeam');
        Route::get('/corporate-team-heading',[AdminController::class,'corporateTeamHeading'])->name('corporateTeamHeading');
        Route::post('/store-team-heading',[AdminController::class,'storeCorporateHeading'])->name('storeCorporateHeading');

    });
    // faq
    Route::prefix('/admin/faq')->middleware('checkAdminAuth')->group(function () {
        Route::get('/faq',[AdminController::class,'Faq'])->name('Faq');
        Route::get('/add-faq',[AdminController::class,'addFaq'])->name('addFaq');
        Route::post('/store-faq',[AdminController::class,'storeFaq'])->name('storeFaq');
        Route::get('/removeFaq/{id}',[AdminController::class,'deletefaq'])->name('removeFaq');

    });
    // home
    Route::prefix('/admin/home')->middleware('checkAdminAuth')->group(function () {
        // main section
        Route::get('/main-section',[AdminController::class,'mainSection'])->name('mainSection');
        Route::post('/store-main-section',[AdminController::class,'storeMainSection'])->name('storeMainSection');
        Route::get('/delete-main-section-image/{id}',[AdminController::class,'deleteMainImage'])->name('deleteMainImage');
        // about section
        Route::get('/about-section',[AdminController::class,'aboutSection'])->name('aboutSection');
        Route::post('/update-about-section',[AdminController::class,'updateAboutSection'])->name('updateAboutSection');
        // company logo
        Route::get('/company-logo-section',[AdminController::class,'companyLogoSection'])->name('companyLogoSection');
        Route::post('/update-company-logo',[AdminController::class,'updateCompanyLoog'])->name('updateCompanyLoog');
        Route::get('/delete-company-logo/{id}',[AdminController::class,'deleteCompanyLogo'])->name('deleteCompanyLogo');
        // checkout section
        Route::get('/checkout-section',[AdminController::class,'checkoutSection'])->name('checkoutSection');
        Route::post('/update-checkout-section',[AdminController::class,'updateCheckoutSection'])->name('updateCheckoutSection');
        // blog section
        Route::get('/blog-section',[AdminController::class,'blogSection'])->name('blogSection');
        Route::post('/update-blog-section',[AdminController::class,'updateBlogSection'])->name('updateBlogSection');

        // profile
        Route::post('/update-profile',[AdminController::class,'updateProfile'])->name('updateProfile');


    });






