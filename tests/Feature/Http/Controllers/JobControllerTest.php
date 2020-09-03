<?php

namespace Tests\Feature\Http\Controllers;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\JobController
 */
class JobControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $jobs = factory(Job::class, 3)->create();

        $response = $this->get(route('job.index'));

        $response->assertOk();
        $response->assertViewIs('pages.jobs.index');
        $response->assertViewHas('jobs');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $job = factory(Job::class)->create();

        $response = $this->get(route('job.show', $job));

        $response->assertOk();
        $response->assertViewIs('pages.jobs.show');
        $response->assertViewHas('jobs');
    }
}
