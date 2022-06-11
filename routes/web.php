<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\TeacherController;
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

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {

        Route::get('login'           , [AdminController::class, 'login'])
            ->name('login');

        Route::get('register'        , [AdminController::class, 'register'])
            ->name('register');

        Route::post('login/store'    , [AdminController::class, 'storeLogin'])
            ->name('store.login');

        Route::post('register/store' , [AdminController::class, 'storeRegister'])
            ->name('store.register');
    });




    Route::middleware('auth:admin')->group(function () {

            // Start Admin
        Route::get('dashboard'                , [AdminController::class, 'dashboard'])
            ->name('dashboard');

            Route::post('logout'                , [AdminController::class, 'destroy'])
            ->name('logout');
            // End Admin


            // Start CRUD Grade
        Route::get('grades'                   , [GradeController::class, 'grades'])
            ->name('grades');

        Route::get('grade/create'             , [GradeController::class, 'gradeCreate'])
            ->name('grade.create');

        Route::post('grade/store'             , [GradeController::class, 'storeGrade'])
            ->name('grade.store');

            Route::get('grade/{id}/edit'      , [GradeController::class, 'gradeEdit'])
            ->name('grade.edit');

            Route::put('grade/{id}/update'    , [GradeController::class, 'gradeUpdate'])
            ->name('grade.update');

            Route::delete('grade/{id}/delete' , [GradeController::class, 'gradeDestroy'])
            ->name('grade.delete');
            // End CRUD Grade




            // Start CRUD Teachers
        Route::get('teachers'                   , [TeacherController::class, 'teachers'])
        ->name('teachers');

        Route::get('teachers/create'             , [TeacherController::class, 'teachersCreate'])
            ->name('teachers.create');

        Route::post('teachers/store'             , [TeacherController::class, 'storeTeachers'])
            ->name('teachers.store');

            Route::get('teachers/{id}/edit'      , [TeacherController::class, 'teachersEdit'])
            ->name('teachers.edit');

            Route::put('teachers/{id}/update'    , [TeacherController::class, 'teachersUpdate'])
            ->name('teachers.update');

            Route::delete('teachers/{id}/delete' , [TeacherController::class, 'teachersDestroy'])
            ->name('teachers.delete');
            // End CRUD Teachers



              // Start CRUD Room_Type
        Route::get('roomtypes'                   , [RoomtypeController::class, 'roomtypes'])
        ->name('roomtypes');

        Route::get('room/type/create'             , [RoomtypeController::class, 'roomtypesCreate'])
            ->name('roomtypes.create');

        Route::post('room/type/store'             , [RoomtypeController::class, 'roomtypesStore'])
            ->name('roomtypes.store');

            Route::get('room/type/{id}/edit'      , [RoomtypeController::class, 'roomtypesEdit'])
            ->name('roomtypes.edit');

            Route::put('room/type/{id}/update'    , [RoomtypeController::class, 'roomtypesUpdate'])
            ->name('roomtypes.update');

            Route::delete('room/type/{id}/delete' , [RoomtypeController::class, 'roomtypesDestroy'])
            ->name('roomtypes.delete');
            // End CRUD Room_Type


            // Start CRUD Room
        Route::get('rooms'                   , [RoomController::class, 'rooms'])
        ->name('rooms');

        Route::get('room/create'             , [RoomController::class, 'roomCreate'])
            ->name('room.create');

        Route::post('room/store'             , [RoomController::class, 'roomStore'])
            ->name('room.store');

            Route::get('room/{id}/edit'      , [RoomController::class, 'roomEdit'])
            ->name('room.edit');

            Route::put('room/{id}/update'    , [RoomController::class, 'roomUpdate'])
            ->name('room.update');

            Route::delete('room/{id}/delete' , [RoomController::class, 'roomDestroy'])
            ->name('room.delete');
            // End CRUD Room




            // Start CRUD reservations
        Route::get('reservations'                   , [ReservationController::class, 'reservations'])
            ->name('reservations');

        Route::get('reservation/create'             , [ReservationController::class, 'reservationCreate'])
            ->name('reservation.create');

        Route::post('reservation/store'             , [ReservationController::class, 'reservationStore'])
            ->name('reservation.store');

        Route::get('reservation/{id}/edit'      , [ReservationController::class, 'reservationEdit'])
            ->name('reservation.edit');

        Route::put('reservation/{id}/update'    , [ReservationController::class, 'reservationUpdate'])
            ->name('reservation.update');

        Route::delete('reservation/{id}/delete' , [ReservationController::class, 'reservationDestroy'])
            ->name('reservation.delete');
            // End CRUD reservations


            // Start CRUD Materials
        Route::get('materials'                   , [MaterialController::class, 'materials'])
            ->name('materials');

        Route::get('material/create'             , [MaterialController::class, 'materialCreate'])
            ->name('material.create');

        Route::post('material/store'             , [MaterialController::class, 'materialStore'])
            ->name('material.store');

        Route::get('material/{id}/edit'          , [MaterialController::class, 'materialEdit'])
            ->name('material.edit');

        Route::put('material/{id}/update'        , [MaterialController::class, 'materialUpdate'])
            ->name('material.update');

        Route::delete('material/{id}/delete'     , [MaterialController::class, 'materialDestroy'])
            ->name('material.delete');
            // End CRUD Materials

    });

});
