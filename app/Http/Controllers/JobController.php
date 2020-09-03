<?php

namespace App\Http\Controllers;

use Mail;
use App\Job;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\AdminNewJobPosted;
use App\Mail\ClientNewJobPosted;

class JobController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category = null)
    {
        if ($category) {
            if (request('search')) {
                $q = request( 'search' );
                $jobs = Job::with('category')
                            ->where('category_id', $category->id)
                            ->where('title','LIKE','%'.$q.'%')
                            ->orWhere('location','LIKE','%'.$q.'%')
                            ->active()
                            ->approved()
                            ->get();
            } else {
                $jobs = Job::with('category')
                            ->where('category_id', $category->id)
                            ->active()
                            ->approved()
                            ->get();
            }
        } else {
            $q = request( 'search' );
            $jobs = Job::where('title','LIKE','%'.$q.'%')
                        ->orWhere('location','LIKE','%'.$q.'%')
                        ->with('category')
                        ->active()
                        ->approved()
                        ->get();
        }

        if ($request->wantsJson()) {
            return json_encode($jobs);
        }
        return view('pages.jobs.category.index', compact(['jobs', 'category']));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category, Job $job)
    {
        return view('pages.jobs.show', compact(['job', 'category']));
    }

    public function create()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $intent = $stripe->paymentIntents->create([
            "amount" => 100,
            "currency" => 'GBP',
            'metadata' => [
                'product_purchase_intent' => 'Job listing'
            ]
        ]);


        $stripe->paymentIntents->update(
            $intent->id,
            [
                'metadata' => ['product_purchase_intent' => 'Job listing updated']
            ]
        );

        return view ('pages.jobs.create')->withIntentId($intent->id)->withIntentSecret($intent->client_secret);
    }

    public function updateIntent(Request $request)
    {

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripe->paymentIntents->update(
            request('intent'),
            [
                'amount' => request('amount'),
                'metadata' => ['product_purchase_intent' => 'Job listing updated']
            ]
        );

        return 'Payment intent updated!';
    }


    public function store(Request $request){
        $validatedInput = $request->validate([
            'title' => 'required | max:255',
            'description' => 'required',
            'location' => 'required',
            'link_to_apply' => 'required',
            'email' => 'required | email',
            'company' => 'required',
            'category_id' => 'required'
        ]);

        $job = new Job();

        $job->title = request('title');
        $job->description = request('description');
        $job->location = request('location');
        $job->link_to_apply = request('link_to_apply');
        $job->type = request('type');
        $job->category_id = request('category_id');
        $job->access_token = Str::orderedUuid()->toString();
        $job->email = request('email');
        $job->company = request('company');
        $job->about_company = request('about_company');
        $job->salary = request('salary');

        $job->save();

        $delay = now()->addSeconds(5);

        Mail::to('antonsirik@gmail.com')
            ->later($delay, new AdminNewJobPosted($job));

        Mail::to($job->email)
            ->later($delay, new ClientNewJobPosted($job));

        return 'Saved to DB';
    }

    public function edit($jobAccess_token)
    {

        $job = Job::where('access_token', '=', $jobAccess_token)
                    ->with('category')->first();

        $categories = Category::all();

        return view('pages.jobs.edit', compact(['job', 'categories']));
    }

    public function update(Request $request)
    {
        $job = Job::where('access_token', '=', $request->access_token)->first();

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
            'salary' => request('salary')
        ]);

        return 'Job updated';

    }
}
