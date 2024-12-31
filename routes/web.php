<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\OtherController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\PlanPricingController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\UpdateOpShopController;
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


Route::get('/', [AuthController::class, 'user_login']);

Route::get('/admin', [AuthController::class, 'login']);


Route::get('/login', [AuthController::class, 'user_login'])->name('user.login');
Route::post('/login', [AuthController::class, 'checkLoginMobile'])->name('user.checkLoginMobile');
Route::get('/verify-code', [AuthController::class, 'verifyCode'])->name('user.verifyCode');
Route::post('/verify-code', [AuthController::class, 'checkVerifyCode'])->name('user.checkVerifyCode');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register_vendor', [AuthController::class, 'vendor_register']);
Route::get('/forgotpassword', [AuthController::class, 'forgot_password']);
Route::post('/sendpassword', [AuthController::class, 'send_password']);
Route::post('/checklogin-{logintype}', [AuthController::class, 'check_admin_login']);
Route::get('/termscondition', [UserController::class, 'termscondition']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/verify', function () {
    return view('admin.auth.verify');
});

Route::post('systemverification', [AuthController::class, 'systemverification'])->name('admin.systemverification');

//Login with Google
Route::get('login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('checklogin/google/callback-{logintype}', [AuthController::class, 'check_admin_login']);

// for facebook
Route::get('login/facebook', [AuthController::class, 'redirectToFacebook']);
Route::get('checklogin/facebook/callback-{logintype}', [AuthController::class, 'check_admin_login']);

// for share link of content
Route::get('/share/content-{id}', [OtherController::class, 'sharecontent']);
Route::get('/generatepdf-{id}', [HomeController::class, 'generatepdf']);
Route::get('/generatewordfile-{id}', [HomeController::class, 'generateword']);

Route::group(['middleware' => 'adminmiddleware'], function () {
    Route::group(['prefix' => 'admin','as' => 'admin.'], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('index');
        Route::get('/logout', [HomeController::class, 'logout']);
        // users
        Route::group(['prefix' => 'users'], function () {
            Route::get('', [UserController::class, 'view_users']);
            Route::get('/edit-{slug}', [UserController::class, 'add']);
            Route::get('/edit-{slug}', [UserController::class, 'edit']);
            Route::post('/editprofile', [UserController::class, 'edit_vendorprofile']);
            Route::get('/status-{slug}/{status}', [UserController::class, 'change_status']);
        });

        // plan
        Route::group(['prefix' => 'plan'], function () {
            Route::get('', [PlanPricingController::class, 'view_plan']);
            Route::get('/add', [PlanPricingController::class, 'add_plan']);
            Route::post('/save_plan', [PlanPricingController::class, 'save_plan']);
            Route::get('/edit-{id}', [PlanPricingController::class, 'edit_plan']);
            Route::post('/update_plan-{id}', [PlanPricingController::class, 'update_plan']);
            Route::get('/status_change-{id}/{status}', [PlanPricingController::class, 'status_change']);
            Route::get('/delete-{id}', [PlanPricingController::class, 'delete']);
        });

        // payment
        Route::group(['prefix' => 'payment'], function () {
            Route::get('', [PaymentController::class, 'index']);
            Route::post('/update', [PaymentController::class, 'update']);
        });

        // transaction
        Route::get('/transaction', [TransactionController::class, 'index']);
        Route::get('/transaction-{id}-{status}', [TransactionController::class, 'status']);

        // contacts
        Route::get('/contacts', [OtherController::class, 'contacts']);

        // settings
        Route::get('/settings', [SettingsController::class, 'index']);
        Route::post('/add', [SettingsController::class, 'store']);
        Route::post('/edit-profile', [UserController::class, 'edit_vendorprofile']);
        Route::post('/change-password', [UserController::class, 'edit_password']);
        Route::post('/set-api-ai', [SettingsController::class, 'set_api_ai']);
        Route::post('/sms-setting-panel', [SettingsController::class, 'sms_setting_panel']);
        Route::post('/og_image', [SettingsController::class, 'save_seo']);
        Route::post('/trackinginfo', [SettingsController::class, 'trackinginfo']);

        // other pages
        Route::get('/aboutus', [OtherController::class, 'aboutus']);
        Route::post('/aboutus/update', [OtherController::class, 'update_aboutus']);
        Route::get('/privacypolicy', [OtherController::class, 'privacypolicy']);
        Route::post('/privacypolicy/update', [OtherController::class, 'update_privacypolicy']);
        Route::get('/termscondition', [OtherController::class, 'termscondition']);
        Route::post('/termscondition/update', [OtherController::class, 'update_terms']);



    });
});

Route::middleware('MaintanaceMiddleware')->group(function () {
    Route::group(['middleware' => 'AuthMiddleware'], function () {
        Route::get('/index', [HomeController::class, 'index']);
        Route::get('/content-{slug}', [HomeController::class, 'contentpage']);
        Route::post('/generate', [HomeController::class, 'generate']);
        Route::get('/alltools', [HomeController::class, 'alltools']);
        Route::get('/mycontent', [HomeController::class, 'my_content']);
        Route::get('/mycontent/contentdetail-{id}', [HomeController::class, 'contentdetail']);
        Route::post('/content/save', [HomeController::class, 'save_content']);


        // plans
        Route::get('/plan', [PlanPricingController::class, 'view_plan']);
        Route::get('/plan/selectplan-{id}', [PlanPricingController::class, 'select_plan']);
        Route::post('/plan/buyplan', [PlanPricingController::class, 'buyplan']);
        Route::post('/plan/buyplan/zarinpal', [PlanPricingController::class, 'buyplanZarinpal']);
        Route::post('/plan/buyplan/mercadorequest', [PlanPricingController::class, 'mercadorequest']);
        Route::get('/plan/buyplan/mercadorequest/success', [PlanPricingController::class, 'success']);
        Route::get('/plan/buyplan/zarinpal-verify', [PlanPricingController::class, 'zarinpal_verify']);

        // edit profile
        Route::get('/edit-{slug}', [UserController::class, 'edit']);
        Route::post('/editprofile', [UserController::class, 'edit_vendorprofile']);

        //  changepassword
        Route::get('/changepassword', [UserController::class, 'change_password']);
        Route::post('/edit_password', [UserController::class, 'edit_password']);

        // transaction
        Route::get('/transactions', [TransactionController::class, 'index']);

        // contact
        Route::get('/contactus', [OtherController::class, 'index']);
        Route::post('/savecontact', [OtherController::class, 'save']);

        // other pages
        Route::get('/aboutus', [UserController::class, 'aboutus']);
        Route::get('/privacypolicy', [UserController::class, 'privacypolicy']);

        // Route::post('/lightdark', [OtherController::class, 'lightdark']);
        Route::get('/lightdark-{theme}', [OtherController::class, 'darkmode']);
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




