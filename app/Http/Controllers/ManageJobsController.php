<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use Illuminate\Http\Request;

class ManageJobsController extends Controller
{
    public function index()
    {
        $approved_active_jobs = Job::approved()->active()->get();

        $unapproved_jobs = Job::unapproved()->get();

        $approved_expired_jobs = Job::approved()->expired()->get();

        return view('pages.manage.jobs.index', compact(['approved_active_jobs', 'unapproved_jobs', 'approved_expired_jobs']));
    }

    public function edit(Job $job)
    {
        $categories = Category::all();
        return view('pages.manage.jobs.edit', compact(['job', 'categories']));
    }

    public function update(Request $request)
    {
        $job = Job::where('id', '=', $request->id)->first();

        //Restrict access to Admin only
        $validatedInput = $request->validate([
            'title' => 'required | max:255',
            'description' => 'required',
            'location' => 'required',
            'link_to_apply' => 'required',
            'type' => 'required',
            'category_id' => 'required',
            'company' => 'required'
        ]);

        $job->update([
            'title' => request('title'),
            'description' => request('description'),
            'location' => request('location'),
            'link_to_apply' => request('link_to_apply'),
            'type' => request('type'),
            'category_id' => request('category_id'),
            'company' => request('company'),
            'salary' => request('salary'),
            'created_at' => request('created_at')
        ]);

        return 'Job updated';

    }

    public function destroy(Job $job)
    {
        $job->delete();

        if (request()->wantsJson()) {
            return response([], 204);
        }
    }
}
