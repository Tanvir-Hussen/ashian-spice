<?php


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'admin\superAdminController@index')->name('home');

//------------------------------Admin Controller---------------------//
Route::get('/admin', 'admin\adminController@index')->name('login-view');
Route::post('/admin-login', 'admin\adminController@admin_login')->name('admin-login');
Route::get('/save-admin', 'admin\adminController@save_admin')->name('save-admin');
Route::get('/admin-register', 'admin\adminController@admin_register')->name('admin-register');
Route::get('/admin-logout', 'admin\superAdminController@admin_logout')->name('admin-logout');



// ----------------------------CategoryController--------------------------------------
Route::get('/category/add-category', 'category\categoryController@add_category')->name('add-category');
Route::get('/category/manage-category', 'category\categoryController@manage_category')->name('manage-category');
Route::post('/category/save-category', 'category\categoryController@save_category')->name('save-category');
Route::get('/category/delete-category/{id}', 'category\categoryController@delete_category')->name('delete-category');
Route::get('categroy/category-active/{id}', 'category\categoryController@active_category')->name('active-category');
Route::get('categroy/category-inactive/{id}', 'category\categoryController@inactive_category')->name('inactive-category');
Route::get('categroy/category-edit/{id}', 'category\categoryController@edit_category')->name('edit-category');
Route::post('/category/update-category/{id}', 'category\categoryController@update_category')->name('update-category');



// ----------------------------ProductController--------------------------------------
Route::get('/product/add-product', 'product\productController@add_product')->name('add-product');
Route::get('/product/manage-product', 'product\productController@manage_product')->name('manage-product');
Route::post('/product/save-product', 'product\productController@save_product')->name('save-product');
Route::get('product/product-inactive/{id}', 'product\productController@inactive_product')->name('product-inactive');
Route::get('product/product-active/{id}', 'product\productController@active_product')->name('product-active');
Route::get('product/product-edit/{id}', 'product\productController@edit_product')->name('edit-product');
Route::post('product/product-update/{id}', 'product\productController@update_product')->name('update-product');


// ----------------------------ProductController--------------------------------------
Route::get('/message/add-message', 'message\messageController@add_message')->name('add-message');
Route::get('/message/manage-message', 'message\messageController@manage_message')->name('manage-message');
Route::post('/message/save-message', 'message\messageController@save_message')->name('save-message');

// ----------------------------ProductController--------------------------------------
Route::get('/order/order-now', 'order\orderController@order_now')->name('order-now');
Route::get('/order/empty-cart', 'order\orderController@empty_cart')->name('empty-cart');
Route::get('/order/manage-order', 'order\orderController@manage_order')->name('manage-order');
Route::get('/order/view-order/{id}', 'order\orderController@view_order')->name('view-order');
Route::get('/order/order-done/{id}', 'order\orderController@order_done')->name('order-done');
Route::get('/order/delete-order/{id}', 'order\orderController@order_delete')->name('delete-order');




Route::get('/', 'siteController@index')->name('index');



//------------------------------Frontend All Controllers----------------------------------------- 
Route::get('/home/product/{id}', 'frontendController\homeController@index')->name('categroy_product');
Route::get('/product/all-product', 'frontendController\homeController@all_product')->name('all.product');
Route::get('/product/all-category', 'frontendController\homeController@all_category')->name('all.category');
Route::get('/product/view-more/{id}', 'frontendController\homeController@view_about_product')->name('view.more');
Route::post('/product/add-to-cart/{id}', 'frontendController\homeController@add_to_cart')->name('add-to-cart');
Route::get('/product/show-cart', 'frontendController\homeController@show_cart')->name('show-cart');


//--------------------------------About Us Controller--------------------------------
Route::get('/home/about-us', 'about\AboutUsController@about_us')->name('about-us');


//--------------------------------About Us Controller--------------------------------
Route::get('/home/contact-us', 'contact\ContactUsController@contact_us')->name('contact-us');
Route::post('/home/save-contact','contact\ContactUsController@save_contact')->name('save-contact');



// ------------------------------Cart Controller---------------------------------------------//
Route::get('/cart/show-cart/{id}', 'cart\CartController@remove_item')->name('item.remove');


//------------------------------Customer Controller---------------------//
Route::post('/buyer/buyer-info', 'customer\customerController@buyer_info')->name('buyer-info');



// -----------------------------pagination ----------------------------
Route::post('/load-more-data', 'pagination@index')->name('load-more-data');

