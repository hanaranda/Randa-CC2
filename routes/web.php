<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\MonCompteController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;


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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

Route::get('/',[AccueilController::class,"index"])->name('accueil');

Route::get('/panier',[PanierController::class,"index"])->name('panier');
;
Route::get('/moncompte', [MonCompteController::class,"index"])->name('moncompte');

Route::get('/commandes', 'CommandesController@show')->name('Commandes');





Route::prefix('admin')->group(function () {
   
    Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.loginForm');
    
    
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    
   
    Route::middleware('auth:admin')->group(function () {
        
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        
    });
});



Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('/commandes', [CommandesController::class, 'index'])->name('commandes');



Route::get('/shopping-cart', [AccueilController::class, 'productCart'])->name('shopping.cart');
Route::get('/product/{id}', [AccueilController::class, 'addProducttoCart'])->name('addProduct.to.cart');
Route::patch('/update-shopping-cart', [AccueilController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [AccueilController::class, 'deleteProduct'])->name('delete.cart.product');

Route::get('/search', [AccueilController::class,'search'])->name('search');
Route::get('/searchByPrice', [AccueilController::class,'searchByPrice'])->name('searchByPrice');




Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');


Route::get('/order/pdf', [CommandesController::class,'generatePDF'])->name('order.pdf');
//Route::post('products/import', 'ProductsController@import')->name('products.import');

//Route::get('products/export', 'ProductsController@export')->name('products.export');
Route::get('send-mail', [MailController::class, 'index'])->name('email');

Route::get('/products/export', 'ProductsController@export')->name('products.export');

Route::post('/products/import', [ProductsController::class,'export'])->name('products.import');
