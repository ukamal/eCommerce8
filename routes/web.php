<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CustomerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FrontendController::class, 'index'])->name('home');
Route::get('/about-us',[FrontendController::class, 'aboutUs'])->name('about-us');

Route::get('/contact-us',[FrontendController::class, 'contactUs'])->name('contact-us');
Route::post('/store',[FrontendController::class, 'infoStore'])->name('info-store');

Route::get('/shoping-cart',[FrontendController::class, 'shoppingCart'])->name('shoping-cart');
Route::get('/product-list',[FrontendController::class, 'ProductList'])->name('product-list');
Route::get('/product-category/{category_id}',[FrontendController::class, 'categoryWiseProduct'])->name('category-wise-product');
Route::get('/product-brand/{brand_id}',[FrontendController::class, 'brandWiseProduct'])->name('brand-wise-product');


Route::get('/product/details/{id}/{slug}',[FrontendController::class, 'productDetails'])->name('product.details.info');

Route::post('/findout',[FrontendController::class, 'search'])->name('find-search');
Route::get('/get-product',[FrontendController::class, 'getProduct'])->name('get.product');
Route::get('/search-blank',[FrontendController::class, 'searchBlank'])->name('search-blank');

//Shopping Cart
Route::post('/add-to-cart',[CartController::class, 'addToCart'])->name('inserted-cart');
Route::get('/show-cart',[CartController::class, 'showToCart'])->name('show-cart');
Route::post('/update-cart',[CartController::class, 'updateCart'])->name('update-cart');
Route::get('/delete-cart/{rowId}',[CartController::class, 'deleteCart'])->name('delete-cart');

//Customer Login/Register/Dashboard 
Route::get('/customer-login',[CustomerController::class, 'customerLogin'])->name('customer-login');
Route::get('/customer-signup',[CustomerController::class, 'customerSignup'])->name('customer-signup');
Route::post('/customer-store',[CustomerController::class, 'customerStore'])->name('customer-store');
Route::get('/email-verify',[CustomerController::class, 'emailVerify'])->name('email-verify');
Route::post('/verify-store',[CustomerController::class, 'verifyStore'])->name('verify-store');
//checkout
Route::get('/customer-checkout',[CustomerController::class, 'customerCheckout'])->name('customer-checkout');
Route::post('/customer-check-store',[CustomerController::class, 'customerCheckStore'])->name('customer-check-store');

//Login with facebook
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class,'redirectToFacebook'])->name('facebook');
Route::get('facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);
//Login with github
Route::get('login/github', [App\Http\Controllers\Auth\LoginController::class,'redirectToGithub'])->name('github');
Route::get('github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);
//Login with google
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class,'redirectToGoogle'])->name('google');
Route::get('google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);


Route::group(['middleware' => ['auth','customer']], function(){
	Route::get('/customer-dashboard',[App\Http\Controllers\Frontend\CustomerDashboardController::class, 'customerDashboard'])
	->name('customer-dashboard');
	Route::get('/edit-customer-dashboard',[App\Http\Controllers\Frontend\CustomerDashboardController::class, 'editCusDash'])
	->name('edit-customer-dashboard');
	Route::post('/customer-profile-update', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'customreUpdate'])
	->name('customer-profile-update');
	Route::get('/customer-pass-change', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'editPass'])
	->name('customer-pass-change');
	Route::post('/password-update', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'customerPasswordUpdate'])
	->name('customer-password-update');

	//payment
	Route::get('/payment', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'payment'])->name('customer-payment');
	Route::post('/payment-store', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'paymentStore'])->name('customer-payment-store');
	Route::get('/cus-order-list', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'cusOrderList'])->name('cus-order-list');
	Route::get('/order-details/{id}',[App\Http\Controllers\Frontend\CustomerDashboardController::class, 'orderDetails'])->name('cust-order-details');
	Route::get('/order-print/{id}',[App\Http\Controllers\Frontend\CustomerDashboardController::class, 'orderPrint'])->name('cust-order-print');

});

////////////// Admin  /////////////
Route::group(['middleware' => ['auth','admin']], function(){

	Route::get('/home', [App\Http\Controllers\Backend\User\HomeController::class, 'index'])->name('home');

	Route::prefix('users')->group(function(){
		Route::get('view', [App\Http\Controllers\Backend\User\UserController::class, 'view'])->name('view-user');
		Route::get('add', [App\Http\Controllers\Backend\User\UserController::class, 'add'])->name('add-user');
		Route::post('store', [App\Http\Controllers\Backend\User\UserController::class, 'store'])->name('store-user');
		Route::get('edit{id}', [App\Http\Controllers\Backend\User\UserController::class, 'edit'])->name('edit-user');
		Route::post('update{id}', [App\Http\Controllers\Backend\User\UserController::class, 'update'])->name('update-user');
		Route::get('delete{id}', [App\Http\Controllers\Backend\User\UserController::class, 'delete'])->name('delete-user');
	});

	Route::prefix('profiles')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\User\ProfileController::class, 'index'])->name('profiles-view');
		Route::get('/edit',[App\Http\Controllers\Backend\User\ProfileController::class, 'edit'])->name('profiles-edit');
		Route::post('/store',[App\Http\Controllers\Backend\User\ProfileController::class, 'update'])->name('profiles-update');
		Route::get('/password/view',[App\Http\Controllers\Backend\User\ProfileController::class, 'passwordView'])->name('password-view');
		Route::post('/password/update',[App\Http\Controllers\Backend\User\ProfileController::class, 'passwordUpdate'])->name('password-update');
	});

	Route::prefix('logos')->group(function (){
		Route::get('/view',[App\Http\Controllers\Backend\Logo\LogoController::class, 'index'])->name('logo-view');
		Route::get('/create',[App\Http\Controllers\Backend\Logo\LogoController::class, 'create'])->name('logo-create');
		Route::post('/store',[App\Http\Controllers\Backend\Logo\LogoController::class, 'store'])->name('logo-store');
		Route::get('/edit{id}',[App\Http\Controllers\Backend\Logo\LogoController::class, 'edit'])->name('logo-edit');
		Route::post('/update{id}',[App\Http\Controllers\Backend\Logo\LogoController::class, 'update'])->name('logo-update');
		Route::get('/destroy{id}',[App\Http\Controllers\Backend\Logo\LogoController::class, 'destroy'])->name('logo-destroy');
	});

	Route::prefix('sliders')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\Slider\SliderController::class, 'index'])->name('view-slider');
		Route::get('/add',[App\Http\Controllers\Backend\Slider\SliderController::class, 'create'])->name('add-slider');
		Route::post('/store',[App\Http\Controllers\Backend\Slider\SliderController::class, 'store'])->name('store-slider');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\Slider\SliderController::class, 'edit'])->name('edit-slider');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\Slider\SliderController::class, 'update'])->name('update-slider');
		Route::get('/destroy/{id}',[App\Http\Controllers\Backend\Slider\SliderController::class, 'destroy'])->name('destroy-slider');
	});

	Route::prefix('socials')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\SocialController::class, 'view'])->name('view-social');
		Route::get('/add',[App\Http\Controllers\Backend\SocialController::class, 'add'])->name('add-social');
		Route::post('/store',[App\Http\Controllers\Backend\SocialController::class, 'store'])->name('store-social');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\SocialController::class, 'edit'])->name('edit-social');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\SocialController::class, 'update'])->name('update-social');
		Route::get('/delete/{id}',[App\Http\Controllers\Backend\SocialController::class, 'delete'])->name('delete-social');
	});

	Route::prefix('contacts')->group(function(){
		Route::get('/customer',[App\Http\Controllers\Backend\Contact\ContactController::class, 'contact'])->name('view-contact');
		Route::get('/contact-delete{id}',[App\Http\Controllers\Backend\Contact\ContactController::class, 'deleteConatct'])->name('delete-contact');
	});

	Route::prefix('aboutus')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\Aboutus\AboutusController::class, 'index'])->name('view-aboutus');
		Route::get('/add',[App\Http\Controllers\Backend\Aboutus\AboutusController::class, 'create'])->name('add-aboutus');
		Route::post('/store',[App\Http\Controllers\Backend\Aboutus\AboutusController::class, 'store'])->name('store-aboutus');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\Aboutus\AboutusController::class, 'edit'])->name('edit-aboutus');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\Aboutus\AboutusController::class, 'update'])->name('update-aboutus');
		Route::get('/destroy/{id}',[App\Http\Controllers\Backend\Aboutus\AboutusController::class, 'destroy'])->name('destroy-aboutus');
	});

	Route::prefix('categories')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\Category\CategoryController::class, 'view'])->name('view-category');
		Route::get('/add',[App\Http\Controllers\Backend\Category\CategoryController::class, 'add'])->name('add-category');
		Route::post('/store',[App\Http\Controllers\Backend\Category\CategoryController::class, 'store'])->name('store-category');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\Category\CategoryController::class, 'edit'])->name('edit-category');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\Category\CategoryController::class, 'update'])->name('update-category');
		Route::get('/delete/{id}',[App\Http\Controllers\Backend\Category\CategoryController::class, 'destroy'])->name('delete-category');
	});

	Route::prefix('brands')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\Brand\BrandController::class, 'view'])->name('view-brand');
		Route::get('/add',[App\Http\Controllers\Backend\Brand\BrandController::class, 'add'])->name('add-brand');
		Route::post('/store',[App\Http\Controllers\Backend\Brand\BrandController::class, 'store'])->name('store-brand');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\Brand\BrandController::class, 'edit'])->name('edit-brand');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\Brand\BrandController::class, 'update'])->name('update-brand');
		Route::get('/delete/{id}',[App\Http\Controllers\Backend\Brand\BrandController::class, 'destroy'])->name('delete-brand');
	});

	Route::prefix('colors')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\Color\ColorController::class, 'view'])->name('view-color');
		Route::get('/add',[App\Http\Controllers\Backend\Color\ColorController::class, 'add'])->name('add-color');
		Route::post('/store',[App\Http\Controllers\Backend\Color\ColorController::class, 'store'])->name('store-color');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\Color\ColorController::class, 'edit'])->name('edit-color');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\Color\ColorController::class, 'update'])->name('update-color');
		Route::get('/delete/{id}',[App\Http\Controllers\Backend\Color\ColorController::class, 'delete'])->name('delete-color');
	});

	Route::prefix('sizes')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\SizeController::class, 'view'])->name('view-size');
		Route::get('/add',[App\Http\Controllers\Backend\SizeController::class, 'add'])->name('add-size');
		Route::post('/store',[App\Http\Controllers\Backend\SizeController::class, 'store'])->name('store-size');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\SizeController::class, 'edit'])->name('edit-size');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\SizeController::class, 'update'])->name('update-size');
		Route::get('/delete/{id}',[App\Http\Controllers\Backend\SizeController::class, 'delete'])->name('delete-size');
	});

	Route::prefix('products')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\ProductController::class, 'view'])->name('view-product');
		Route::get('/add',[App\Http\Controllers\Backend\ProductController::class, 'add'])->name('add-product');
		Route::post('/store',[App\Http\Controllers\Backend\ProductController::class, 'store'])->name('store-product');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('edit-product');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\ProductController::class, 'update'])->name('update-product');
		Route::get('/delete/{id}',[App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('delete-product');
		Route::get('/details/{id}',[App\Http\Controllers\Backend\ProductController::class, 'details'])->name('details-product');
	});

	Route::prefix('customers')->group(function(){
		Route::get('/view-customer',[App\Http\Controllers\Backend\CustomerHandleController::class, 'view'])->name('view-customer');
		Route::get('/pending-customer',[App\Http\Controllers\Backend\CustomerHandleController::class, 'pendingCustomer'])->name('pending-customer');
		Route::get('/delete-customer/{id}',[App\Http\Controllers\Backend\CustomerHandleController::class, 'delete'])->name('delete-customer');
	});

	Route::prefix('orders')->group(function(){
		Route::get('/pending-list',[App\Http\Controllers\Backend\OrderController::class, 'pendingList'])->name('pending-order');
		Route::get('/approved-list',[App\Http\Controllers\Backend\OrderController::class, 'approveList'])->name('approved-order');
		Route::get('/details-list/{id}',[App\Http\Controllers\Backend\OrderController::class, 'approvedOrderDetails'])
		->name('approved-order-details');

		Route::get('/approved/{id}',[App\Http\Controllers\Backend\OrderController::class, 'orderApproved'])->name('order-approved');

	});


	Route::prefix('carousels')->group(function(){
		Route::get('/view',[App\Http\Controllers\Backend\CarouselController::class, 'view'])->name('view-carousel');
		Route::get('/add',[App\Http\Controllers\Backend\CarouselController::class, 'add'])->name('add-carousel');
		Route::post('/store',[App\Http\Controllers\Backend\CarouselController::class, 'store'])->name('store-carousel');
		Route::get('/edit/{id}',[App\Http\Controllers\Backend\CarouselController::class, 'edit'])->name('edit-carousel');
		Route::post('/update/{id}',[App\Http\Controllers\Backend\CarouselController::class, 'update'])->name('update-carousel');
		Route::get('/delete/{id}',[App\Http\Controllers\Backend\CarouselController::class, 'delete'])->name('delete-carousel');
	});


});

