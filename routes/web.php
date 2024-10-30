<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('test',function () {
//    dispatch(function (){
//     logger('hello from the queue');
//    }); //dispatch queue in this way or we can created dedicated class

    $job = Job::first();
    TranslateJob::dispatch($job);

});


Route::view('/','home');
Route::view('/contact','contact');

Route::controller(JobController::class)->group(function(){
    Route::get('/jobs/create','create')->middleware('auth');
    Route::post('/jobs', 'store')->middleware('auth');
    Route::get('/jobs', 'index');
    Route::get('/jobs/{job}', 'show');
    // Route::get('/jobs/{job}/edit', 'edit')->middleware(['can:edit-job,job']); //job after edit-job gate name is referring to the wildcard {job}
    // Route::get('/jobs/{job}/edit', 'edit')
    //         ->middleware(['auth'])
    //         ->can('edit-job','job')  //if we using gate;
    
    Route::get('/jobs/{job}/edit', 'edit')
            ->middleware(['auth'])
            ->can('edit','job');  //if we using gate;
    Route::patch('/jobs/{job}', 'update')->middleware('auth');
    Route::delete('/jobs/{job}','destroy')->middleware('auth');
}); //we can do it using route resource

// Auth

Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register',[RegisteredUserController::class,'store']);


Route::get('/login',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store']);

Route::post('/logout',[SessionController::class,'destroy']);

// Route::resource('jobs',JobController::class)->middleware('auth'); // it will apply middle ware to all routes
// Route::resource('jobs',JobController::class)->only(['index','show']);
// Route::resource('jobs',JobController::class)->except(['index','show'])->middleware('auth');



// Route::get('/', function () {
//     // $job = Job::all();

//     // dd($job[0]->attributesToArray());
//     return view('home');
// }); //converting it to Route::view();


// Route::get('/jobs', function () {
//     $jobs = Job::with('employer')->latest()->simplePaginate(11); //applying pagination without pagenumbers showing
//     return view('jobs.index',[
//         'jobs' => $jobs
//     ]); 
// }); //movign it to dedicated controller [JobController]

// Route::get('/jobs',[JobController::class,'index']);



// Route::get('/jobs/create',[JobController::class,'create']);

// Route::get('/jobs/{id}', function ($id) {

//     $job = Job::find($id);
    
//     return view('jobs.show',['job'=>$job]);
// }); //to do this we can use concept of route model binding 

// Route::get('/jobs/{job}', [JobController::class,'show']);



// Route::post('/jobs', [JobController::class,'show']);

// Route::get('/jobs/edit/{job}', [JobController::class,'edit']);

// Route::post('/jobs/delete/{id}', function ($id) {
    
//     // $job = ;
    
//     // return view('jobs.show',['job'=>$job]);
// });

//update records
// Route::patch('/jobs/{job}', [JobController::class,'update']);

//destroy 
// Route::delete('/jobs/{job}',[JobController::class,'destroy']);



