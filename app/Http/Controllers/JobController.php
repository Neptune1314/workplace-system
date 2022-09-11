<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\JobPostRequest;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('employer', ['except' => array('index', 'show', 'apply', 'alljobs', 'searchjob')]);
        // $this->middleware(['employer', 'verified'],['except' => array('index', 'show', 'apply', 'alljobs', )]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::latest()->limit(5)->where('status', 1)->get(); //Сүүлээсээ status 1 байх ажлын байрыг харуулах
        $companies = Company::limit(8)->get();
        return view('welcome', compact('jobs', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // return $categories;
        return view('jobs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobPostRequest $request)
    {
        // dd($request->all());
        // return $request->all();
        $user_id = Auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'role' => $request->role,
            'address' => $request->address,
            'type' => $request->type,
            'position' => $request->position,
            'status' => $request->status,
            'last_date' => $request->last_date
        ]);
        return redirect()->back()->with('MessageJob', 'Ажлын байрны зарыг амжилттай хадгаллаа');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id, Job $job)
    {
        // return $job;
        return view('jobs.show', compact('job'));
    }

    public function myjob(){
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        // return $jobs;
        return view('jobs.showjobs', compact('jobs'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Job $job)
    {
        $categories = Category::all();
        return view('jobs.edit', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update($id, JobPostRequest $request, Job $job)
    {
        $job = Job::findOrFail($id);
        //dd($job);
            $job->update([
            $job->title = $request->title,
            $job->slug = Str::slug($request->title),
            $job->description = $request->description,
            $job->role = $request->role,
            $job->position = $request->position,
            $job->address = $request->address,
            $job->type = $request->type,
            $job->status = $request->status,
            $job->last_date = $request->last_date,
        ]);
        return redirect()->back()->with('MessageUpdateJob', 'Ажил олгогчын зүгээс зарласан ажлын байрны мэдээллийг амжилттай заслаа.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
    
    public function apply(Request $request, $id)
    {
        $jobId = Job::findOrFail($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('MessageApply', 'Ажилд орох хүсэлтийг хүлээн авлаа, Тун удахгүй хариу мэдэгдэх болно');
    }
    public function applicants()
    {
        // return Job::has('users')->get();
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        //dd($applicants);
        // return $applicants;
        return view('jobs.applicants', compact('applicants'));
    }

    public function alljobs(Request $request)
    {
        // dd($request->title);
        $title = $request->title;
        $type = $request->type;
        $category = $request->category_id;
        $address = $request->address;

        // return $address;

        if($title || $type || $category || $address) {
            $jobs = Job::where('title', 'LIKE', '%' . $title . '%')
            ->orWhere('type', $type)
            ->orWhere('category_id', $category)
            ->orWhere('address', $address)
            ->paginate(1);
            // dd($jobs);
            return view('jobs.alljobs', compact('jobs'));
        }else{
            $jobs = Job::paginate(8);
            return view('jobs.alljobs', compact('jobs'));
        }
    }
    public function searchjob(Request $request)
    {
        //хайлт
        //dd($request);
        $keyword = $request->keyword;
        $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('position', 'LIKE', '%' . $keyword . '%')
            ->get();
        return response()->json($jobs);
    }
    
};
