<?php
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\GettingStartedController;
use App\Http\Controllers\CSRFController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BladeTemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\POS\SaleController;
use App\Http\Controllers\POS\POSAuthController;
use App\Http\Controllers\AdminSaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerSaleController;

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

Route::prefix('admin')->group(function(){
    // get started
    Route::get('/', function () {
        return view('admin.auth.login');
    });

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/logout',function() {
        Auth::logout();
        return redirect('/admin');
    });

    Route::middleware(['check-admin-auth'])->group(function(){
        Route::get('/page1', [GettingStartedController::class, 'getPage1']);
        Route::get('/page2', [GettingStartedController::class, 'getPage2']);

        // routing

        Route::get('/routing/view-only', [RoutingController::class, 'viewOnly']);
        Route::get('/routing/pass-data-to-view', [RoutingController::class, 'passDataToView']);
        Route::get('/routing/route-para/{bgColor}/{color}', [RoutingController::class, 'routePara']);
        Route::get('/routing/dynamic-route-para', [RoutingController::class, 'dynamicRoutePara']);
        Route::post('/routing/dynamic-route-para/submit', [RoutingController::class, 'submitDynamicRoutePara']);
        Route::get('/routing/named-route', [RoutingController::class, 'namedRoute'])->name('named-route');
        Route::get('/routing/middleware', [RoutingController::class, 'testMiddleware']);
        Route::post('/routing/check-middleware', [RoutingController::class, 'checkMiddleware'])->middleware('first','second');
        Route::get('/routing/regular-expression', [RoutingController::class, 'regularExpression']);
        Route::get('/routing/regular-expression/{id}/{name}', [RoutingController::class, 'regularExpressionWithRoutePara'])
        ->where([
            'id' => '[0-9]+',
            'name' => '[a-z]+'
        ]);

        //csrf
        Route::get('/csrf/lecture1', [CSRFController::class, 'lecture1']);
        Route::get('/csrf/lecture2', [CSRFController::class, 'lecture2']);
        Route::get('/csrf/lecture3', [CSRFController::class, 'lecture3']);
        Route::post('/csrf/create', [CSRFController::class, 'create']);
        Route::post('/csrf/get-list-item-data', [CSRFController::class, 'getListItemData']);


        //session
        Route::get('/session/get', [SessionController::class, 'get']);
        Route::get('/session/put', [SessionController::class, 'put']);
        Route::get('/session/flash', [SessionController::class, 'flash']);
        Route::get('/session/delete', [SessionController::class, 'delete']);
        Route::get('/session/ajax', [SessionController::class, 'ajax']);
        Route::post('/session/put-session', [SessionController::class, 'putSession']);
        Route::post('/session/flash-session', [SessionController::class, 'flashSession']);
        Route::post('/session/delete/{sessionName}', [SessionController::class, 'deleteSession']);
        Route::get('/session/get-session/{sessionName}', [SessionController::class, 'getSession']);

        //blade template
        Route::get('/blade-template/json-string', [BladeTemplateController::class, 'jsonString']);
        Route::get('/blade-template/localization', [BladeTemplateController::class, 'localization']);
        Route::post('/blade-template/change-localization', [BladeTemplateController::class, 'changeLocalization']);
        Route::get('/blade-template/component', [BladeTemplateController::class, 'component']);

        //users
        Route::resource('users',UserController::class);

        //portofolio images
        Route::resource('portfolio-images',PortfolioImageController::class);

        //brands
        Route::resource('brands',BrandController::class); //CRUD (Create, Read, Update, Delete)

        //items
        Route::resource('items',ItemController::class);

        Route::resource('categories',CategoryController::class);

        Route::resource('sales',AdminSaleController::class);

        Route::resource('customers',CustomerController::class);

        Route::resource('customer_sales',CustomerSaleController::class);


    });


});


Route::get('/', [CompanyController::class, 'getCompanyPage']);

Route::prefix('pos')->group(function(){
    Route::get('/', [SaleController::class, 'index']);
    Route::get('/search-item/{itemCode}', [SaleController::class, 'searchItem']);

    Route::get('/sign-in' , [SaleController::class, 'signIn']);
    Route::get('/sign-up' , [SaleController::class, 'signUp']);

    Route::post('/login', [POSAuthController::class, 'login']);

    Route::post('/add-to-cart', [SaleController::class, 'addToCart']);

    Route::post('/empty-cart', [SaleController::class, 'emptyCart']);

    Route::post('/remove-item', [SaleController::class, 'removeItem']);

    Route::post('/checkout', [SaleController::class, 'checkout']);

    Route::get('/cart', [SaleController::class, 'Cart']);

    Route::get('/logout',function() {
        Auth::logout();
        return redirect('/pos');
    });

});


