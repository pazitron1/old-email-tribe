<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobStatusController extends Controller
{
    public function update(Job $job)
    {
        if ($job->approved == false) {
            $job->update([
                'approved' => 1
            ]);

            return 'The job has been approved';
        } else {
            $job->update([
                'approved' => 0
            ]);

            return 'The job has been disapproved';
        }

    }
}
