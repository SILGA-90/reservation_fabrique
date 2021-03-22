<?php


use App\Http\Controllers\day_interval;
use App\Http\Controllers\Param_day_hour;
// use App\Http\Controllers\mailController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\usersController;
// use App\Models\User;
use App\Http\Controllers\EmailConfigurationController;
use App\Http\Controllers\DevPageController;





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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post("configuration", [EmailConfigurationController::class, "createConfiguration"])->name("configuration.store");

Route::get("/email", [EmailConfigurationController::class, "composeEmail"])->name('email');

Route::post('/sendEmail', [EmailConfigurationController::class, 'sendEmail'])->name('sendEmail');

// Route::get('/parametre', [day_interval::class, 'index']);

Route::post('/parametre',  [day_interval::class, 'insertion'])->name('parametre');

Route::get('/parametre',  [day_interval::class, 'showDate']);


// Route::get('/parametre', [Param_day_hour::class, 'index']);

Route::post('/parametre',  [Param_day_hour::class, 'insertion'])->name('parametre');

Route::get('/informer', [EmailConfigurationController::class, 'index']);

Route::post("/informer", [EmailConfigurationController::class, "createConfiguration"])->name("configuration.store");

// Route::get('/devPage', [DevPageController::class, 'index']);

Route::get("/devPage", [DevPageController::class, 'showDate']);

Route::post("/devPage", [DevPageController::class, 'insertion'])->name('reserve');












// Route::get('/time', function(){

//     $dt = new Carbon();
//     echo $dt;
//     echo"<br>";
//     echo $dt->today();
//     echo "<br>";
//     echo $dt->tomorrow();
//     echo "<br>";
//     echo $dt->yesterday();
//     echo "<br>";
//     echo $dt->diffForHumans();
//     echo "<br>";

//     $newYear = new Carbon('First day of March 2021');
//     echo $newYear->diffForHumans();

    // More control over the time

    //    echo Carbon::createFromDate(2018, 9, 4, 12, 45, 5, 'US/Central');
    //     echo "<br>";
    //    echo Carbon::create(2018, 9, 4, 12, 45, 5, 'US/Central');

    // GUETTERS AND SETTERS

    // echo "<br>";
    // $dt->year = 2025;
    // echo $dt->year;
    // echo "<br>";
    // echo $dt->second;
    // echo "<br>";
    // echo $dt->daysInMonth;
    // echo "<br>";

    // FORMATTING

    // echo $dt->toDayDateTimeString();
    // echo "<br>";
    // echo $dt->toFormattedDateString();
    // echo "<br>";
    // echo $dt->format('j F Y, G:i');

    // echo "<br>";

    // SOME HUMAN READABLE

    // $dt = Carbon::now();
    // $past = $dt->subMonth()->diffForHumans();
    // echo $past;
    // echo $dt->addMonth()->diffForHumans();
    // echo "<br>";
// });

