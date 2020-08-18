<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//User Side all route here
Route::group(['namespace'=> 'User'],function(){
Route::get('/', 'ViewportController@index');
Route::get('/shop', 'ViewportController@shop')->name('shop');
Route::get('product/categories/{categories}', 'ViewportController@categories')->name('categories');
Route::get('product/subcategories/{subcategories}', 'ViewportController@subcategories')->name('subcategories');
Route::get('/product-details/{slug}', 'ViewportController@product_details')->name('product-details');

// Route::get('/checkout/{id}', 'ViewportController@checkout')->name('checkout');
Route::get('/contact', 'ViewportController@contact')->name('contact');
Route::get('/about', 'ViewportController@about')->name('about');
Route::get('/blog', 'ViewportController@blog')->name('blog');
Route::get('/blog_details/{slug}', 'ViewportController@blog_details')->name('blog_details');
Route::get('post/tag/{tag}', 'ViewportController@tag')->name('tag');
Route::get('post/categories/{categories}', 'ViewportController@postcategories')->name('postcategories');
Route::post('search/posts','ViewportController@search')->name('search1');
// Route::post('subscribe/posts', 'ViewportController@popupform')->name('subscribe');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');
Route::get('/cartTocheckout', 'CartController@cartTocheckout')->name('cartTocheckout');
Route::post('/comment', 'CommentController@store')->name('comments.store');
// Route::resource('karimEcommerce', 'ViewportController');

Route::resource('User-Dashboard','UserDashboardController');
Route::get('/Complete-Order/{slug}', 'UserDashboardController@completeorder')->name('completeorder');
Route::get('/myprofile/{slug}', 'UserDashboardController@myprofile')->name('myprofile');
Route::post('/Change-Password/{id}', 'UserDashboardController@password')->name('user.password');
});

//admin route here

Route::group(['namespace'=> 'Admin'],function(){
Route::get('/adminroot', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/adminroot', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');
// Route::post('/signupX30015', 'AdminController@sign_admin');
// Route::get('/ushamsX30015registration', 'AdminController@registration');
// Route::post('/adminsave30015', 'AdminController@add_admin');
Route::get('/admin-dashboard', 'DashboardController@index')->name('admin.panel');
Route::get('/page-header/', 'DashboardController@header_edit')->name('headerediting');
Route::post('/change-logo/{id}', 'DashboardController@update')->name('logo.change');
Route::post('/change-number/{id}', 'DashboardController@number')->name('number.change');
Route::get('/social-media-icon', 'DashboardController@media_edit')->name('social_media');
Route::get('/social-media-icon/edit/{id}', 'DashboardController@edit')->name('icon_editing');
Route::post('/social-media-icon/update/{id}', 'DashboardController@icon_update')->name('icon_update');
Route::get('/change-password/{id}', 'ProfileController@password')->name('admin.password');
Route::get('FiexdImageArea/{id}', 'HomepageController@fiexdImage')->name('fiexdImage');
Route::get('OfferArea/{id}', 'HomepageController@offerarea')->name('offerarea');
Route::get('/complete/order', 'DelivaryController@ordercomplete')->name('ordercomplete');




//ADMIN POST, TAG, CATEGORY, USER RELETED ALL CONTROLLER ARE HERE
Route::resource('deshboard','DashboardController');
Route::resource('HomePage','HomepageController');
Route::resource('Arrivals','ArrivalController');
Route::resource('Testimonial','TestimonialController');
Route::resource('admincontact','ContactController');
Route::resource('Arrivalscategory','ArrivalCategoryController');
Route::resource('ImageSlider','ImageSliderController');
Route::resource('profile','ProfileController');
Route::resource('category','ProductCategoryController');
Route::resource('subcategory','ProductSubCategoryController');
Route::resource('product','ProductController');
Route::resource('delivary','DelivaryController');
Route::resource('post','PostController');
Route::resource('post-category','PostCategoryController');
Route::resource('post-tag','PostTagController');
Route::resource('user-information','UserShowController');
});
