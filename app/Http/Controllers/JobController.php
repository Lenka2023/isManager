<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\User;
class JobController extends Controller
{
    public function enqueue(Request $request)
        {
        	 \Log::info('sendemail_handle.');
    	$data = [
           // 'title' => Post::select('title')->firstOrFail()->title,

            //'text' => Post::select( 'text')->get()->text,
           'email'=>User::where('manager', $request->query('manager', 1))->firstOrFail()->email];
           dd($data);
        $emailJob = (new SendEmail($data))->delay(Carbon::now()->addSeconds(10));

        SendEmail::dispatch($emailJob);
    }
}
