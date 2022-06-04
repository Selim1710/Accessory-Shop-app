<?php

use App\Http\Controllers\Backend\AccessoryController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashBoardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ManageOrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;





// Website Part
Route::get('/', [HomeController::class, 'home'])->name('website.home');

Route::group(['prefix' => 'website'], function () {

    // search
    Route::post('/user/search/product', [HomeController::class, 'search'])->name('website.search');

    // categories
    Route::get('/show/category/product/{id}', [HomeController::class, 'categoryProduct'])->name('show.category.product');

    // product
    Route::get('/view/all/product', [HomeController::class, 'allProduct'])->name('website.all.product');
    Route::get('/product/details/{id}', [HomeController::class, 'productDetails'])->name('website.product.details');
    Route::get('/product/related/accessory/{id}', [HomeController::class, 'productAccessory'])->name('website.product.accessory');

    // accessory
    Route::get('/view/all/accessories', [HomeController::class, 'allAccessory'])->name('website.all.accessory');
    Route::get('/accessory/details/{id}', [HomeController::class, 'accessoryDetails'])->name('website.accessory.details');

    // login
    Route::get('/login/form', [UserController::class, 'loginForm'])->name('users.login.form');
    Route::post('/user/do/login', [UserController::class, 'doLogin'])->name('user.do.login');
    Route::get('/check/banned', [UserController::class, 'checkBanned'])->name('website.check.banned');

    Route::get('/registration/form', [UserController::class, 'registrationForm'])->name('user.registration.form');
    Route::post('/user/do/registration', [UserController::class, 'doRegistration'])->name('user.do.registration');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

    // download pdf
    Route::get('/user/download/pdf/{id}', [UserController::class, 'downloadPDF'])->name('user.download.pdf');

    Route::group(['middleware' => 'check_customer'], function () {

        // user profile
        Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
        Route::get('/user/edit/profile/{id}', [UserController::class, 'edit'])->name('user.edit.profile');
        Route::post('/user/update/profile/{id}', [UserController::class, 'updateProfile'])->name('user.update.profile');

        // add to cart
        Route::get('/add/to/cart/{id}', [CartController::class, 'cart'])->name('add.to.cart');
        Route::get('/clear/cart', [CartController::class, 'clearCart'])->name('clear.cart');
        Route::get('/user/remove/cart/{id}', [CartController::class, 'remove'])->name('user.remove.cart');
        Route::get('/user/checkout', [CartController::class, 'checkout'])->name('user.checkout');
        // order form
        Route::get('/order/form/{id}', [CartController::class, 'orderForm'])->name('website.order.form');
    });

    // footer
    Route::get('/user/refund/policy', [HomeController::class, 'refundPolicy'])->name('user.refund.policy');
    Route::get('/user/terms/and/conditions', [HomeController::class, 'termsConditions'])->name('user.terms.&.conditions');
});



// Admin Part
Route::group(['prefix' => 'admin'], function () {

    // admin login
    Route::get('/login', [AdminLoginController::class, 'form'])->name('admin.login.form');
    Route::post('/do/login', [AdminLoginController::class, 'doLogin'])->name('admin.do.login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth', 'check_admin']], function () {

        // dashboard
        Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('admin.dashboard');

        // Category
        Route::get('/manage/category', [CategoryController::class, 'manageCategory'])->name('admin.manage.category');
        Route::get('/add/category', [CategoryController::class, 'addCategory'])->name('admin.add.category');
        Route::post('/store/category', [CategoryController::class, 'store'])->name('admin.store.category');
        Route::get('/edit/category/{id}', [CategoryController::class, 'editCategory'])->name('admin.edit.category');
        Route::post('/update/category/{id}', [CategoryController::class, 'update'])->name('admin.update.category');
        Route::get('/delete/category/{id}', [CategoryController::class, 'delete'])->name('admin.delete.category');
        Route::get('/view/category/image/{id}', [CategoryController::class, 'view'])->name('admin.view.category');
        Route::post('/change/category/image/{id}', [CategoryController::class, 'change'])->name('admin.change.category.image');

        // Brand
        Route::get('/manage/Brand', [BrandController::class, 'manageBrand'])->name('admin.manage.brand');
        Route::get('/add/Brand', [BrandController::class, 'addBrand'])->name('admin.add.brand');
        Route::post('/store/Brand', [BrandController::class, 'store'])->name('admin.store.brand');
        Route::get('/edit/Brand/{id}', [BrandController::class, 'edit'])->name('admin.edit.brand');
        Route::post('/update/Brand/{id}', [BrandController::class, 'update'])->name('admin.update.brand');
        Route::get('/delete/Brand/{id}', [BrandController::class, 'delete'])->name('admin.delete.brand');

        // Product
        Route::get('/manage/product', [ProductController::class, 'manageProduct'])->name('admin.manage.product');
        Route::get('/add/product', [ProductController::class, 'add'])->name('admin.add.product');
        Route::post('/store/product', [ProductController::class, 'store'])->name('admin.store.product');
        Route::get('/edit/product/{id}', [ProductController::class, 'edit'])->name('admin.edit.product');
        Route::post('/update/product/{id}', [ProductController::class, 'update'])->name('admin.update.product');
        Route::get('/delete/product/{id}', [ProductController::class, 'delete'])->name('admin.delete.product');
        Route::get('/view/product/image/{id}', [ProductController::class, 'view'])->name('admin.view.product');
        Route::post('/change/product/image/{id}', [ProductController::class, 'change'])->name('admin.change.product.image');

        // Stock
        Route::get('/manage/stock', [StockController::class, 'manageStock'])->name('admin.manage.stock');
        Route::get('/add/stock', [StockController::class, 'add'])->name('admin.add.stock');
        Route::post('/store/stock', [StockController::class, 'store'])->name('admin.store.stock');
        Route::get('/edit/stock/{id}', [StockController::class, 'edit'])->name('admin.edit.stock');
        Route::post('/update/stock/{id}', [StockController::class, 'update'])->name('admin.update.stock');
        Route::get('/delete/stock/{id}', [StockController::class, 'delete'])->name('admin.delete.stock');

        // accessory
        Route::get('/manage/accessory', [AccessoryController::class, 'manageAccessory'])->name('admin.manage.accessory');
        Route::get('/add/accessory', [AccessoryController::class, 'add'])->name('admin.add.accessory');
        Route::post('/store/accessory', [AccessoryController::class, 'store'])->name('admin.store.accessory');
        Route::get('/edit/accessory/{id}', [AccessoryController::class, 'edit'])->name('admin.edit.accessory');
        Route::post('/update/accessory/{id}', [AccessoryController::class, 'update'])->name('admin.update.accessory');
        Route::get('/delete/accessory/{id}', [AccessoryController::class, 'delete'])->name('admin.delete.accessory');
        Route::get('/view/accessory/image/{id}', [AccessoryController::class, 'view'])->name('admin.view.accessory');
        Route::post('/change/accessory/image/{id}', [AccessoryController::class, 'change'])->name('admin.change.accessory.image');

        // Order List
        Route::get('/manage/order', [ManageOrderController::class, 'manageOrder'])->name('admin.manage.order');
        Route::get('/accept/order/{id}', [ManageOrderController::class, 'acceptOrder'])->name('admin.accept.order');
        Route::get('/reject/order/{id}', [ManageOrderController::class, 'rejectOrder'])->name('admin.reject.order');

        // Customer List
        Route::get('/manage/customer', [CustomerController::class, 'manageCustomer'])->name('admin.manage.customer');
        Route::get('/ban/customer/{id}', [CustomerController::class, 'banCustomer'])->name('admin.ban.customer');
        Route::get('/un-ban/customer/{id}', [CustomerController::class, 'unBanCustomer'])->name('admin.un.ban.customer');

        // Company Report
        Route::get('/view/report', [ReportController::class, 'viewReport'])->name('admin.view.report');
        Route::post('/search/report', [ReportController::class, 'searchReport'])->name('admin.search.report');
    });
});

// SSLCOMMERZ Start
Route::get('/user/payment/info/{id}', [SslCommerzPaymentController::class, 'paymentInfo'])->name('user.process.to.pay');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
 //SSLCOMMERZ END