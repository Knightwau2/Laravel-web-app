<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' => Job::latest()->get()
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'company' => 'required|max:255',
            'salary' => 'required|numeric'
        ]);

        Job::create($validated);

        return redirect('/jobs')->with('success', 'Job posted successfully!');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }
}