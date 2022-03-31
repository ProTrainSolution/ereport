<?php

use App\Models\Role;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KpiTypeController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\ScorecardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KpiActivityController;
use App\Http\Controllers\LineManagerController;
use App\Http\Controllers\TaskActivityController;
use App\Http\Controllers\KpiDepartmentController;
use App\Http\Controllers\OtherActivityController;
use App\Http\Controllers\OverallActivityController;



//use App\Http\Controllers\AdminRoleController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// to set multiple login


// check user if login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// auto dropdown
Route::post('users/getState', [UserController::class, 'getState']);
Route::get('kpiactivities/getCategory/{id}', [KpiActivityController::class, 'getCategory']);

//Route::get('users/{id}', [UserController::class, 'show']);

//Route::resource('roles', AdminRoleController::class)->middleware('auth');

// untuk admin user
// test sent email

// untuk line manager
Route::group(['middleware' => ['auth']], function() {
    Route::get('/users/team', [UserController::class, 'team']); // view team KPI
    Route::get('/users/pizza/{id}', [UserController::class, 'pizza']); // view individual KPI
    Route::get('/users/kpidetail/{id}', [UserController::class, 'kpidetail']); // view KPI detail

    // send email
    Route::get('/users/send_email', [UserController::class, 'send_email']);
    Route::post('/users/send', [UserController::class, 'send']);


    // ----------------- TASK ACTIVITIES ----------------------
    // create new task activity daily
    Route::get('/taskactivities/createdaily', [TaskActivityController::class, 'createdaily']);
    Route::post('/taskactivities/storedaily', [TaskActivityController::class, 'storedaily']);
    Route::get('/taskactivities/editdaily/{id}', [TaskActivityController::class, 'editdaily']);
    Route::put('/taskactivities/updatedaily', [TaskActivityController::class, 'updatedaily']);

    // create new task activity weekly
    Route::get('/taskactivities/createweekly', [TaskActivityController::class, 'createweekly']);
    Route::post('/taskactivities/storeweekly', [TaskActivityController::class, 'storeweekly']);
    Route::get('/taskactivities/editweekly/{id}', [TaskActivityController::class, 'editweekly']);
    Route::put('/taskactivities/updateweekly', [TaskActivityController::class, 'updateweekly']);

    // ----------------- KPI ACTIVITIES ----------------------
    // create new kpi activity daily
    Route::get('/kpiactivities/createdaily', [KpiActivityController::class, 'createdaily']);
    Route::post('/kpiactivities/storedaily', [KpiActivityController::class, 'storedaily']);
    Route::get('/kpiactivities/editdaily/{id}', [KpiActivityController::class, 'editdaily']);
    Route::put('/kpiactivities/updatedaily', [KpiActivityController::class, 'updatedaily']);

    Route::get('/kpiactivities/createweekly', [KpiActivityController::class, 'createweekly']);
    Route::post('/kpiactivities/storeweekly', [KpiActivityController::class, 'storeweekly']);
    Route::get('/kpiactivities/editweekly/{id}', [KpiActivityController::class, 'editweekly']);
    Route::put('/kpiactivities/updateweekly', [KpiActivityController::class, 'updateweekly']);

    // ----------------- OTHER ACTIVITIES ----------------------
    // other weekly activity
    Route::get('/otheractivities/createdaily', [OtherActivityController::class, 'createdaily']);
    Route::post('/otheractivities/storedaily', [OtherActivityController::class, 'storedaily']);
    Route::get('/otheractivities/editdaily/{id}', [OtherActivityController::class, 'editdaily']);
    Route::put('/otheractivities/updatedaily', [OtherActivityController::class, 'updatedaily']);

    // other weekly activity
    Route::get('/otheractivities/createweekly', [OtherActivityController::class, 'createweekly']);
    Route::post('/otheractivities/storeweekly', [OtherActivityController::class, 'storeweekly']);
    Route::get('/otheractivities/editweekly/{id}', [OtherActivityController::class, 'editweekly']);
    Route::put('/otheractivities/updateweekly', [OtherActivityController::class, 'updateweekly']);



    Route::get('/tasks', [TaskController::class, 'index']);

    Route::resource('roles', RoleController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('units', UnitController::class);
    Route::resource('scorecards', ScorecardController::class);
    Route::resource('kpitypes', KpiTypeController::class);
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('kpidepartments', KpiDepartmentController::class);
    Route::resource('taskactivities', TaskActivityController::class);
    Route::resource('kpiactivities', KpiActivityController::class);
    Route::resource('otheractivities', OtherActivityController::class);
    Route::resource('overallactivities', OverallActivityController::class);

    Route::get('/kpis/individual', [KpiController::class, 'individual']); // view individual KPI
    Route::get('/kpis/showkpi', [KpiController::class, 'showkpi']); // view individual KPI


    Route::post('/kpis/storeindividual', [KpiController::class, 'storeindividual']); // store individual KPI
    Route::resource('kpis', KpiController::class);

    // manage dashboard
    //Route::resource('linemanagers', [LineManagerController::class]);



}); // close admin midddleware




