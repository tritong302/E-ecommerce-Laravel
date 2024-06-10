<?php
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ColorController;
use App\Livewire\Admin\Brand\Index;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\users\User_ProductsController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\users\User_Product_detail;
use App\Http\Controllers\users\CartController;
use App\Http\Controllers\users\CategoryController;
use App\Http\Controllers\users\SearchProductController;
use App\Http\Controllers\users\CheckOutController;
use App\Http\Controllers\users\OrderController;
use App\Http\Controllers\Admin\UserOrderController;
use App\Http\Controllers\users\MyAcCountController;

use App\Livewire\Users\Product\View;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');

//Route login
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class,'postUser']) -> name('auth.postUser');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'Checklogin'])->name('auth.Checklogin');
Route::get('logOut', [AuthController::class, 'logOut'])->name('logOut');

Route::get('/strayusers', [HomeController::class, 'strayusers'])->name('strayusers'); //Báo lỗi người dùng cố truy cập đến trang admin

//Route Admin
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::controller(CategoryProductController::class)->group(function (){
        Route::get('/category','index');
        Route::get('/add-category','create');
        Route::post('/category','store');
        Route::get('/category/{category_product}/edit','edit');
        Route::put('/category/{category_product}','update');
    });

    Route::controller(ProductController::class)->group(function (){
        Route::get('/product','index');
        Route::get('/add-product','create');
        Route::post('/product','store');
        Route::get('/product/{product}/edit','edit');
        Route::put('/product/{product}','update');
        Route::get('/product/{product_id}/delete','destroy');
        Route::get('/product-image/{product_image_id}/delete','destroyImage');

        Route::post('/product-color/{product_color_id}','updateProductColorQuantity');
        Route::get('product-color/{product_color_id}/delete','deleteProductColor');
    });

    Route::get('/brands',Index::class);

    Route::controller(UserController::class)->group(function (){
        Route::get('/user','index');
        Route::get('/add-user','create');
        Route::post('/user', 'store');
        Route::get('/user/{user}/edit','edit');
        Route::put('/user/{user}','update');
        Route::get('/user/{user}/delete','destroy');
    });

    Route::controller(ColorController::class)->group(function (){
       Route::get('/color','index')->name('color');
       Route::get('/add-color','create');
       Route::post('/color','store');
       Route::get('/color/{colors}/edit','edit');
       Route::put('/color/{colors}','update');
       Route::get('/color/{colors}/delete','destroy');
    });


    Route::controller(\App\Http\Controllers\Admin\SlideController::class)->group(function (){
        Route::get('/slide','index')->name('slide');
        Route::get('/add-slide','create');
        Route::post('/slide','store');
        Route::get('/slide/{slide}/edit','edit');
        Route::put('/slide/{slide}','update');
        Route::get('/slide/{slide}/delete','destroy');
    });
    //UserOrderall
    Route::controller(UserOrderController::class)->group(function (){
        Route::get('/AllUserOrder','AllUserOrder')->name('All_User_Order');
        Route::get('AllUser/{id}/DesTroy', 'AllUserDesTroy')->name('All_User_destroy_order');

        Route::get('Cancel', 'AllUserCancel')->name('All_User_cancel_order');
    });
});
//Route Website


Route::controller(User_ProductsController::class)->group(function(){
    Route::get('/user_product', 'index')->name('user_product');
    Route::get('/category','categories');
});

Route::controller(User_Product_detail::class)->group(function(){
    Route::get('/user_product_detail/{id}', 'index')->name('user_product_detail');
});

Route::controller(SearchProductController::class)->group(function(){
    Route::get('/search_product', 'index')->name('search_product');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/User_cart', [CartController::class, 'index'])->name('user_cart');
    Route::get('/cart_remove/{id}', [CartController::class, 'destroyCart'])->name('cart_remove');


    Route::get('/User_checkout', [CartController::class, 'checkout'])->name('user_checkout');
    Route::post('/User_checkout', [CartController::class, 'order'])->name('order');

    Route::get('/User_list_order', [OrderController::class, 'userOder'])->name('User_list_order');
    Route::get('orders/{id}/destroy',[OrderController::class, 'userDesTroy'])->name('User_destroy_order');

    Route::post('/subscribe', [HomeController::class, 'subscribe' ])->name('subscribe');
    Route::get('/myaccoutn', [MyAcCountController::class, 'index'])->name('my_account');

    Route::post('/update-quantity/{cart}', [CartController::class, 'updateQuantity']);
    Route::post('/check-quantity/{cart}', [CartController::class, 'checkQuantity']);

    Route::get('/listwishlit', [View::class, 'showWishlist'])->name('listwishlit'); 

});

// Route::get('thankyou',[HomeController::class, 'thankyou'])->name('thankyou');
