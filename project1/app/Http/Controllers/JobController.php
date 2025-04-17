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

    public function create()  //redirect to create.blade.php when creating
    {
        return view('jobs.create');
    }

    public function store(Request $request) // store user input in database
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'company' => 'required|max:255',
            'salary' => 'nullable|numeric|min:0'
        ]);

        Job::create($validated);

        return redirect('/jobs')->with('success', 'Job posted successfully!');
    }

    public function destroy(Job $job) //delete job
    {
        $job->delete();
        
        return redirect('/jobs')->with('success', 'Job deleted successfully!');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        // Simple validation using the validate() method
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:0',],
            [
                'salary.min' => 'Salary cannot be negative',
                'salary.numeric' => 'Salary must be a number',
            ]
        );
    
        // Update the job
        $job->update($validated);
    
        // Redirect with success message
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    public function show(Job $job) 
    {
        return view('jobs.show', compact('job'));
    }
}