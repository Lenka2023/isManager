<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   public function store( request $request)
    {
        
       
      
  
        $this->validate(request(), [
           'title' => 'required|min:2',
            'text' => 'required',
           
           

        ]);

        Post::create(
            request(array( 'title', 'text'))
        );

     return redirect('/');  
    }
}