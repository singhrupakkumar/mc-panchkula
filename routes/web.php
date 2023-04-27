<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationsController;
use App\Http\Controllers\Admin\TourCustomizationsController;
use App\Http\Controllers\Admin\ToursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{UsersController, CategoriesController, ProductsController, ProfilesController, SettingsController, ChangePasswordController, OrdersController};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/sendmail', function () {
    // $name = 'Admin';
    // $message = 'sdf s sdf sdf';

    //   $adminemail = "info@mailinator.com";
    //             //$adminemail = "ramwindows@mailinator.com";
    //             $name = 'Admin';
    //             $emaildata = \DB::table('email_templates')->where('id', '1')->first();     
    //             $sortcut_code = ['{Name}','{Message}'];
    //             $replace_with = [$name,$message];     
    //             $body = str_replace($sortcut_code, $replace_with,  $emaildata->description);  

    //             \App\Helpers::getMailTemplate(1, $adminemail,$adminemail, $body,$message);
    //   echo "Email Sent with attachment. Check your inbox.";
});
// Admin Route
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //Users Route
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    
    //Category Route
    Route::get('/category', [CategoriesController::class, 'index'])->name('admin.category.index');
    Route::get('/category/add-category', [CategoriesController::class, 'create'])->name('admin.category.add');
    Route::post('/category/store-tour', [CategoriesController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id?}', [CategoriesController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id?}', [CategoriesController::class, 'update'])->name('admin.category.update');
    Route::get('/category/{id?}', [CategoriesController::class, 'show'])->name('admin.category.show');
    Route::post('/category/destroy/', [CategoriesController::class, 'destroy'])->name('admin.category.destroy');
    //Product Route
    Route::get('/product', [ProductsController::class, 'index'])->name('admin.product.index');
    Route::get('/product/add-product', [ProductsController::class, 'create'])->name('admin.product.add');
    Route::post('/product/store-tour', [ProductsController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id?}', [ProductsController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id?}', [ProductsController::class, 'update'])->name('admin.product.update');
    Route::get('/product/{id?}', [ProductsController::class, 'show'])->name('admin.product.show');
    Route::post('/product/delete/', [ProductsController::class, 'deleteProductItem'])->name('admin.product.delete');
  
    // Route::get('change-password', 'ChangePasswordController@changePassword');
    // Route::post('change-password', 'ChangePasswordController@storeChangePassword')->name('change.password');
   
    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('admin.changepassword');
    Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('admin.change.password');
    
    //Setting Route
    Route::get('/setting', [SettingsController::class, 'index'])->name('admin.setting');
    Route::post('/setting/store', [SettingsController::class, 'store'])->name('admin.setting.store');
    //Profile Route
    Route::get('/profile', [ProfilesController::class, 'index'])->name('admin.profile');
    Route::post('/profile/store', [ProfilesController::class, 'store'])->name('admin.profile.store');

    //Custom Tours Route
    Route::get('/orders', [OrdersController::class, 'index'])->name('admin.orders.index');
    Route::get('/order-details/{id?}', [OrdersController::class, 'ordersDetails'])->name('admin.orders-details.show');
    Route::get('/add-recipt', [OrdersController::class, 'addRecipts'])->name('admin.orders.addRecipts');
    Route::get('/stock-received', [OrdersController::class, 'stockReceived'])->name('admin.stock-received.stockReceived');
    Route::get('/stock-out', [OrdersController::class, 'stockOut'])->name('admin.stock-out.stockOut');
    Route::get('/product-items', [OrdersController::class, 'getProducts'])->name('admin.product-items.getProducts');
    Route::post('/product-items/store', [OrdersController::class, 'storeProductItems'])->name('admin.product-items-store.storeProductItems');
    // Other routes for user management
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';