<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeaturedController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputechController;
use App\Http\Controllers\LaptopgamingController;
use App\Http\Controllers\LaptopwindowController;
use App\Http\Controllers\MacosController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProductdetailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FillterCategoryController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\VnpayController;

/* |--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/') -> group(function(){
    Route::get('/', [ComputechController::class, 'show']) -> name('layouts.computech');
    Route::post('/search', [ComputechController::class, 'searchProduct'])-> name('searchProduct');
    Route::get('/laptopgaming.html', [LaptopgamingController::class, 'show']) -> name('layouts.laptopgaming');
    Route::get('/macos.html', [MacosController::class, 'show']) -> name('layouts.macos');
    


    Route::prefix('detail') -> group(function(){
        Route::get('/{slug}', [ProductdetailController::class, 'detailProduct']) -> name('detail');
        Route::post('/', [ProductdetailController::class, 'addToCart']) -> name('addToCart');
    });

    Route::prefix('search') -> group(function(){
        Route::get('', [ComputechController::class, 'searchProduct'])-> name('searchProduct');
        Route::post('sort=asc', [ComputechController::class, 'sortAsc'])->name('sortAsc.search');
        Route::post('sort=desc', [ComputechController::class, 'sortDesc'])->name('sortDesc.search');
    });

    Route::prefix('cart.html') ->group(function(){
        Route::get('/', [CartController::class, 'show']) -> name('cart');
        Route::post('/{id}', [CartController::class, 'delete']) -> name('deleteProductCart');
    });


    


    Route::prefix('payment')-> group( function(){
        Route::get('', [PaymentController::class, 'show']) -> name('payment');
        Route::post('/dathang', [PaymentController::class, 'dathang']) -> name('dathang');
        Route::get('vnpay-return', [PaymentController::class, 'vnpayReturn']) -> name('vnpay.return');
        Route::get('update', [PaymentController::class, 'updateOrder'])->name('update.status');
    });
    Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']) ->name('vnpay');

    Route::prefix('login') -> group(function(){
        Route::get('', [LoginUserController::class, 'showlogin']) -> name('login');
        Route::post('/store', [LoginUserController::class, 'checkLogin']);
    });
    Route::post('/logout', [LoginUserController::class, 'logout'])-> name('logout');


    Route::prefix('register') -> group(function(){
        Route::get('', [RegisterController::class, 'showregister']) -> name('register');
        Route::post('/store', [RegisterController::class, 'store']);
    });

    Route::prefix('laptop') -> group(function(){
        Route::get('', [LaptopwindowController::class, 'show']) -> name('layouts.laptopwindow');
        Route::post('sort=asc', [FilterController::class, 'sortAsc'])->name('sortAsc');
        Route::post('sort=desc', [FilterController::class, 'sortDesc'])->name('sortDesc');
        Route::prefix('acer') -> group(function(){
            Route::get('/', [FillterCategoryController::class, 'fillterCategoryAcer'])-> name('Acer');
            Route::post('sort=asc', [FilterController::class, 'sortAsc'])->name('sortAsc.laptop');
            Route::post('sort=desc', [FilterController::class, 'sortDesc'])->name('sortDesc.laptop');
        });
        Route::prefix('asus') -> group(function(){
            Route::get('/', [FillterCategoryController::class, 'fillterCategoryAsus'])-> name('Asus');
            Route::post('sort=asc', [FilterController::class, 'sortAsc'])->name('sortAsc.laptop');
            Route::post('sort=desc', [FilterController::class, 'sortDesc'])->name('sortDesc.laptop');
        });
        Route::get('/macbook', [FillterCategoryController::class, 'fillterCategoryMacbook'])-> name('Macbook');
        Route::get('/dell', [FillterCategoryController::class, 'fillterCategoryDell'])-> name('Dell');
        Route::get('/hp', [FillterCategoryController::class, 'fillterCategoryHp'])-> name('HP');
        Route::get('/lenovo', [FillterCategoryController::class, 'fillterCategoryLenovo'])-> name('Lenovo');
        Route::get('/msi', [FillterCategoryController::class, 'fillterCategoryMSI'])-> name('MSI');
        
    });

    Route::prefix('like') -> group(function(){
        Route::get('', [LikeController::class, 'showLike']) -> name('like');
        Route::post('addlike', [LikeController::class, 'createLike']) -> name('addLike');
        Route::post('delete/{id}', [LikeController::class, 'deleteLike']) -> name('delete.like');
    });

});


// LOGIN ADMIN
Route::prefix('admin/login') -> group(function(){
    Route::get('', [LoginAdminController::class, 'showlogin']) -> name('admin.login');
    Route::post('/store', [LoginAdminController::class, 'store']);
});
Route::post('/logoutadmin', [LoginAdminController::class, 'logout'])-> name('admin.logout');


// ROUTE ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'CheckRole']],function(){


    // ROUTE DASHBOARD
    Route::prefix('/') -> group(function(){
        Route::get('/', [DashboardController::class, 'show']) -> name('dashboard');
    });

    // ROUTE MANAGER USERS
    Route::prefix('users') -> group(function(){
        Route::get('/', [UsersController::class, 'show']) -> name('users');
        Route::get('/add', [UsersController::class, 'formAddUser']) -> name('add.user');
        Route::post('/store', [UsersController::class, 'checkAdd']);
        Route::post('/delete/{id}', [UsersController::class, 'delete']) -> name('delete.user');
        Route::get('/update/{id}', [UsersController::class, 'formupdate']) -> name('form.update');
        Route::post('/update/{id}', [UsersController::class, 'update']) -> name('update.user');
        Route::post('/', [UsersController::class, 'search']) -> name('search.user');
    });

    // ROUTE MANAGER PRODUCTS
    Route::prefix('products') -> group(function(){
        Route::get('/', [ProductsController::class, 'show']) -> name('products');
        Route::get('/add', [ProductsController::class, 'showAdd']) -> name('formAdd.products');
        Route::post('/create', [ProductsController::class, 'create']) -> name('add.products');
        Route::post('/delete/{id}', [ProductsController::class, 'delete']) -> name('delete.products');
        Route::get('/update/{id}', [ProductsController::class, 'updateForm']) -> name('updateForm.products');
        Route::post('/update/{id}', [ProductsController::class, 'update']) -> name('update.products');

    });



    // ROUTE MANAGER CATEGORY
    Route::prefix('category') -> group(function(){
        Route::get('/', [CategoryController::class, 'show']) -> name('category');
        Route::get('/add-category', [CategoryController::class, 'showAdd']) -> name('add.category');
        Route::post('/create', [CategoryController::class, 'create']) -> name('create.category');
        Route::post('/delete/{id}', [CategoryController::class, 'delete']) -> name('delete.category');
        Route::get('/update/{id}', [CategoryController::class, 'formUpdate']) -> name('formUpdate.category');
        Route::post('/update/{id}', [CategoryController::class, 'update']) -> name('update.category');

    });

    // ROUTE MANAGER ROLES
    Route::prefix('roles') -> group(function(){
        Route::get('/', [RolesController::class, 'show']) -> name('roles');
        Route::get('/add', [RolesController::class, 'showAddRoles']) -> name('add.roles');
        Route::post('/create', [RolesController::class, 'createRoles']);
        Route::post('/delete/{id}', [RolesController::class, 'delete']) -> name('delete.roles');
        Route::get('/update/{id}', [RolesController::class, 'update']) -> name('update.roles');
    });

    // ROUTE MANAGER COLOR PRODUCTS
    Route::prefix('color') -> group(function(){
        Route::get('/', [ColorController::class, 'show']) -> name('color');
        Route::get('/add', [ColorController::class, 'formAdd']) -> name('formAdd.color');
        Route::post('/create', [ColorController::class, 'create']) -> name('add.color');
        Route::post('/delete/{id}', [ColorController::class, 'delete']) -> name('delete.color');
        Route::get('/update/{id}', [ColorController::class, 'formUpdate']) -> name('formUpdate.color');
        Route::post('/update/{id}', [ColorController::class, 'updateColor']) -> name('update.color');
        Route::post('', [ColorController::class, 'searchColor']) -> name('search.color');
    });

    // Order
    Route::prefix('order') -> group(function(){
        Route::get('/', [OrderController::class, 'showOrder']) -> name('order');
        Route::get('/destroy', [CartController::class, 'deleteCart']) -> name('destroy');
    });


});

// Route::get('/register', 'Auth\RegisteredUserController@store')-> name('register');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
