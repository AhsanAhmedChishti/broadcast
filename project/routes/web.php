<?php

// ************************************ ADMIN SECTION **********************************************

use App\Classes\AppMailer;

Route::prefix('admin')->group(function () {

    //------------ ADMIN LOGIN SECTION ------------

    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
    Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
    Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

    //------------ ADMIN LOGIN SECTION ENDS ------------

    //------------ ADMIN NOTIFICATION SECTION ------------


    // Order Notification
    Route::get('/order/notf/show', 'Admin\NotificationController@order_notf_show')->name('order-notf-show');
    Route::get('/order/notf/count', 'Admin\NotificationController@order_notf_count')->name('order-notf-count');
    Route::get('/order/notf/clear', 'Admin\NotificationController@order_notf_clear')->name('order-notf-clear');
    // Order Notification Ends

    // Product Notification
    Route::get('/product/notf/show', 'Admin\NotificationController@product_notf_show')->name('product-notf-show');
    Route::get('/product/notf/count', 'Admin\NotificationController@product_notf_count')->name('product-notf-count');
    Route::get('/product/notf/clear', 'Admin\NotificationController@product_notf_clear')->name('product-notf-clear');
    // Product Notification Ends

    // Product Notification
    Route::get('/conv/notf/show', 'Admin\NotificationController@conv_notf_show')->name('conv-notf-show');
    Route::get('/conv/notf/count', 'Admin\NotificationController@conv_notf_count')->name('conv-notf-count');
    Route::get('/conv/notf/clear', 'Admin\NotificationController@conv_notf_clear')->name('conv-notf-clear');
    // Product Notification Ends

    //------------ ADMIN NOTIFICATION SECTION ENDS ------------

    //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profile');
    Route::post('/profile/update', 'Admin\DashboardController@profileUpdate')->name('admin.profile.update');
    Route::get('/password', 'Admin\DashboardController@passwordreset')->name('admin.password');
    Route::post('/password/update', 'Admin\DashboardController@changepass')->name('admin.password.update');
    //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------

    //---------ADMIN CATEGORY SECTION-------------

    Route::get('/category/datatables', 'Admin\CategoryController@datatables')->name('admin-category-datatables'); //JSON REQUEST

    Route::get('/category', 'Admin\CategoryController@index')->name('admin-category-index');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('admin-category-create');
    Route::post('/category', 'Admin\CategoryController@store')->name('admin-category-store');

    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin-category-edit');
    Route::post('/category/update/{id}', 'Admin\CategoryController@update')->name('admin-category-update');

    Route::get('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin-category-delete');
    Route::get('/category/status/{id1}/{id2}', 'Admin\CategoryController@status')->name('admin-category-status');


    Route::get('/category/title/create', 'Admin\CategoryController@category_title_create')->name('admin-category-title-create');

    Route::put('/category/title/update/{id}', 'Admin\CategoryController@category_title_update')->name('admin-category-title-update');
    //---------ADMIN CATEGORY SECTION ENDS-------------


    //------------ ADMIN AUCTION SECTION ------------
    Route::get('/auction/pending/datatables', 'Admin\AuctionController@pendingtables')->name('admin-auction-pending-datatables');
    Route::get('/auction/datatables', 'Admin\AuctionController@datatables')->name('admin-auction-datatables');
    Route::get('/auction/latest/datatables', 'Admin\AuctionController@latestdatatables')->name('admin-auction-latest-datatables');

    Route::get('/auction', 'Admin\AuctionController@index')->name('admin-auction-index');
    Route::get('pending/auction', 'Admin\AuctionController@pending')->name('admin-auction-pending');
    Route::get('/auction/create', 'Admin\AuctionController@create')->name('admin-auction-create');
    Route::post('/auction/store', 'Admin\AuctionController@store')->name('admin-auction-store');
    Route::get('/auction/edit/{id}', 'Admin\AuctionController@edit')->name('admin-auction-edit');
    Route::post('/auction/edit/{id}', 'Admin\AuctionController@update')->name('admin-auction-update');
    Route::get('/auction/delete/{id}', 'Admin\AuctionController@destroy')->name('admin-auction-delete');
    Route::get('/auction/status/{id1}/{id2}', 'Admin\AuctionController@status')->name('admin-auction-status');
    Route::get('/auction/approve/{id1}/{id2}', 'Admin\AuctionController@approve')->name('admin-auction-approve');
    Route::get('/auction/show/{id}', 'Admin\AuctionController@show')->name('admin-auction-show');
    Route::get('/auction/make/winner/{id}', 'Admin\AuctionController@winner')->name('admin-auction-winner');
    Route::get('/auction/remove/winner/{id}', 'Admin\AuctionController@remove')->name('admin-auction-remove-winner');
    //------------ ADMIN AUCTION SECTION ENDS ------------


    //------------ ADMIN GALLERY SECTION ------------

    Route::get('/gallery/show', 'Admin\GalleryController@show')->name('admin-gallery-show');
    Route::post('/gallery/store', 'Admin\GalleryController@store')->name('admin-gallery-store');
    Route::get('/gallery/delete', 'Admin\GalleryController@destroy')->name('admin-gallery-delete');

    //------------ ADMIN GALLERY SECTION ENDS------------



    Route::get('/auction/title/create', 'Admin\AuctionController@title_description')->name('admin-auction-title-description');

    Route::put('/auction/title/update/{id}', 'Admin\AuctionController@title_description_update')->name('admin-auction-title_description-update');

    //------------ ADMIN ORDER SECTION ------------
    Route::get('/orders/datatables/{slug}', 'Admin\OrderController@datatables')->name('admin-order-datatables'); //JSON REQUEST
    Route::get('/orders', 'Admin\OrderController@index')->name('admin-order-index');
    Route::get('/orders/pending', 'Admin\OrderController@pending')->name('admin-order-pending');
    Route::get('/orders/processing', 'Admin\OrderController@processing')->name('admin-order-processing');
    Route::get('/orders/completed', 'Admin\OrderController@completed')->name('admin-order-completed');
    Route::get('/orders/declined', 'Admin\OrderController@declined')->name('admin-order-declined');
    Route::get('/order/{id}/show', 'Admin\OrderController@show')->name('admin-order-show');
    Route::get('/order/{id}/print', 'Admin\OrderController@print')->name('admin-order-print');
    Route::get('/order/{id1}/status/{status}', 'Admin\OrderController@status')->name('admin-order-status');
    Route::post('/order/email/', 'Admin\OrderController@emailsub')->name('admin-order-emailsub');


    //------------ ADMIN PRODUCT SECTION ------------

    Route::get('/plans/datatables', 'Admin\ProductController@datatables')->name('admin-prod-datatables'); //JSON REQUEST
    Route::get('/plans', 'Admin\ProductController@index')->name('admin-prod-index');
    Route::get('/plans/informations', 'Admin\ProductController@info')->name('admin-prod-info');

    // CREATE SECTION
    Route::get('/plans/create', 'Admin\ProductController@create')->name('admin-prod-create');
    Route::post('/plans/store', 'Admin\ProductController@store')->name('admin-prod-store');
    // CREATE SECTION

    // EDIT SECTION
    Route::get('/plans/edit/{id}', 'Admin\ProductController@edit')->name('admin-prod-edit');
    Route::post('/plans/edit/{id}', 'Admin\ProductController@update')->name('admin-prod-update');
    // EDIT SECTION ENDS

    // DELETE SECTION
    Route::get('/plans/delete/{id}', 'Admin\ProductController@destroy')->name('admin-prod-delete');
    // DELETE SECTION ENDS

    //------------ ADMIN PRODUCT SECTION ENDS------------

    //------------ ADMIN BLOG SECTION ------------

    Route::get('/blog/datatables', 'Admin\BlogController@datatables')->name('admin-blog-datatables'); //JSON REQUEST
    Route::get('/blog', 'Admin\BlogController@index')->name('admin-blog-index');
    Route::get('/blog/create', 'Admin\BlogController@create')->name('admin-blog-create');
    Route::post('/blog/create', 'Admin\BlogController@store')->name('admin-blog-store');
    Route::get('/blog/edit/{id}', 'Admin\BlogController@edit')->name('admin-blog-edit');
    Route::post('/blog/edit/{id}', 'Admin\BlogController@update')->name('admin-blog-update');
    Route::get('/blog/delete/{id}', 'Admin\BlogController@destroy')->name('admin-blog-delete');

    Route::get('/blog/category/datatables', 'Admin\BlogCategoryController@datatables')->name('admin-cblog-datatables'); //JSON REQUEST
    Route::get('/blog/category', 'Admin\BlogCategoryController@index')->name('admin-cblog-index');
    Route::get('/blog/category/create', 'Admin\BlogCategoryController@create')->name('admin-cblog-create');
    Route::post('/blog/category/create', 'Admin\BlogCategoryController@store')->name('admin-cblog-store');
    Route::get('/blog/category/edit/{id}', 'Admin\BlogCategoryController@edit')->name('admin-cblog-edit');
    Route::post('/blog/category/edit/{id}', 'Admin\BlogCategoryController@update')->name('admin-cblog-update');
    Route::get('/blog/category/delete/{id}', 'Admin\BlogCategoryController@destroy')->name('admin-cblog-delete');

    //------------ ADMIN BLOG SECTION ENDS ------------

    //------------ ADMIN SLIDER SECTION ------------

    Route::get('/slider/datatables', 'Admin\SliderController@datatables')->name('admin-sl-datatables'); //JSON REQUEST
    Route::get('/slider', 'Admin\SliderController@index')->name('admin-sl-index');
    Route::get('/slider/create', 'Admin\SliderController@create')->name('admin-sl-create');
    Route::post('/slider/create', 'Admin\SliderController@store')->name('admin-sl-store');
    Route::get('/slider/edit/{id}', 'Admin\SliderController@edit')->name('admin-sl-edit');
    Route::post('/slider/edit/{id}', 'Admin\SliderController@update')->name('admin-sl-update');
    Route::get('/slider/delete/{id}', 'Admin\SliderController@destroy')->name('admin-sl-delete');

    //------------ ADMIN SLIDER SECTION ENDS ------------

    //------------ ADMIN SERVICE SECTION ------------

    Route::get('/service/datatables', 'Admin\ServiceController@datatables')->name('admin-service-datatables'); //JSON REQUEST
    Route::get('/service', 'Admin\ServiceController@index')->name('admin-service-index');
    Route::get('/service/create', 'Admin\ServiceController@create')->name('admin-service-create');
    Route::post('/service/create', 'Admin\ServiceController@store')->name('admin-service-store');
    Route::get('/service/edit/{id}', 'Admin\ServiceController@edit')->name('admin-service-edit');
    Route::post('/service/edit/{id}', 'Admin\ServiceController@update')->name('admin-service-update');
    Route::get('/service/delete/{id}', 'Admin\ServiceController@destroy')->name('admin-service-delete');

    //------------ ADMIN SERVICE SECTION ENDS ------------



    //------------ ADMIN MEMBER SECTION ------------

    Route::get('/member/datatables', 'Admin\MemberController@datatables')->name('admin-member-datatables');
    Route::get('/member', 'Admin\MemberController@index')->name('admin-member-index');
    Route::get('/member/create', 'Admin\MemberController@create')->name('admin-member-create');
    Route::post('/member/create', 'Admin\MemberController@store')->name('admin-member-store');
    Route::get('/member/edit/{id}', 'Admin\MemberController@edit')->name('admin-member-edit');
    Route::post('/member/edit/{id}', 'Admin\MemberController@update')->name('admin-member-update');
    Route::get('/member/delete/{id}', 'Admin\MemberController@destroy')->name('admin-member-delete');

    //------------ ADMIN MEMBER SECTION ENDS ------------

    //------------ ADMIN PRESENTATION SECTION ------------

    Route::get('/vpresentation/datatables', 'Admin\VpresentationController@datatables')->name('admin-vpresentation-datatables');
    Route::get('/vpresentation', 'Admin\VpresentationController@index')->name('admin-vpresentation-index');
    Route::get('/vpresentation/create', 'Admin\VpresentationController@create')->name('admin-vpresentation-create');
    Route::post('/vpresentation/create', 'Admin\VpresentationController@store')->name('admin-vpresentation-store');
    Route::get('/vpresentation/edit/{id}', 'Admin\VpresentationController@edit')->name('admin-vpresentation-edit');
    Route::post('/vpresentation/edit/{id}', 'Admin\VpresentationController@update')->name('admin-vpresentation-update');
    Route::get('/vpresentation/delete/{id}', 'Admin\VpresentationController@destroy')->name('admin-vpresentation-delete');

    //------------ ADMIN PRESENTATION SECTION ENDS ------------

    //------------ ADMIN REVIEW SECTION ------------

    Route::get('/review/datatables', 'Admin\ReviewController@datatables')->name('admin-review-datatables'); //JSON REQUEST
    Route::get('/review', 'Admin\ReviewController@index')->name('admin-review-index');
    Route::get('/review/create', 'Admin\ReviewController@create')->name('admin-review-create');
    Route::post('/review/create', 'Admin\ReviewController@store')->name('admin-review-store');
    Route::get('/review/edit/{id}', 'Admin\ReviewController@edit')->name('admin-review-edit');
    Route::post('/review/edit/{id}', 'Admin\ReviewController@update')->name('admin-review-update');
    Route::get('/review/delete/{id}', 'Admin\ReviewController@destroy')->name('admin-review-delete');

    //------------ ADMIN REVIEW SECTION ENDS ------------

    /*-------------------  Experience Section -------------------*/

    Route::get('/experience/datatables', 'Admin\ExperienceController@datatables')->name('admin-experience-datatables');
    Route::get('/experience', 'Admin\ExperienceController@index')->name('admin-experience-index');
    Route::get('/experience/create', 'Admin\ExperienceController@create')->name('admin-experience-create');
    Route::post('/experience/create', 'Admin\ExperienceController@store')->name('admin-experience-store');
    Route::get('/experience/edit/{id}', 'Admin\ExperienceController@edit')->name('admin-experience-edit');
    Route::post('/experience/edit/{id}', 'Admin\ExperienceController@update')->name('admin-experience-update');
    Route::get('/experience/delete/{id}', 'Admin\ExperienceController@destroy')->name('admin-experience-delete');

    /*-------------------  Experience Section Ends -------------------*/


    //------------ ADMIN USER SECTION ------------

    Route::get('/users/datatables', 'Admin\UserController@datatables')->name('admin-user-datatables'); //JSON REQUEST
    Route::get('/users', 'Admin\UserController@index')->name('admin-user-index');
    Route::get('/users/create', 'Admin\UserController@create')->name('admin-user-create');
    Route::post('/users/store', 'Admin\UserController@store')->name('admin-user-store');
    Route::get('/users/edit/{id}', 'Admin\UserController@edit')->name('admin-user-edit');
    Route::post('/users/edit/{id}', 'Admin\UserController@update')->name('admin-user-update');
    Route::get('/users/delete/{id}', 'Admin\UserController@destroy')->name('admin-user-delete');
    Route::get('/user/{id}/show', 'Admin\UserController@show')->name('admin-user-show');
    Route::get('/users/ban/{id1}/{id2}', 'Admin\UserController@ban')->name('admin-user-ban');

    Route::get('/users/withdraws/datatables', 'Admin\UserController@withdrawdatatables')->name('admin-withdraw-datatables'); //JSON REQUEST
    Route::get('/users/withdraws', 'Admin\UserController@withdraws')->name('admin-withdraw-index');
    Route::get('/user//withdraw/{id}/show', 'Admin\UserController@withdrawdetails')->name('admin-withdraw-show');
    Route::get('/users/withdraws/accept/{id}', 'Admin\UserController@accept')->name('admin-withdraw-accept');
    Route::get('/user//withdraws/reject/{id}', 'Admin\UserController@reject')->name('admin-withdraw-reject');
    // WITHDRAW SECTION ENDS

    //------------ ADMIN USER SECTION ENDS ------------


    //------------ ADMIN GENERAL SETTINGS SECTION ------------

    Route::get('/general-settings/logo', 'Admin\GeneralSettingController@logo')->name('admin-gs-logo');
    Route::get('/general-settings/fb/clear', 'Admin\GeneralSettingController@fb_clear')->name('admin-gs-fb-clear');
    Route::get('/general-settings/favicon', 'Admin\GeneralSettingController@fav')->name('admin-gs-fav');
    Route::get('/general-settings/loader', 'Admin\GeneralSettingController@load')->name('admin-gs-load');
    Route::get('/general-settings/service', 'Admin\GeneralSettingController@service')->name('admin-gs-service');
    Route::get('/general-settings/contents', 'Admin\GeneralSettingController@contents')->name('admin-gs-contents');
    Route::get('/general-settings/success', 'Admin\GeneralSettingController@success')->name('admin-gs-success');
    Route::get('/general-settings/footer', 'Admin\GeneralSettingController@footer')->name('admin-gs-footer');
    Route::get('/general-settings/error', 'Admin\GeneralSettingController@error')->name('admin-gs-error');
    Route::get('/general-settings/breadcumb', 'Admin\GeneralSettingController@breadcumb')->name('admin-gs-breadcumb');
    Route::get('/general-settings/set-currency', 'Admin\GeneralSettingController@currency')->name('admin-gs-currency');
    Route::get('/general-settings/maintenance', 'Admin\GeneralSettingController@maintain')->name('admin-gs-maintenance');

    Route::group(['middleware' => 'admininistrator'], function () {

        //------------ ADMIN GENERAL SETTINGS JSON SECTION ------------

        // General Setting Section

        Route::get('/general-settings/disqus/{status}', 'Admin\GeneralSettingController@isdisqus')->name('admin-gs-isdisqus');
        Route::get('/general-settings/admin/loader/{status}', 'Admin\GeneralSettingController@isadminloader')->name('admin-gs-is-admin-loader');
        Route::get('/general-settings/loader/{status}', 'Admin\GeneralSettingController@isloader')->name('admin-gs-isloader');
        Route::get('/general-settings/talkto/{status}', 'Admin\GeneralSettingController@talkto')->name('admin-gs-talkto');
        Route::get('/general-settings/maintain/{status}', 'Admin\GeneralSettingController@ismaintain')->name('admin-gs-maintain');
        // Payment Setting Section

        Route::get('/general-settings/guest/{status}', 'Admin\GeneralSettingController@guest')->name('admin-gs-guest');
        Route::get('/general-settings/paypal/{status}', 'Admin\GeneralSettingController@paypal')->name('admin-gs-paypal');
        Route::get('/general-settings/stripe/{status}', 'Admin\GeneralSettingController@stripe')->name('admin-gs-stripe');
        Route::get('/general-settings/coinbase/{status}', 'Admin\GeneralSettingController@coinbase')->name('admin-gs-coinbase');
        Route::get('/general-settings/cod/{status}', 'Admin\GeneralSettingController@cod')->name('admin-gs-cod');

        //  Comment Section

        Route::get('/general-settings/comment/{status}', 'Admin\GeneralSettingController@comment')->name('admin-gs-iscomment');


        //  Language Section

        Route::get('/general-settings/language/{status}', 'Admin\GeneralSettingController@language')->name('admin-gs-islanguage');

        //  Currency Section

        Route::get('/general-settings/currency/{status}', 'Admin\GeneralSettingController@currency')->name('admin-gs-iscurrency');

        //  Affilte Section

        Route::get('/general-settings/affilate/{status}', 'Admin\GeneralSettingController@isaffilate')->name('admin-gs-isaffilate');

        //------------ ADMIN GENERAL SETTINGS JSON SECTION ENDS------------

        Route::post('/general-settings/update/all', 'Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');
        Route::post('/general-settings/update/menu/all', 'Admin\GeneralSettingController@menuupdate')->name('admin-gs-menuupdate');
        //------------ ADMIN GENERAL SETTINGS SECTION ENDS ------------

        Route::get('/facebook-auth', 'Admin\GraphController@getLoginURL')->name('facebook.auth');
        Route::post('/facebook-pageid', 'Admin\GraphController@pageId')->name('facebook.pageid');
    });

    //------------ ADMIN FAQ SECTION ------------

    Route::get('/faq/datatables', 'Admin\FaqController@datatables')->name('admin-faq-datatables'); //JSON REQUEST
    Route::get('/faq', 'Admin\FaqController@index')->name('admin-faq-index');
    Route::get('/faq/create', 'Admin\FaqController@create')->name('admin-faq-create');
    Route::post('/faq/create', 'Admin\FaqController@store')->name('admin-faq-store');
    Route::get('/faq/edit/{id}', 'Admin\FaqController@edit')->name('admin-faq-edit');
    Route::post('/faq/update/{id}', 'Admin\FaqController@update')->name('admin-faq-update');
    Route::get('/faq/delete/{id}', 'Admin\FaqController@destroy')->name('admin-faq-delete');

    //------------ ADMIN FAQ SECTION ENDS ------------


    //------------ ADMIN FEATURE SECTION ------------

    Route::get('/feature/datatables', 'Admin\FeatureController@datatables')->name('admin-feature-datatables'); //JSON REQUEST
    Route::get('/feature', 'Admin\FeatureController@index')->name('admin-feature-index');
    Route::get('/feature/create', 'Admin\FeatureController@create')->name('admin-feature-create');
    Route::post('/feature/create', 'Admin\FeatureController@store')->name('admin-feature-store');
    Route::get('/feature/edit/{id}', 'Admin\FeatureController@edit')->name('admin-feature-edit');
    Route::post('/feature/update/{id}', 'Admin\FeatureController@update')->name('admin-feature-update');
    Route::get('/feature/delete/{id}', 'Admin\FeatureController@destroy')->name('admin-feature-delete');

    //------------ ADMIN FEATURE SECTION ENDS ------------


    //------------ ADMIN PAGE SETTINGS SECTION ------------
    // Page Setting Section

    Route::get('/general-settings/contact/{status}', 'Admin\GeneralSettingController@iscontact')->name('admin-gs-iscontact');
    Route::get('/general-settings/faq/{status}', 'Admin\GeneralSettingController@isfaq')->name('admin-gs-isfaq');

    Route::get('/page-settings/contact', 'Admin\PageSettingController@contact')->name('admin-ps-contact');
    Route::match(['get', 'post'], '/page-settings/about', 'Admin\PageSettingController@about')->name('admin-ps-about');
    Route::get('/page-settings/customize', 'Admin\PageSettingController@customize')->name('admin-ps-customize');
    Route::get('/page-settings/menu/customize', 'Admin\GeneralSettingController@customize')->name('admin-ps-menu-customize');
    Route::get('/page-settings/experience', 'Admin\PageSettingController@video')->name('admin-ps-video');
    Route::get('/page-settings/home.contact', 'Admin\PageSettingController@homecontact')->name('admin-ps-homecontact');
    Route::get('/page-settings/present', 'Admin\PageSettingController@present')->name('admin-ps-present');
    Route::get('/page-settings/blog', 'Admin\PageSettingController@blog')->name('admin-ps-blog');
    Route::post('/page-settings/update/all', 'Admin\PageSettingController@update')->name('admin-ps-update');
    Route::post('/page-settings/update/home', 'Admin\PageSettingController@homeupdate')->name('admin-ps-homeupdate');
    //------------ ADMIN PAGE SETTINGS SECTION ENDS ------------

    //------------ ADMIN PAGE SECTION ------------

    Route::get('/page/datatables', 'Admin\PageController@datatables')->name('admin-page-datatables'); //JSON REQUEST
    Route::get('/page', 'Admin\PageController@index')->name('admin-page-index');
    Route::get('/page/create', 'Admin\PageController@create')->name('admin-page-create');
    Route::post('/page/create', 'Admin\PageController@store')->name('admin-page-store');
    Route::get('/page/edit/{id}', 'Admin\PageController@edit')->name('admin-page-edit');
    Route::post('/page/update/{id}', 'Admin\PageController@update')->name('admin-page-update');
    Route::get('/page/delete/{id}', 'Admin\PageController@destroy')->name('admin-page-delete');
    Route::get('/page/header/{id1}/{id2}', 'Admin\PageController@header')->name('admin-page-header');
    Route::get('/page/footer/{id1}/{id2}', 'Admin\PageController@footer')->name('admin-page-footer');
    Route::get('/page/status/{id1}/{id2}', 'Admin\PageController@status')->name('admin-page-status');
    //------------ ADMIN PAGE SECTION ENDS------------

    Route::group(['middleware' => 'admininistrator'], function () {

        //------------ ADMIN EMAIL SETTINGS SECTION ------------
        Route::get('/email-templates/datatables', 'Admin\EmailController@datatables')->name('admin-mail-datatables');
        Route::get('/email-templates', 'Admin\EmailController@index')->name('admin-mail-index');
        Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin-mail-edit');
        Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin-mail-update');
        Route::get('/email-config', 'Admin\EmailController@config')->name('admin-mail-config');
        Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin-group-show');
        Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin-group-submit');
        Route::get('/issmtp/{status}', 'Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');
        //------------ ADMIN EMAIL SETTINGS SECTION ENDS ------------

        //------------ ADMIN PAYMENT SETTINGS SECTION ------------

        // Payment Informations

        Route::get('/payment-informations', 'Admin\GeneralSettingController@paymentsinfo')->name('admin-gs-payments');


        // Currency Settings

        Route::get('/currency/datatables', 'Admin\CurrencyController@datatables')->name('admin-currency-datatables'); //JSON REQUEST
        Route::get('/currency', 'Admin\CurrencyController@index')->name('admin-currency-index');
        Route::get('/currency/create', 'Admin\CurrencyController@create')->name('admin-currency-create');
        Route::post('/currency/create', 'Admin\CurrencyController@store')->name('admin-currency-store');
        Route::get('/currency/edit/{id}', 'Admin\CurrencyController@edit')->name('admin-currency-edit');
        Route::post('/currency/update/{id}', 'Admin\CurrencyController@update')->name('admin-currency-update');
        Route::get('/currency/delete/{id}', 'Admin\CurrencyController@destroy')->name('admin-currency-delete');
        Route::get('/currency/status/{id1}/{id2}', 'Admin\CurrencyController@status')->name('admin-currency-status');

        //------------ ADMIN PAYMENT SETTINGS SECTION ENDS------------

        //------------ ADMIN SOCIAL SETTINGS SECTION ------------

        Route::get('/social', 'Admin\SocialSettingController@index')->name('admin-social-index');
        Route::post('/social/update', 'Admin\SocialSettingController@socialupdate')->name('admin-social-update');
        Route::post('/social/update/all', 'Admin\SocialSettingController@socialupdateall')->name('admin-social-update-all');


        //------------ ADMIN SOCIAL SETTINGS SECTION ENDS------------

        //------------ ADMIN LANGUAGE SETTINGS SECTION ------------

        Route::get('/languages/datatables', 'Admin\LanguageController@datatables')->name('admin-lang-datatables'); //JSON REQUEST
        Route::get('/languages', 'Admin\LanguageController@index')->name('admin-lang-index');
        Route::get('/languages/create', 'Admin\LanguageController@create')->name('admin-lang-create');
        Route::get('/languages/edit/{id}', 'Admin\LanguageController@edit')->name('admin-lang-edit');
        Route::post('/languages/create', 'Admin\LanguageController@store')->name('admin-lang-store');
        Route::post('/languages/edit/{id}', 'Admin\LanguageController@update')->name('admin-lang-update');
        Route::get('/languages/status/{id1}/{id2}', 'Admin\LanguageController@status')->name('admin-lang-st');
        Route::get('/languages/delete/{id}', 'Admin\LanguageController@destroy')->name('admin-lang-delete');

        //------------ ADMIN LANGUAGE SETTINGS SECTION ENDS ------------


        //------------ ADMIN PANEL LANGUAGE SETTINGS SECTION ------------

        Route::get('/adminlanguages/datatables', 'Admin\AdminLanguageController@datatables')->name('admin-tlang-datatables'); //JSON REQUEST
        Route::get('/adminlanguages', 'Admin\AdminLanguageController@index')->name('admin-tlang-index');
        Route::get('/adminlanguages/create', 'Admin\AdminLanguageController@create')->name('admin-tlang-create');
        Route::get('/adminlanguages/edit/{id}', 'Admin\AdminLanguageController@edit')->name('admin-tlang-edit');
        Route::post('/adminlanguages/create', 'Admin\AdminLanguageController@store')->name('admin-tlang-store');
        Route::post('/adminlanguages/edit/{id}', 'Admin\AdminLanguageController@update')->name('admin-tlang-update');
        Route::get('/adminlanguages/status/{id1}/{id2}', 'Admin\AdminLanguageController@status')->name('admin-tlang-st');
        Route::get('/adminlanguages/delete/{id}', 'Admin\AdminLanguageController@destroy')->name('admin-tlang-delete');

        //------------ ADMIN PANEL LANGUAGE SETTINGS SECTION ENDS ------------


        //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

        Route::get('/seotools/analytics', 'Admin\SeoToolController@analytics')->name('admin-seotool-analytics');
        Route::post('/seotools/analytics/update', 'Admin\SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
        Route::get('/seotools/keywords', 'Admin\SeoToolController@keywords')->name('admin-seotool-keywords');
        Route::post('/seotools/keywords/update', 'Admin\SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');
        Route::get('/products/popular/{id}', 'Admin\SeoToolController@popular')->name('admin-prod-popular');
        //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

        //------------ STAFF SECTION ------------
        Route::get('/staff/datatables', 'Admin\StaffController@datatables')->name('admin-staff-datatables');
        Route::get('/staff', 'Admin\StaffController@index')->name('admin-staff-index');
        Route::get('/staff/create', 'Admin\StaffController@create')->name('admin-staff-create');
        Route::post('/staff/create', 'Admin\StaffController@store')->name('admin-staff-store');
        Route::get('/staff/edit/{id}', 'Admin\StaffController@show')->name('admin-staff-show');
        Route::get('/staff/delete/{id}', 'Admin\StaffController@destroy')->name('admin-staff-delete');

        //------------ STAFF SECTION ENDS------------


    });
    //------------ ADMIN SUBSCRIBERS SECTION ------------

    Route::get('/subscribers/datatables', 'Admin\SubscriberController@datatables')->name('admin-subs-datatables'); //JSON REQUEST
    Route::get('/subscribers', 'Admin\SubscriberController@index')->name('admin-subs-index');
    Route::get('/subscribers/download', 'Admin\SubscriberController@download')->name('admin-subs-download');

    //------------ ADMIN SUBSCRIBERS ENDS ------------

});


Route::get('admin/check/movescript', 'Admin\DashboardController@movescript')->name('admin-move-script');
Route::get('admin/generate/backup', 'Admin\DashboardController@generate_bkup')->name('admin-generate-backup');
Route::get('admin/activation', 'Admin\DashboardController@activation')->name('admin-activation-form');
Route::post('admin/activation', 'Admin\DashboardController@activation_submit')->name('admin-activate-purchase');
Route::get('admin/clear/backup', 'Admin\DashboardController@clear_bkup')->name('admin-clear-backup');

Route::post('the/genius/ocean/2441139', 'Front\FrontendController@subscription');
Route::get('finalize', 'Front\FrontendController@finalize');

// ************************************ ADMIN SECTION ENDS**********************************************

Route::get('/under-maintenance', 'Front\FrontendController@maintenance')->name('front-maintenance');


Route::group(['middleware' => 'maintenance'], function () {

    Route::prefix('user')->group(function () {

        // User Dashboard
        Route::get('/dashboard', 'User\DashboardController@index')->name('user.dashboard');
        Route::get('/transactions', 'User\UserController@trans')->name('user-trans');

        // User Login
        Route::get('/login', 'User\LoginController@showLoginForm')->name('user.login');
        Route::post('/login', 'User\LoginController@loginSync')->name('user.login.submit');
        Route::post('/login/submit', 'User\LoginController@login')->name('user-login-submit');
        // User Login End

        // User Register
        Route::get('/register', 'User\RegisterController@showRegisterForm')->name('user.register');
        Route::post('/register', 'User\RegisterController@registerSync')->name('user.register.submit');
        // Route::post('/register', 'User\RegisterController@register')->name('user-register-submit');
        Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
        // User Register End

        //User Profile Section
        Route::get('/myprofile', 'User\DashboardController@myprofile')->name('user.myprofile');
        Route::post('/my_profile/update', 'User\DashboardController@userProfileUpdate')->name('user.my_profile.update');
        Route::get('/password', 'User\DashboardController@passwordreset')->name('user.password');
        Route::post('/password/update', 'User\DashboardController@changepass')->name('user.password.update');
        //End User Profile Section

        // User Logout
        Route::get('/logout', 'User\DashboardController@logout')->name('user.logout');
        // User Logout Ends

        // User Reset
        Route::get('/reset', 'User\UserController@resetform')->name('user-reset');
        Route::post('/reset', 'User\UserController@reset')->name('user-reset-submit');
        // User Reset End

        // User Profile
        Route::get('/profile', 'User\UserController@profile')->name('user-profile');
        Route::post('/profile', 'User\UserController@profileUpdate')->name('user-profile-update');
        // User Profile Ends


        //------------ USER AUCTION SECTION ------------
        Route::get('/auction/datatables', 'User\AuctionController@datatables')->name('user-auction-datatables');
        Route::get('/auction/pending/datatables', 'User\AuctionController@pendingtables')->name('user-auction-pending-datatables');
        Route::get('/auction', 'User\AuctionController@index')->name('user-auction-index');
        Route::get('/auction/create', 'User\AuctionController@create')->name('user-auction-create');
        Route::post('/auction/store', 'User\AuctionController@store')->name('user-auction-store');
        Route::get('/auction/edit/{id}', 'User\AuctionController@edit')->name('user-auction-edit');
        Route::post('/auction/edit/{id}', 'User\AuctionController@update')->name('user-auction-update');
        Route::get('/auction/delete/{id}', 'User\AuctionController@destroy')->name('user-auction-delete');
        Route::get('/auction/status/{id1}/{id2}', 'User\AuctionController@status')->name('user-auction-status');
        Route::get('/auction/show/{id}', 'User\AuctionController@show')->name('user-auction-show');
        Route::get('/auction/make/winner/{id}', 'User\AuctionController@winner')->name('user-auction-winner');
        Route::get('/auction/remove/winner/{id}', 'User\AuctionController@remove')->name('user-auction-remove-winner');
        Route::get('pending/auction', 'User\AuctionController@pending')->name('user-auction-pending');
        //------------ USER AUCTION SECTION ------------

        //------------ ADMIN AUCTION SECTION ENDS ------------

        //------------ USER AUCTION SECTION ------------
        //------------ USER GALLERY SECTION ------------

        Route::get('/gallery/show', 'User\GalleryController@show')->name('user-gallery-show');
        Route::post('/gallery/store', 'User\GalleryController@store')->name('user-gallery-store');
        Route::get('/gallery/delete', 'User\GalleryController@destroy')->name('user-gallery-delete');

        //------------ USER GALLERY SECTION ENDS------------
        Route::get('/auction/title/create', 'User\AuctionController@title_description')->name('user-auction-title-description');

        Route::put('/auction/title/update/{id}', 'User\AuctionController@title_description_update')->name('user-auction-title_description-update');

        // User Forgot
        Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user-forgot');
        Route::post('/forgot', 'User\ForgotController@forgot')->name('user-forgot-submit');
        // User Forgot Ends

        // Witdraw Section
        Route::get('/withdraw', 'User\WithdrawController@index')->name('user-wwt-index');
        Route::get('/withdraw/create', 'User\WithdrawController@create')->name('user-wwt-create');
        Route::post('/withdraw/create', 'User\WithdrawController@store')->name('user-wwt-store');
        // Witdraw Section Ends


        // Bid Section
        Route::get('/bids', 'User\BidController@index')->name('user-bid-index');
        Route::get('/bid/show/{id}', 'User\BidController@show')->name('user-bid-show');
        Route::get('/bid/pay/{id}', 'User\BidController@payment')->name('user-bid-pay');
        Route::post('/bid/payment/stripe', 'User\BidController@paystore')->name('user-bid-stripe');
        // Bid Section Ends

        // User Payment Section
        Route::get('/payment/return', 'User\PaymentController@payreturn')->name('payment.return');
        Route::get('/payment/cancle', 'User\PaymentController@paycancle')->name('payment.cancle');

        Route::post('/paypal-submit', 'User\PaymentController@store')->name('paypal.submit');
        Route::post('/stripe-submit', 'User\StripeController@store')->name('stripe.submit');
        Route::post('/coinbase-submit', 'User\CoinbaseController@store')->name('coinbase.submit');

        // User Payment Section Ends


        // User Auction Payment Section
        Route::get('/auctions/payment/{id}', 'User\AuctionPaypalController@payment')->name('auction.payment');
        Route::get('/auctions/payments/success', 'User\AuctionPaypalController@payreturn')->name('auction.payment.return');
        Route::get('/auctions/payments/cancle', 'User\AuctionPaypalController@paycancle')->name('auction.payment.cancle');
        Route::post('/auctions/paypal-submit', 'User\AuctionPaypalController@store')->name('auction.paypal.submit');
        Route::post('/auctions/stripe-submit', 'User\AuctionStripeController@store')->name('auction.stripe.submit');
        Route::post('/auctions/coinbase-submit', 'User\AuctionCoinbaseController@store')->name('auction.coinbase.submit');
        // User Auction Payment Section Ends



        // User Orders Ends


        Route::get('/affilate/code', 'User\UserController@affilate_code')->name('user-affilate-code');

        // User Notification
        Route::get('/user/notf/show/{id}', 'User\NotificationController@notf_show')->name('user-notf-show');
        Route::get('/user/notf/count/{id}', 'User\NotificationController@notf_count')->name('user-notf-count');
        Route::get('/user/notf/clear/{id}', 'User\NotificationController@notf_clear')->name('user-notf-clear');
        // User Notification Ends


        //Bid create

        Route::post('/bid/store', 'User\BidController@store')->name('bid.store');
        Route::post('/bid/store-async', 'User\BidController@storeAsync')->name('bid.store.async');
        Route::post('/bid/pay', 'User\BidController@pay')->name('bid.pay');

        Route::get('/withdraw/datatables', 'User\WithdrawController@datatables')->name('user-wt-datatables');
        Route::get('/withdraw', 'User\WithdrawController@index')->name('user-wt-index');
        Route::get('/withdraw/create', 'User\WithdrawController@create')->name('user-wt-create');
        Route::post('/withdraw/create', 'User\WithdrawController@store')->name('user-wt-store');

        //------------ ADMIN ORDER SECTION ------------
        Route::get('/orders/datatables/{slug}', 'User\OrderController@datatables')->name('user-order-datatables'); //JSON REQUEST
        Route::get('/orders', 'User\OrderController@index')->name('user-order-index');
        Route::get('/order/{id}/show', 'User\OrderController@show')->name('user-order-show');
        Route::get('/order/{id}/print', 'User\OrderController@print')->name('user-order-print');
    });


    Route::prefix('seller')->group(function () {

        // User Dashboard
        Route::get('/dashboard', 'Seller\DashboardController@index')->name('seller.dashboard');
        Route::get('/transactions', 'Seller\UserController@trans')->name('seller-trans');

        // User Login
        Route::get('/login', 'Seller\LoginController@showLoginForm')->name('seller.login');
        Route::post('/login', 'Seller\LoginController@loginSync')->name('seller.login.submit');
        Route::post('/login/submit', 'Seller\LoginController@login')->name('seller-login-submit');
        // User Login End

        // User Register
        Route::get('/register', 'Seller\RegisterController@showRegisterForm')->name('seller.register');
        Route::post('/register', 'Seller\RegisterController@registerSync')->name('seller.register.submit');
        Route::get('/register/verify/{token}', 'Seller\RegisterController@token')->name('seller-register-token');
        // User Register End

        //User Profile Section
        Route::get('/myprofile', 'Seller\DashboardController@myprofile')->name('seller.seller_profile');
        Route::post('/my_profile/update', 'Seller\DashboardController@userProfileUpdate')->name('seller.my_profile.update');
        Route::get('/password', 'Seller\DashboardController@passwordreset')->name('seller.password');
        Route::post('/password/update', 'Seller\DashboardController@changepass')->name('seller.password.update');
        //End User Profile Section

        // User Logout
        Route::get('/logout', 'Seller\DashboardController@logout')->name('seller.logout');
        // User Logout Ends

        // User Reset
        Route::get('/reset', 'Seller\UserController@resetform')->name('seller-reset');
        Route::post('/reset', 'Seller\UserController@reset')->name('seller-reset-submit');
        // User Reset End

        // User Profile
        Route::get('/profile', 'Seller\UserController@profile')->name('seller-profile');
        Route::post('/profile', 'Seller\UserController@profileUpdate')->name('seller-profile-update');
        // User Profile Ends


        //------------ USER AUCTION SECTION ------------
        Route::get('/auction/datatables', 'Seller\AuctionController@datatables')->name('seller-auction-datatables');
        Route::get('/auction/pending/datatables', 'Seller\AuctionController@pendingtables')->name('seller-auction-pending-datatables');
        Route::get('/auction', 'Seller\AuctionController@index')->name('seller-auction-index');
        Route::get('/auction/create', 'Seller\AuctionController@create')->name('seller-auction-create');
        Route::post('/auction/store', 'Seller\AuctionController@store')->name('seller-auction-store');
        Route::get('/auction/edit/{id}', 'Seller\AuctionController@edit')->name('seller-auction-edit');
        Route::post('/auction/edit/{id}', 'Seller\AuctionController@update')->name('seller-auction-update');
        Route::get('/auction/delete/{id}', 'Seller\AuctionController@destroy')->name('seller-auction-delete');
        Route::get('/auction/status/{id1}/{id2}', 'Seller\AuctionController@status')->name('seller-auction-status');
        Route::get('/auction/show/{id}', 'Seller\AuctionController@show')->name('seller-auction-show');
        Route::get('/auction/make/winner/{id}', 'Seller\AuctionController@winner')->name('seller-auction-winner');
        Route::get('/auction/remove/winner/{id}', 'Seller\AuctionController@remove')->name('seller-auction-remove-winner');
        Route::get('pending/auction', 'Seller\AuctionController@pending')->name('seller-auction-pending');
        //------------ USER AUCTION SECTION ------------

        //------------ ADMIN AUCTION SECTION ENDS ------------

        //------------ USER AUCTION SECTION ------------
        //------------ USER GALLERY SECTION ------------

        Route::get('/gallery/show', 'Seller\GalleryController@show')->name('seller-gallery-show');
        Route::post('/gallery/store', 'Seller\GalleryController@store')->name('seller-gallery-store');
        Route::get('/gallery/delete', 'Seller\GalleryController@destroy')->name('seller-gallery-delete');

        //------------ USER GALLERY SECTION ENDS------------
        // Route::get('/auction/title/create', 'Seller\AuctionController@title_description')->name('seller-auction-title-description');

        // Route::put('/auction/title/update/{id}', 'Seller\AuctionController@title_description_update')->name('seller-auction-title_description-update');

        // User Forgot
        // Route::get('/forgot', 'Seller\ForgotController@showforgotform')->name('seller-forgot');
        // Route::post('/forgot', 'Seller\ForgotController@forgot')->name('seller-forgot-submit');
        // User Forgot Ends

        // Witdraw Section
        // Route::get('/withdraw', 'Seller\WithdrawController@index')->name('seller-wwt-index');
        // Route::get('/withdraw/create', 'Seller\WithdrawController@create')->name('seller-wwt-create');
        // Route::post('/withdraw/create', 'Seller\WithdrawController@store')->name('seller-wwt-store');
        // Witdraw Section Ends


        // Bid Section
        // Route::get('/bids', 'Seller\BidController@index')->name('seller-bid-index');
        // Route::get('/bid/show/{id}', 'Seller\BidController@show')->name('seller-bid-show');
        // Route::get('/bid/pay/{id}', 'Seller\BidController@payment')->name('seller-bid-pay');
        // Route::post('/bid/payment/stripe', 'Seller\BidController@paystore')->name('seller-bid-stripe');
        // Bid Section Ends

        // User Payment Section
        // Route::get('/payment/return', 'Seller\PaymentController@payreturn')->name('payment.return');
        // Route::get('/payment/cancle', 'Seller\PaymentController@paycancle')->name('payment.cancle');

        // Route::post('/paypal-submit', 'Seller\PaymentController@store')->name('paypal.submit');
        // Route::post('/stripe-submit', 'Seller\StripeController@store')->name('stripe.submit');
        // Route::post('/coinbase-submit', 'Seller\CoinbaseController@store')->name('coinbase.submit');

        // User Payment Section Ends


        // User Auction Payment Section
        // Route::get('/auctions/payment/{id}', 'Seller\AuctionPaypalController@payment')->name('auction.payment');
        // Route::get('/auctions/payments/success', 'Seller\AuctionPaypalController@payreturn')->name('auction.payment.return');
        // Route::get('/auctions/payments/cancle', 'Seller\AuctionPaypalController@paycancle')->name('auction.payment.cancle');
        // Route::post('/auctions/paypal-submit', 'Seller\AuctionPaypalController@store')->name('auction.paypal.submit');
        // Route::post('/auctions/stripe-submit', 'Seller\AuctionStripeController@store')->name('auction.stripe.submit');
        // Route::post('/auctions/coinbase-submit', 'Seller\AuctionCoinbaseController@store')->name('auction.coinbase.submit');
        // User Auction Payment Section Ends



        // User Orders Ends


        // Route::get('/affilate/code', 'Seller\UserController@affilate_code')->name('seller-affilate-code');

        // User Notification
        // Route::get('/seller/notf/show/{id}', 'Seller\NotificationController@notf_show')->name('seller-notf-show');
        // Route::get('/seller/notf/count/{id}', 'Seller\NotificationController@notf_count')->name('seller-notf-count');
        // Route::get('/seller/notf/clear/{id}', 'Seller\NotificationController@notf_clear')->name('seller-notf-clear');
        // User Notification Ends


        //Bid create

        // Route::post('/bid/store', 'Seller\BidController@store')->name('bid.store');
        // Route::post('/bid/store-async', 'Seller\BidController@storeAsync')->name('bid.store.async');
        // Route::post('/bid/pay', 'Seller\BidController@pay')->name('bid.pay');

        // Route::get('/withdraw/datatables', 'Seller\WithdrawController@datatables')->name('seller-wt-datatables');
        // Route::get('/withdraw', 'Seller\WithdrawController@index')->name('seller-wt-index');
        // Route::get('/withdraw/create', 'Seller\WithdrawController@create')->name('seller-wt-create');
        // Route::post('/withdraw/create', 'Seller\WithdrawController@store')->name('seller-wt-store');

        //------------ ADMIN ORDER SECTION ------------
        // Route::get('/orders/datatables/{slug}', 'Seller\OrderController@datatables')->name('seller-order-datatables'); //JSON REQUEST
        // Route::get('/orders', 'Seller\OrderController@index')->name('seller-order-index');
        // Route::get('/order/{id}/show', 'Seller\OrderController@show')->name('seller-order-show');
        // Route::get('/order/{id}/print', 'Seller\OrderController@print')->name('seller-order-print');
    });


    // User Admin Send Message

    Route::get('admin/messages', 'User\MessageController@adminmessages')->name('user-message-index');
    Route::get('admin/message/{id}', 'User\MessageController@adminmessage')->name('user-message-show');
    Route::post('admin/message/post', 'User\MessageController@adminpostmessage')->name('user-message-store');
    Route::get('admin/message/{id}/delete', 'User\MessageController@adminmessagedelete')->name('user-message-delete1');
    Route::post('admin/user/send/message', 'Admin\MessageController@usercontact')->name('user-send-message');
    Route::get('admin/message/load/{id}', 'User\MessageController@messageload')->name('user-message-load');
    // User Admin Send Message Ends

    // ************************************ USER SECTION ENDS**********************************************


    // ************************************ FRONT SECTION **********************************************

    Route::get('/', 'Front\FrontendController@index')->name('front.index');
    Route::get('/currency/{id}', 'Front\FrontendController@currency')->name('front.currency');
    Route::get('/language/{id}', 'Front\FrontendController@language')->name('front.language');

    // BLOG SECTION
    Route::get('/blog', 'Front\FrontendController@blog')->name('front.blog');
    Route::get('/blog/{id}', 'Front\FrontendController@blogshow')->name('front.blogshow');
    Route::get('/blog/category/{slug}', 'Front\FrontendController@blogcategory')->name('front.blogcategory');
    Route::get('/blog/tag/{slug}', 'Front\FrontendController@blogtags')->name('front.blogtags');
    Route::get('/blog-search', 'Front\FrontendController@blogsearch')->name('front.blogsearch');
    Route::get('/blog/archive/{slug}', 'Front\FrontendController@blogarchive')->name('front.blogarchive');
    // BLOG SECTION ENDS

    // FAQ SECTION
    Route::get('/faq', 'Front\FrontendController@faq')->name('front.faq');
    // FAQ SECTION ENDS

    // MERCHANT SECTION
    Route::get('/merchants', 'Front\FrontendController@merchants')->name('front.merchants');
    // MERCHANT SECTION ENDS

    

    // Details Page
    Route::get('/details/{slug}', 'Front\FrontendController@details')->name('front.details');
    Route::get('/single-details/{id}', 'Front\FrontendController@singleDetails')->name('front.single.details');
    Route::get('/auction-views-count/{id}', 'Front\FrontendController@viewsCount')->name('auction.views.count');
    Route::get('/auction-bids-count/{id}', 'Front\FrontendController@bidsCount')->name('auction.bids.count');
    Route::get('/auction/bidders/{id}', 'User\BidController@bidders')->name('auction.bidders');
    // Details Page

    // Details Page
    Route::get('/category/{slug}', 'Front\FrontendController@category')->name('front.category');
    Route::get('/featured', 'Front\FrontendController@featured')->name('front.featured');
    Route::get('/live', 'Front\FrontendController@live')->name('front.live');
    // Details Page

    // CONTACT SECTION
    Route::get('/contact', 'Front\FrontendController@contact')->name('front.contact');
    Route::post('/contact', 'Front\FrontendController@contactemail')->name('front.contact.submit');
    Route::get('/contact/refresh_code', 'Front\FrontendController@refresh_code');
    // CONTACT SECTION  ENDS

    // AUCTIONS PAGE
    Route::get('/auctions', 'Front\FrontendController@auctions')->name('front.auctions');
    // AUCTIONS PAGE

    // User Payment Section
    Route::get('/payment/return', 'Front\PaymentController@payreturn')->name('front.payment.return');
    Route::get('/payment/cancle', 'Front\PaymentController@paycancle')->name('front.payment.cancle');

    Route::post('/paypal-submit', 'Front\PaymentController@store')->name('front.paypal.submit');
    Route::post('/stripe-submit', 'Front\StripeController@store')->name('front.stripe.submit');

    Route::get('/facebook-post', 'Admin\GraphController@postAuto')->name('facebook.post');
    Route::get('/facebook-app', 'Admin\GraphController@longToken')->name('facebook.app');

    // User Payment Section Ends

    // SUBSCRIBE SECTION

    Route::post('/subscriber/store', 'Front\FrontendController@subscribe')->name('front.subscribe');

    // SUBSCRIBE SECTION ENDS

    // PROJECT SECTION
    Route::get('/project/{id}', 'Front\FrontendController@project')->name('front.project');
    // PROJECT SECTION ENDS

    //Auction By Category

    Route::get('/auctioncategory/{slug}', 'Front\FrontendController@auctionCategory')->name('front.auctioncategory');

    Route::post('/user/payment/notify', 'User\PaymentController@notify')->name('payment.notify');
    Route::post('/payment/notify', 'Front\PaymentController@notify')->name('user.payment.notify');
    Route::post('user/auction/payment/notify', 'User\AuctionPaypalController@notify')->name('auction.payment.notify');
    //  CRONJOB

    Route::get('/auctions/validity/check', 'Front\FrontendController@auctioncheck');

    // CRONJOB ENDS

    // PAGE SECTION
    Route::get('/about', 'Front\FrontendController@about')->name('front.about');
    Route::get('/{slug}', 'Front\FrontendController@page')->name('front.page');
    // PAGE SECTION ENDS



    // ************************************ FRONT SECTION ENDS**********************************************

});


/*------------------------------BEGIN WEBHOOKS------------------------------*/
Route::middleware([])->prefix('events')->group(function () {
    Route::any('/coinbase', 'CoinbaseEventsHandler@listen')->name('events.coinbase');
    // Route::get('/test', function () {
    //     (new AppMailer())->send([
    //         'email_type'     => 'payment_failed',
    //         'recipient'      => 'hello@nixx.dev',
    //         'recipient_name' => 'NIXX',
    //         'body'           => ''
    //     ]);
    // });
});
/*------------------------------END WEBHOOKS------------------------------*/