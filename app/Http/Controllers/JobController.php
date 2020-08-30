<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function enqueue(Request $request)
    {
        $emailJob = (new SendEmail([
            'email' => User::where('manager', 1)->firstOrFail()->email
        ]))
            ->delay(Carbon::now()->addMinutes(5));

        SendEmail::dispatch($emailJob);
    }
}
