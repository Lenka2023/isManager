<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\User;
class JobController extends Controller
{
    public function enqueue(Request $request)
    {
    	$details=[ 'email' => User::where('manager', 1)->firstOrFail()->email];
        $emailJob = (new SendEmail($details))->delay(Carbon::now()->addSeconds(10));

        SendEmail::dispatch($emailJob);
    }
}
