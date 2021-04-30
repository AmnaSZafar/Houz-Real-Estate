<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\addPropertyController;
use App\Http\Controllers\sellPropertyController;
use App\Http\Controllers\rentPropertyController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;



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

Route::get('/', [addPropertyController::class,'index']);
Auth::routes();

Route::resource('/home', HomeController::class);
Route::get('/rent',[rentPropertyController::class,'index']);
Route::get('/sell',[sellPropertyController::class,'index']);
Route:: post("/search", [searchController::class,'index']);

// Route::get('/admin', [adminController::class, 'index'])->name('admin');
// Route::prefix('admin')->namespace('adminauth')->group(function(){
//    Route::get('/login',function (){
//        return "sad";
//    });
// });

Route::group(['middleware' => ['admin']], function () {
        Route::get('admin', [adminController::class, 'adminView'])->name('admin.view');
        // Route::get('home', function () {
        //     return redirect()->route('admin.view');
        // });
        Route::get('/admin/{name}', [adminController::class,'contentShift']);
});

