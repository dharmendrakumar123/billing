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

use App\Http\Controllers\HomeController;

Route::get('/', function (){
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify', 'Auth\VerificationController@index')->name('verify');
Route::get('/resend_otp', 'Auth\VerificationController@resend_otp')->name('resend_otp');
Route::post('/verify', 'Auth\VerificationController@verify_otp')->name('verify');
Route::get('/verify_otp/{encrypt}/{otp}', 'Auth\VerificationController@verify_email_otp');
Route::get('/change-email', 'Auth\VerificationController@change_email')->name('change-email');
Route::post('/change-email', 'Auth\VerificationController@update_email')->name('change-email');
Route::get('/signup-organization', 'Auth\VerificationController@signup_organization');
Route::post('/save-organization', 'Auth\VerificationController@save_organization')->name('save-organization');

Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force" => true ]);
});

Route::get('/run-seed', function () {
    return Artisan::call('seed', ["--force" => true ]);
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    Artisan::call('config:clear');
    // return what you want
});

Route::get('/test1', 'PageController@page1');
Route::get('/test2', 'PageController@page2');
Route::get('/test3', 'PageController@page3');


Route::group(['middleware' => ['web','auth']], function () {

    Route::get('/test4', 'PageController@page4');
    Route::get('/test5', 'PageController@page5');
    Route::get('/test6', 'PageController@page6');
    Route::get('/test7', 'PageController@page7');
    Route::get('/test8', 'PageController@page8');
    Route::get('/test9', 'PageController@page9');
    Route::get('/test10', 'PageController@page10');
    Route::get('/test11', 'PageController@page11');
    Route::get('/test12', 'PageController@page12');

    // Route::get('/signup-organization', 'Auth\VerificationController@signup_organization');
    // Route::post('/save-organization', 'Auth\VerificationController@save_organization')->name('save-organization');
    Route::get('changecustomerStatus/{id}', 'CustomerVendorController@changecustomerStatus');
    Route::get('changeproductStatus/{id}', 'ProductController@changeproductStatus');
    Route::resource('customers', 'CustomerVendorController');
    Route::post('product/multidelete', 'ProductController@multidelete');
    Route::get('manage-stock', 'ProductController@stocks');
    Route::post('manage-stock', 'ProductController@stock_update');
    Route::resource('products', 'ProductController');
    Route::resource('transports', 'TransportController');
    Route::resource('transportcharge', 'TransportChargeController');
    Route::resource('sale-invoice', 'SaleInvoiceController');
    Route::resource('purchase-invoice', 'PurchaseInvoiceController');
    Route::resource('sale-receipt', 'SaleInvoiceReceiptController');
    Route::resource('purchase-receipt', 'PurchaseInvoiceReceiptController');
    
    Route::post('customer/multidelete', 'CustomerVendorController@multidelete');
    Route::post('transport/multidelete', 'TransportController@multidelete');
    Route::post('transportcharge/multidelete', 'TransportChargeController@multidelete');
    Route::post('saleinvoice/multidelete', 'SaleInvoiceController@multidelete');
    Route::post('salereceipt/multidelete', 'SaleInvoiceReceiptController@multidelete');
    Route::get('admin-details','HomeController@edit_user')->name('admin-details');
    Route::post('edit-profile','HomeController@save_profile');

    // Route::get('invoice-detail','SettingsController@edit_invoice');
    // Route::post('edit-invoice','SettingsController@update_invoice_setting');
    Route::get('invoice-setting','SettingsController@invoice_setting');
    Route::post('invoice-setting','SettingsController@save_invoice_setting');
    Route::get('membership-detail','SettingsController@member_detail');
    Route::get('business-detail','SettingsController@organisation_detail');
    Route::post('organisation-detail','SettingsController@update_organisation');


    Route::get('customerlist','AjaxController@customers');
    Route::get('lastinvoice','AjaxController@get_invoice_number');
    Route::get('transportlist','AjaxController@transports');
    Route::get('productlist','AjaxController@get_product');
    Route::get('lastreceipt','AjaxController@get_receipt_number');
    Route::get('invoicelist','AjaxController@get_invoice_list');
    Route::post('create_customer','AjaxController@create_customer');
    Route::post('create_transport','AjaxController@create_transport');
    Route::post('create_products','AjaxController@create_product');
    Route::get('print-invoice','SaleInvoiceController@print');
    Route::get('print-invoice-downloadpdf','SaleInvoiceController@downloadprint');
    Route::get('print-invoice-purchase','PurchaseInvoiceController@print');
    Route::get('print-invoice-purchase-downloadpdf','PurchaseInvoiceController@downloadpdf');
    Route::get('print-inward','SaleInvoiceReceiptController@print');
    Route::get('download-pdf-sale-inward','SaleInvoiceReceiptController@pdfdownload');
    Route::get('print-purchase-inward','PurchaseInvoiceReceiptController@print');
    Route::get('download-pdf-purchase-inward','PurchaseInvoiceReceiptController@pdfdownload');
});

Route::get('/adminlogin', 'AdminController@index')->name('adminlogin');
Route::post('/adminlogin', 'AdminController@validateadminLogin')->name('adminlogin');


Route::group(['prefix' => 'admin', 'middleware'=> ['admin']], function () {

    Route::get('dashboard', 'AdminController@admindashboard');
    Route::get('userslist', 'AdminController@userslist');
    Route::get('changeStatus/{id}', 'AdminController@changeStatus');

    Route::get('editprofile', 'AdminController@editprofile');
    Route::post('editprofile','AdminController@saveprofile');

    Route::get('units', 'AdminController@units');
    Route::post('storeunit', 'AdminController@storeunit');
    Route::post('getunit/{id}', 'AdminController@getunit');
    Route::post('updateunit', 'AdminController@updateunit');
    Route::get('destroy/{id}', 'AdminController@destroy');

    Route::get('state', 'AdminController@state');
    Route::post('storestate', 'AdminController@storestate');
    Route::post('getstate/{id}', 'AdminController@getstate');
    Route::post('updatestate', 'AdminController@updatestate');
    Route::get('destroystate/{id}', 'AdminController@destroystate');
    Route::get('changestateStatus/{id}', 'AdminController@changestateStatus');

    Route::get('logoutadmin','AdminController@logoutadmin');
    

 });
 Route::get('/forgotpass','AdminController@forgotpassword');
 Route::post('/resetpassword','AdminController@resetpassword');
 Route::get('/resetpassword','AdminController@verifyotp');
 Route::post('/resetpass','AdminController@resetpass');