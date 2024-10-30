<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index(){
        // $jobs =  Job::all(); //it will be lazy loading querieng each items
        // $jobs = Job::with('employer')->get(); //this will do eagar loading 

        // $jobs = Job::with('employer')->latest()->paginate(11); //applying pagination with number
        $jobs = Job::with('employer')->latest()->simplePaginate(11); //applying pagination without pagenumbers showing
        // $jobs = Job::with('employer')->cursorPaginate(11); //use json passed with each page request to get the limit and order #most efficient for large datasets
        //latest() allowed to get new record firsts


        return view('jobs.index',[
            'jobs' => $jobs
        ]); 
    }

    public function create(){
        return view('jobs.create');
    }

    public function update(Job $job){
        //validations 
        request()->validate([
            'title' =>['required','min:3'],
            'salary' => ['required']
        ]);
        //authorize 

        //update job
        // $job  = Job::findOrFail($id); //it will be failed if got null 
        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();

        //another way 
        $job->update([
            'title' => request('title'),
            'salary' =>request('salary')
        ]);

        return redirect('/jobs/'.$job->id);
    }

    public function show(Job $job){
        return view('jobs.show',['job'=>$job]);
    }

    public function destroy(Job $job){
         //authorize 

        //delete 
        // Job::findOrFail($id)->delete(); //it will be failed if got null 
        $job->delete();

        //redirect
        return redirect('/jobs');
    }

    public function store(){
        // dd(request()->all()); //to get all post data
        // dd(request('title'));

        //validations 
        request()->validate([
            'title' =>['required','min:3'],
            'salary' => ['required']
        ]);

    
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);
        // dd($job->employer->user);
        // Mail::to($job->employer->user)->send(new JobPosted($job)); //synchronously render this line
        
        Mail::to($job->employer->user)->queue(new JobPosted($job)); //added to queue to work it on the backend 
        return redirect('/jobs');
    }

    public function edit(Job $job){

        

        // if(Auth::guest()){
        //     return redirect('/login');
        // }

        // if($job->employer->user->isNot(Auth::user())){
        //     abort(403);
        // }

        // Gate::authorize('edit-job',$job);


        return view('jobs.edit',['job'=>$job]);
    }

}
