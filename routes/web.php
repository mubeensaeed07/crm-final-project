<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\UielementsController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\AdvanceduiController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\IconsController;

// CRM Controllers
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HRMController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\SupervisorAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


// use App\Http\Controllers\Controller;


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

// Route::get('', [Controller::class, 'index']);

// DASHBOARDS //
Route::get('/', [DashboardController::class, 'index'])->middleware(['auth:web,supervisor', 'prevent.back']);
Route::get('index', [DashboardController::class, 'index'])->middleware(['auth:web,supervisor', 'prevent.back']);
Route::get('index2', [DashboardsController::class, 'index2']);
Route::get('index3', [DashboardsController::class, 'index3']);
Route::get('index4', [DashboardsController::class, 'index4']);
Route::get('index5', [DashboardsController::class, 'index5']);
Route::get('index6', [DashboardsController::class, 'index6']);
Route::get('index7', [DashboardsController::class, 'index7']);
Route::get('index8', [DashboardsController::class, 'index8']);
Route::get('index9', [DashboardsController::class, 'index9']);
Route::get('index10', [DashboardsController::class, 'index10']);
Route::get('index11', [DashboardsController::class, 'index11']);
Route::get('index12', [DashboardsController::class, 'index12']);

// PAGES //
Route::get('aboutus', [PagesController::class, 'aboutus']);
Route::get('blog', [PagesController::class, 'blog']);
Route::get('blog-details', [PagesController::class, 'blog_details']);
Route::get('blog-create', [PagesController::class, 'blog_create']);
Route::get('chat', [PagesController::class, 'chat']);
Route::get('contacts', [PagesController::class, 'contacts']);
Route::get('contactus', [PagesController::class, 'contactus']);
Route::get('add-products', [PagesController::class, 'add_products']);
Route::get('cart', [PagesController::class, 'cart']);
Route::get('checkout', [PagesController::class, 'checkout']);
Route::get('edit-products', [PagesController::class, 'edit_products']);
Route::get('order-details', [PagesController::class, 'order_details']);
Route::get('orders', [PagesController::class, 'orders']);
Route::get('products', [PagesController::class, 'products']);
Route::get('products-details', [PagesController::class, 'products_details']);
Route::get('products-list', [PagesController::class, 'products_list']);
Route::get('wishlist', [PagesController::class, 'wishlist']);
Route::get('mail', [PagesController::class, 'mail']);
Route::get('mail-settings', [PagesController::class, 'mail_settings']);
Route::get('empty-page', [PagesController::class, 'empty_page']);
Route::get('faqs', [PagesController::class, 'faqs']);
Route::get('filemanager', [PagesController::class, 'filemanager']);
Route::get('invoice-create', [PagesController::class, 'invoice_create']);
Route::get('invoice-details', [PagesController::class, 'invoice_details']);
Route::get('invoice-list', [PagesController::class, 'invoice_list']);
Route::get('landing', [PagesController::class, 'landing']);
Route::get('landing-jobs', [PagesController::class, 'landing_jobs']);
Route::get('notifications', [PagesController::class, 'notifications']);
Route::get('pricing', [PagesController::class, 'pricing']);
Route::get('profile', [PagesController::class, 'profile']);
Route::get('reviews', [PagesController::class, 'reviews']);
Route::get('teams', [PagesController::class, 'teams']);
Route::get('terms-conditions', [PagesController::class, 'terms_conditions']);
Route::get('timeline', [PagesController::class, 'timeline']);
Route::get('todo-list', [PagesController::class, 'todo_list']);

// TASK //
Route::get('task-kanban-board', [TaskController::class, 'task_kanban_board']);
Route::get('task-listview', [TaskController::class, 'task_listview']);
Route::get('task-details', [TaskController::class, 'task_details']);

// AUTHENTICATION //
Route::get('comingsoon', [AuthenticationController::class, 'comingsoon']);
Route::get('createpassword-basic', [AuthenticationController::class, 'createpassword_basic']);
Route::get('createpassword-cover', [AuthenticationController::class, 'createpassword_cover']);
Route::get('lockscreen-basic', [AuthenticationController::class, 'lockscreen_basic']);
Route::get('lockscreen-cover', [AuthenticationController::class, 'lockscreen_cover']);
Route::get('resetpassword-basic', [AuthenticationController::class, 'resetpassword_basic']);
Route::get('resetpassword-cover', [AuthenticationController::class, 'resetpassword_cover']);
Route::get('signup-basic', [AuthenticationController::class, 'signup_basic']);
Route::get('signup-cover', [AuthenticationController::class, 'signup_cover']);
Route::get('signin-basic', [AuthenticationController::class, 'signin_basic']);
Route::get('signin-cover', [AuthenticationController::class, 'signin_cover']);
Route::get('twostep-verification-basic', [AuthenticationController::class, 'twostep_verification_basic']);
Route::get('twostep-verification-cover', [AuthenticationController::class, 'twostep_verification_cover']);
Route::get('under-maintenance', [AuthenticationController::class, 'under_maintenance']);

// ERROR //
Route::get('error401', [ErrorController::class, 'error401']);
Route::get('error404', [ErrorController::class, 'error404']);
Route::get('error500', [ErrorController::class, 'error500']);

// UI ELEMENTS //
Route::get('alerts', [UielementsController::class, 'alerts']);
Route::get('badges', [UielementsController::class, 'badges']);
Route::get('breadcrumbs', [UielementsController::class, 'breadcrumbs']);
Route::get('buttons', [UielementsController::class, 'buttons']);
Route::get('buttongroups', [UielementsController::class, 'buttongroups']);
Route::get('cards', [UielementsController::class, 'cards']);
Route::get('dropdowns', [UielementsController::class, 'dropdowns']);
Route::get('images-figures', [UielementsController::class, 'images_figures']);
Route::get('listgroups', [UielementsController::class, 'listgroups']);
Route::get('navs-tabs', [UielementsController::class, 'navs_tabs']);
Route::get('object-fit', [UielementsController::class, 'object_fit']);
Route::get('paginations', [UielementsController::class, 'paginations']);
Route::get('popovers', [UielementsController::class, 'popovers']);
Route::get('progress', [UielementsController::class, 'progress']);
Route::get('spinners', [UielementsController::class, 'spinners']);
Route::get('toasts', [UielementsController::class, 'toasts']);
Route::get('tooltips', [UielementsController::class, 'tooltips']);
Route::get('typography', [UielementsController::class, 'typography']);

// UTILITIES //
Route::get('avatars', [UtilitiesController::class, 'avatars']);
Route::get('borders', [UtilitiesController::class, 'borders']);
Route::get('breakpoints', [UtilitiesController::class, 'breakpoints']);
Route::get('colors', [UtilitiesController::class, 'colors']);
Route::get('columns', [UtilitiesController::class, 'columns']);
Route::get('css-grid', [UtilitiesController::class, 'css_grid']);
Route::get('flex', [UtilitiesController::class, 'flex']);
Route::get('gutters', [UtilitiesController::class, 'gutters']);
Route::get('helpers', [UtilitiesController::class, 'helpers']);
Route::get('positions', [UtilitiesController::class, 'positions']);
Route::get('more', [UtilitiesController::class, 'more']);

// FORMS //
Route::get('form-inputs', [FormsController::class, 'form_inputs']);
Route::get('form-check-radios', [FormsController::class, 'form_check_radios']);
Route::get('form-input-groups', [FormsController::class, 'form_input_groups']);
Route::get('form-select', [FormsController::class, 'form_select']);
Route::get('form-range', [FormsController::class, 'form_range']);
Route::get('form-input-masks', [FormsController::class, 'form_input_masks']);
Route::get('form-file-uploads', [FormsController::class, 'form_file_uploads']);
Route::get('form-datetime-pickers', [FormsController::class, 'form_datetime_pickers']);
Route::get('form-color-pickers', [FormsController::class, 'form_color_pickers']);
Route::get('floating-labels', [FormsController::class, 'floating_labels']);
Route::get('form-layouts', [FormsController::class, 'form_layouts']);
Route::get('quill-editor', [FormsController::class, 'quill_editor']);
Route::get('form-validations', [FormsController::class, 'form_validations']);
Route::get('form-select2', [FormsController::class, 'form_select2']);

// ADVANCED UI //
Route::get('accordions-collapse', [AdvanceduiController::class, 'accordions_collapse']);
Route::get('carousel', [AdvanceduiController::class, 'carousel']);
Route::get('draggable-cards', [AdvanceduiController::class, 'draggable_cards']);
Route::get('modals-closes', [AdvanceduiController::class, 'modals_closes']);
Route::get('navbars', [AdvanceduiController::class, 'navbars']);
Route::get('offcanvas', [AdvanceduiController::class, 'offcanvas']);
Route::get('placeholders', [AdvanceduiController::class, 'placeholders']);
Route::get('ratings', [AdvanceduiController::class, 'ratings']);
Route::get('scrollspy', [AdvanceduiController::class, 'scrollspy']);
Route::get('swiperjs', [AdvanceduiController::class, 'swiperjs']);

// WIDGETS //
Route::get('widgets', [WidgetsController::class, 'widgets']);

// APPS //
Route::get('full-calendar', [AppsController::class, 'full_calendar']);
Route::get('gallery', [AppsController::class, 'gallery']);
Route::get('sweet-alerts', [AppsController::class, 'sweet_alerts']);
Route::get('projects-list', [AppsController::class, 'projects_list']);
Route::get('projects-overview', [AppsController::class, 'projects_overview']);
Route::get('projects-create', [AppsController::class, 'projects_create']);
Route::get('job-details', [AppsController::class, 'job_details']);
Route::get('job-company-search', [AppsController::class, 'job_company_search']);
Route::get('job-search', [AppsController::class, 'job_search']);
Route::get('job-post', [AppsController::class, 'job_post']);
Route::get('job-list', [AppsController::class, 'job_list']);
Route::get('job-candidate-search', [AppsController::class, 'job_candidate_search']);
Route::get('job-candidate-details', [AppsController::class, 'job_candidate_details']);
Route::get('nft-marketplace', [AppsController::class, 'nft_marketplace']);
Route::get('nft-details', [AppsController::class, 'nft_details']);
Route::get('nft-create', [AppsController::class, 'nft_create']);
Route::get('nft-wallet-integration', [AppsController::class, 'nft_wallet_integration']);
Route::get('nft-live-auction', [AppsController::class, 'nft_live_auction']);
Route::get('crm-contacts', [AppsController::class, 'crm_contacts']);
Route::get('crm-companies', [AppsController::class, 'crm_companies']);
Route::get('crm-deals', [AppsController::class, 'crm_deals']);
Route::get('crm-leads', [AppsController::class, 'crm_leads']);
Route::get('crypto-transactions', [AppsController::class, 'crypto_transactions']);
Route::get('crypto-currency-exchange', [AppsController::class, 'crypto_currency_exchange']);
Route::get('crypto-buy-sell', [AppsController::class, 'crypto_buy_sell']);
Route::get('crypto-marketcap', [AppsController::class, 'crypto_marketcap']);
Route::get('crypto-wallet', [AppsController::class, 'crypto_wallet']);

// TSBLES //
Route::get('tables', [TablesController::class, 'tables']);
Route::get('grid-tables', [TablesController::class, 'grid_tables']);
Route::get('data-tables', [TablesController::class, 'data_tables']);

// CHARTS //
Route::get('apex-line-charts', [ChartsController::class, 'apex_line_charts']);
Route::get('apex-area-charts', [ChartsController::class, 'apex_area_charts']);
Route::get('apex-column-charts', [ChartsController::class, 'apex_column_charts']);
Route::get('apex-bar-charts', [ChartsController::class, 'apex_bar_charts']);
Route::get('apex-mixed-charts', [ChartsController::class, 'apex_mixed_charts']);
Route::get('apex-rangearea-charts', [ChartsController::class, 'apex_rangearea_charts']);
Route::get('apex-timeline-charts', [ChartsController::class, 'apex_timeline_charts']);
Route::get('apex-candlestick-charts', [ChartsController::class, 'apex_candlestick_charts']);
Route::get('apex-boxplot-charts', [ChartsController::class, 'apex_boxplot_charts']);
Route::get('apex-bubble-charts', [ChartsController::class, 'apex_bubble_charts']);
Route::get('apex-scatter-charts', [ChartsController::class, 'apex_scatter_charts']);
Route::get('apex-heatmap-charts', [ChartsController::class, 'apex_heatmap_charts']);
Route::get('apex-treemap-charts', [ChartsController::class, 'apex_treemap_charts']);
Route::get('apex-pie-charts', [ChartsController::class, 'apex_pie_charts']);
Route::get('apex-radialbar-charts', [ChartsController::class, 'apex_radialbar_charts']);
Route::get('apex-radar-charts', [ChartsController::class, 'apex_radar_charts']);
Route::get('apex-polararea-charts', [ChartsController::class, 'apex_polararea_charts']);
Route::get('chartjs-charts', [ChartsController::class, 'chartjs_charts']);
Route::get('echarts', [ChartsController::class, 'echarts']);
Route::get('chartjs', [ChartsController::class, 'chartjs']);
Route::get('echartjs', [ChartsController::class, 'echartjs']);

// MAPS //
Route::get('google-maps', [MapsController::class, 'google_maps']);
Route::get('leaflet-maps', [MapsController::class, 'leaflet_maps']);
Route::get('vector-maps', [MapsController::class, 'vector_maps']);

// ICONS //
Route::get('icons', [IconsController::class, 'icons']);

// CRM ROUTES //

// Authentication Routes
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Google OAuth Routes - Sign Up
Route::get('auth/google/signup', [GoogleAuthController::class, 'redirectToGoogleSignup'])->name('google.signup');
Route::get('auth/google/signup/callback', [GoogleAuthController::class, 'handleGoogleSignupCallback'])->name('google.signup.callback');

// Google OAuth Routes - Sign In
Route::get('auth/google/signin', [GoogleAuthController::class, 'redirectToGoogleSignin'])->name('google.signin');
Route::get('auth/google/signin/callback', [GoogleAuthController::class, 'handleGoogleSigninCallback'])->name('google.signin.callback');

// Legacy Google OAuth Routes (for backward compatibility)
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogleSignin'])->name('google.login');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleSigninCallback'])->name('google.callback');
Route::get('profile/setup', [GoogleAuthController::class, 'showProfileSetup'])->name('profile.setup');
Route::post('profile/setup', [GoogleAuthController::class, 'completeProfile'])->name('profile.complete');

// Super Admin Routes
Route::middleware(['auth', 'superadmin', 'prevent.back'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');
    Route::post('approve/{id}', [SuperAdminController::class, 'approveAdmin'])->name('approve');
    Route::post('reject/{id}', [SuperAdminController::class, 'rejectAdmin'])->name('reject');
    Route::post('modules', [SuperAdminController::class, 'createModule'])->name('modules.create');
    Route::put('modules/{id}', [SuperAdminController::class, 'updateModule'])->name('modules.update');
    Route::delete('modules/{id}', [SuperAdminController::class, 'deleteModule'])->name('modules.delete');
    Route::get('pending-admins', [SuperAdminController::class, 'getPendingAdmins'])->name('pending.admins');
});

        // Admin Routes
        Route::middleware(['auth', 'admin', 'prevent.back'])->prefix('admin')->name('admin.')->group(function () {
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('users', [AdminController::class, 'users'])->name('users');
            Route::get('modules', [AdminController::class, 'modules'])->name('modules');
            Route::get('settings', [AdminController::class, 'settings'])->name('settings');
            Route::get('profile', [AdminController::class, 'profile'])->name('profile');
            Route::post('profile', [AdminController::class, 'updateProfile'])->name('profile.update');
            Route::get('logs', [App\Http\Controllers\LogsController::class, 'adminLogs'])->name('logs');
            Route::post('users', [AdminController::class, 'addUser'])->name('users.add');
            Route::get('users/api', [AdminController::class, 'getUsers'])->name('users.get');
            Route::get('users/{id}/edit', [AdminController::class, 'showEditUser'])->name('users.edit.show');
            
            // Supervisor Management Routes
            Route::resource('supervisors', SupervisorController::class);
            Route::post('supervisors/{id}/reset-password', [SupervisorController::class, 'resetPassword'])->name('supervisors.reset-password');
            
            // Department Management Routes
            Route::resource('departments', App\Http\Controllers\DepartmentController::class);
            Route::get('departments-api', [App\Http\Controllers\DepartmentController::class, 'getDepartments'])->name('departments.api');
            
            // User management routes with ownership middleware
            Route::middleware(['admin.user.ownership'])->group(function () {
                Route::put('users/{id}', [AdminController::class, 'editUser'])->name('users.edit');
                Route::delete('users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');
                Route::post('users/{id}/reset-password', [AdminController::class, 'resetUserPassword'])->name('users.reset-password');
            });
        });

// User Routes
Route::middleware(['auth', 'prevent.back'])->prefix('user')->name('user.')->group(function () {
    Route::get('logs', [App\Http\Controllers\LogsController::class, 'userLogs'])->name('logs');
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('module/{id}', [UserController::class, 'showModule'])->name('module');
    Route::get('modules', [UserController::class, 'getMyModules'])->name('modules');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::put('profile', [UserController::class, 'updateProfile'])->name('profile.update');
});

// Supervisor Routes
Route::middleware(['auth:supervisor', 'prevent.back'])->prefix('supervisor')->name('supervisor.')->group(function () {
    Route::get('dashboard', [SupervisorAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [SupervisorAuthController::class, 'profile'])->name('profile');
    Route::put('profile', [SupervisorAuthController::class, 'updateProfile'])->name('profile.update');
    Route::get('module/{module}', [SupervisorAuthController::class, 'module'])->name('module');
    Route::get('logs', [App\Http\Controllers\LogsController::class, 'supervisorLogs'])->name('logs');
    Route::post('logout', [SupervisorAuthController::class, 'logout'])->name('logout');
});

// Module Routes
Route::middleware(['auth:web,supervisor', 'prevent.back'])->group(function () {
    // HRM Module Routes (from Modules/HRM)
    Route::prefix('hrm')->name('hrm.')->group(function () {
        Route::get('/', 'Modules\HRM\Http\Controllers\HRMController@dashboard')->name('dashboard');
        Route::get('/employees', 'Modules\HRM\Http\Controllers\HRMController@employees')->name('employees');
        Route::get('/departments', 'Modules\HRM\Http\Controllers\HRMController@departments')->name('departments');
        Route::get('/attendance', 'Modules\HRM\Http\Controllers\HRMController@attendance')->name('attendance');
        Route::get('/payroll', 'Modules\HRM\Http\Controllers\HRMController@payroll')->name('payroll');
        
        // User Management Routes
        Route::get('/users/create', 'Modules\HRM\Http\Controllers\HRMController@createUser')->name('users.create');
        Route::post('/users', 'Modules\HRM\Http\Controllers\HRMController@storeUser')->name('users.store');
        Route::get('/users', 'Modules\HRM\Http\Controllers\HRMController@users')->name('users.index');
        
        // Employee Management Routes
        Route::get('/users/{id}/view', 'Modules\HRM\Http\Controllers\HRMController@viewUser')->name('users.view');
        Route::get('/users/{id}/edit', 'Modules\HRM\Http\Controllers\HRMController@editUser')->name('users.edit');
        Route::put('/users/{id}', 'Modules\HRM\Http\Controllers\HRMController@updateUser')->name('users.update');
        Route::delete('/users/{id}', 'Modules\HRM\Http\Controllers\HRMController@deleteUser')->name('users.delete');
    });

    // SUPPORT Module Routes (from Modules/SUPPORT)
    Route::prefix('support')->name('support.')->group(function () {
        Route::get('/', 'Modules\SUPPORT\Http\Controllers\SUPPORTController@dashboard')->name('dashboard');
        Route::get('/user', 'Modules\SUPPORT\Http\Controllers\SUPPORTController@userSupport')->name('user');
        Route::get('/dealer', 'Modules\SUPPORT\Http\Controllers\SUPPORTController@dealerSupport')->name('dealer');
        Route::post('/search-users', 'Modules\SUPPORT\Http\Controllers\SUPPORTController@searchUsers')->name('search.users');
        Route::post('/search-dealers', 'Modules\SUPPORT\Http\Controllers\SUPPORTController@searchDealers')->name('search.dealers');
        Route::get('/user/{id}', 'Modules\SUPPORT\Http\Controllers\SUPPORTController@showUser')->name('user.show');
        Route::get('/dealer/{id}', 'Modules\SUPPORT\Http\Controllers\SUPPORTController@showDealer')->name('dealer.show');
    });

    // FINANCE Module Routes (from Modules/FINANCE)
    Route::prefix('finance')->name('finance.')->group(function () {
        Route::get('/', 'Modules\FINANCE\Http\Controllers\FINANCEController@dashboard')->name('dashboard');
        Route::get('/accounts', 'Modules\FINANCE\Http\Controllers\FINANCEController@accounts')->name('accounts');
        Route::get('/transactions', 'Modules\FINANCE\Http\Controllers\FINANCEController@transactions')->name('transactions');
        Route::get('/budgets', 'Modules\FINANCE\Http\Controllers\FINANCEController@budgets')->name('budgets');
        Route::get('/reports', 'Modules\FINANCE\Http\Controllers\FINANCEController@reports')->name('reports');
        
        // Salary Management Routes
        Route::get('/salaries', 'Modules\FINANCE\Http\Controllers\FINANCEController@salaries')->name('salaries');
        Route::post('/salaries/{userId}/mark-paid', 'Modules\FINANCE\Http\Controllers\FINANCEController@markPaid')->name('salaries.mark-paid');
        Route::post('/salaries/{userId}/mark-pending', 'Modules\FINANCE\Http\Controllers\FINANCEController@markPending')->name('salaries.mark-pending');
        
        // User Management Routes
        Route::get('/users/create', 'Modules\FINANCE\Http\Controllers\FINANCEController@createUser')->name('users.create');
        Route::post('/users', 'Modules\FINANCE\Http\Controllers\FINANCEController@storeUser')->name('users.store');
        Route::get('/users', 'Modules\FINANCE\Http\Controllers\FINANCEController@users')->name('users.index');
    });
});

// Debug Route
Route::get('debug', function () {
    return view('debug');
})->name('debug');

// Debug Google OAuth Route
Route::get('debug-google', function () {
    $user = Auth::user();
    if ($user) {
        return response()->json([
            'user_id' => $user->id,
            'email' => $user->email,
            'name' => $user->full_name,
            'is_approved' => $user->is_approved,
            'role_id' => $user->role_id,
            'password_is_google' => $user->password === 'google_oauth_user',
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'session_id' => session()->getId(),
            'auth_check' => Auth::check()
        ]);
    } else {
        return response()->json(['message' => 'No user logged in', 'auth_check' => Auth::check()]);
    }
})->name('debug-google');

// Debug User Account Route
Route::get('debug-account/{email}', function ($email) {
    $user = \App\Models\User::where('email', $email)->first();
    $supervisor = \App\Models\Supervisor::where('email', $email)->first();
    
    return response()->json([
        'email' => $email,
        'user_exists' => $user ? true : false,
        'supervisor_exists' => $supervisor ? true : false,
        'user_data' => $user ? [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->full_name,
            'is_approved' => $user->is_approved,
            'role_id' => $user->role_id,
            'password_type' => $user->password === 'google_oauth_user' ? 'google_oauth' : 'regular',
            'created_at' => $user->created_at
        ] : null,
        'supervisor_data' => $supervisor ? [
            'id' => $supervisor->id,
            'email' => $supervisor->email,
            'name' => $supervisor->full_name,
            'status' => $supervisor->status,
            'created_at' => $supervisor->created_at
        ] : null
    ]);
})->name('debug-account');

// Debug All Users Route
Route::get('debug-all-users', function () {
    try {
        $users = \App\Models\User::all(['id', 'email', 'first_name', 'last_name', 'is_approved', 'role_id']);
        $supervisors = \App\Models\Supervisor::all(['id', 'email', 'first_name', 'last_name', 'status']);
        
        return response()->json([
            'users' => $users->toArray(),
            'supervisors' => $supervisors->toArray(),
            'total_users' => $users->count(),
            'total_supervisors' => $supervisors->count()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'users' => [],
            'supervisors' => []
        ]);
    }
})->name('debug-all-users');

// Debug Database Tables Route
Route::get('debug-tables', function () {
    try {
        $tables = \DB::select('SHOW TABLES');
        $tableNames = array_map(function($table) {
            return array_values((array)$table)[0];
        }, $tables);
        
        return response()->json([
            'tables' => $tableNames,
            'total_tables' => count($tableNames)
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'tables' => []
        ]);
    }
})->name('debug-tables');

// Debug All Modules Route
Route::get('debug-modules', function () {
    $modules = \App\Models\Module::all();
    return response()->json([
        'modules' => $modules->toArray(),
        'total_modules' => $modules->count()
    ]);
})->name('debug-modules');

// Debug Users Table Structure Route
Route::get('debug-users-structure', function () {
    $columns = Schema::getColumnListing('users');
    $users = \App\Models\User::all(['id', 'first_name', 'last_name', 'email']);
    return response()->json([
        'columns' => $columns,
        'users' => $users->toArray()
    ]);
})->name('debug-users-structure');

// Debug Supervisor HRM Permission Route (No Auth Required)
Route::get('debug-supervisor-hrm', function () {
    $supervisor = \App\Models\Supervisor::find(2);
    if (!$supervisor) {
        return response()->json(['error' => 'Supervisor not found']);
    }
    
    // Test permission logic directly without authentication
    $hrmModule = $supervisor->modules()->where('id', 1)->first();
    $hasHRMModule = $supervisor->modules()->where('id', 1)->exists();
    
    return response()->json([
        'supervisor_id' => $supervisor->id,
        'email' => $supervisor->email,
        'status' => $supervisor->status,
        'has_hrm_module' => $hasHRMModule,
        'hrm_module_details' => $hrmModule ? [
            'id' => $hrmModule->id,
            'name' => $hrmModule->name,
            'pivot' => $hrmModule->pivot ? $hrmModule->pivot->toArray() : null
        ] : null,
        'can_view_reports' => $supervisor->hasPermission(1, 'can_view_reports'),
        'can_create_users' => $supervisor->hasPermission(1, 'can_create_users'),
        'can_edit_users' => $supervisor->hasPermission(1, 'can_edit_users'),
        'can_delete_users' => $supervisor->hasPermission(1, 'can_delete_users'),
        'all_modules' => $supervisor->modules()->get(['id', 'name'])->toArray(),
        'all_modules_with_pivot' => $supervisor->modules()->get()->map(function($module) {
            return [
                'id' => $module->id,
                'name' => $module->name,
                'pivot' => $module->pivot ? $module->pivot->toArray() : null
            ];
        })->toArray()
    ]);
})->name('debug-supervisor-hrm');

// Debug HRM Module Route
Route::get('debug-hrm-module', function () {
    $hrmModule = \App\Models\Module::where('name', 'HRM')->first();
    return response()->json([
        'hrm_module' => $hrmModule ? [
            'id' => $hrmModule->id,
            'name' => $hrmModule->name,
            'description' => $hrmModule->description
        ] : null,
        'all_modules' => \App\Models\Module::all(['id', 'name'])
    ]);
})->name('debug-hrm-module');

// Test Email Route
Route::get('test-email', function () {
    try {
        $user = \App\Models\User::first();
        if (!$user) {
            return response()->json(['error' => 'No users found']);
        }
        
        \Mail::to($user->email)->send(new \App\Mail\UserRegisteredMail(
            $user, 
            'test123',
            'Test Admin'
        ));
        
        return response()->json([
            'success' => true,
            'message' => 'Test email sent successfully',
            'user_email' => $user->email
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
    }
})->name('test-email');

// Debug Supervisor HRM Access Route
Route::get('debug-supervisor-hrm', function () {
    $supervisor = Auth::guard('supervisor')->user();
    if (!$supervisor) {
        return response()->json(['error' => 'No supervisor logged in']);
    }
    
    $hrmModule = \App\Models\Module::where('name', 'HRM')->first();
    $supervisorModules = $supervisor->modules()->get();
    $hrmPermission = $supervisor->modules()->where('module_id', 5)->first();
    
    return response()->json([
        'supervisor' => [
            'id' => $supervisor->id,
            'name' => $supervisor->full_name,
            'email' => $supervisor->email,
            'admin_id' => $supervisor->admin_id
        ],
        'hrm_module' => $hrmModule ? [
            'id' => $hrmModule->id,
            'name' => $hrmModule->name
        ] : null,
        'supervisor_modules' => $supervisorModules->pluck('name', 'id')->toArray(),
        'hrm_permission' => $hrmPermission ? $hrmPermission->pivot->toArray() : null,
        'has_hrm_access' => $hrmPermission ? true : false,
        'permission_tests' => [
            'can_view_reports' => $supervisor->hasPermission(5, 'can_view_reports'),
            'can_create_users' => $supervisor->hasPermission(5, 'can_create_users'),
            'can_edit_users' => $supervisor->hasPermission(5, 'can_edit_users'),
            'can_delete_users' => $supervisor->hasPermission(5, 'can_delete_users')
        ]
    ]);
})->middleware(['auth:supervisor'])->name('debug-supervisor-hrm');

// Debug Supervisor Route
Route::get('debug-supervisor', function () {
    $webUser = Auth::user();
    $supervisorUser = Auth::guard('supervisor')->user();
    
    $result = [
        'web_user' => $webUser ? $webUser->toArray() : null,
        'supervisor_user' => $supervisorUser ? $supervisorUser->toArray() : null,
        'is_supervisor' => $supervisorUser ? true : false,
    ];
    
    if ($supervisorUser) {
        $users = \App\Models\User::where('admin_id', $supervisorUser->admin_id)->get();
        $result['users_for_supervisor'] = $users->pluck('id', 'first_name')->toArray();
        $result['users_count'] = $users->count();
        
        // Check HRM module permissions
        $hrmModule = \App\Models\Module::where('name', 'HRM')->first();
        if ($hrmModule) {
            $hrmPermission = $supervisorUser->modules()->where('module_id', $hrmModule->id)->first();
            $result['hrm_module_id'] = $hrmModule->id;
            $result['hrm_permission'] = $hrmPermission ? $hrmPermission->pivot->toArray() : null;
            $result['has_hrm_access'] = $hrmPermission ? true : false;
        }
    }
    
    return response()->json($result);
})->middleware(['auth:web,supervisor'])->name('debug-supervisor');

// Debug supervisor dashboard route
Route::get('debug-supervisor-dashboard', function () {
    $supervisorUser = Auth::guard('supervisor')->user();
    $webUser = Auth::user();
    
    return response()->json([
        'supervisor_authenticated' => $supervisorUser ? true : false,
        'web_authenticated' => $webUser ? true : false,
        'supervisor_id' => $supervisorUser ? $supervisorUser->id : null,
        'supervisor_email' => $supervisorUser ? $supervisorUser->email : null,
        'route_exists' => route('supervisor.dashboard'),
        'can_access_dashboard' => $supervisorUser ? true : false
    ]);
})->middleware(['auth:web,supervisor'])->name('debug-supervisor-dashboard');

// Debug permission check
Route::get('debug-permission', function () {
    $supervisorUser = Auth::guard('supervisor')->user();
    $webUser = Auth::user();
    
    $canCreateUsers = false;
    if ($supervisorUser) {
        $canCreateUsers = hasPermission(1, 'can_create_users');
    }
    
    return response()->json([
        'supervisor_authenticated' => $supervisorUser ? true : false,
        'web_authenticated' => $webUser ? true : false,
        'can_create_users' => $canCreateUsers,
        'supervisor_id' => $supervisorUser ? $supervisorUser->id : null,
        'supervisor_email' => $supervisorUser ? $supervisorUser->email : null,
        'permission_check_result' => $canCreateUsers
    ]);
})->middleware(['auth:web,supervisor'])->name('debug-permission');
