<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;
use App\Models\JobTag;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $job = Job::with('employer')->latest()->simplePaginate(3);
        
        return view('jobs.index', [
            'jobs' => $job
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        // Eager loading the employer relationship
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function store()
    {
        // Validate and store the job listing
    
        request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'company' => 'required|string|max:255'
        ]);

        
        Job::create([
            'employer_id' => 2, // Assuming a static employer ID for simplicity
            'title' => request('title'),
            'description' => request('description'),
            'location' => request('location'),
            'salary' => request('salary'),
            'company' => request('company')
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function update(Job $job)
    {
        // Validate and update the job listing
        request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'company' => 'required|string|max:255'
        ]);

        $job->update([
            'title' => request('title'),
            'description' => request('description'),
            'location' => request('location'),
            'salary' => request('salary'),
            'company' => request('company')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        // Find the job listing and delete it
        $job->delete();

        return redirect('/jobs');
    }
}
