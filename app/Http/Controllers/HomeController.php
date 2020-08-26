<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Post;
 use App\User;
use Storage;
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
     public function create(User $user)
    {
        return $user->posts()->today()->count() <=1;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   public function store( request $request)
    {
       if($request->hasFile('file')){
                            
                              $file=$request->file('file');
                              //putFile('1', $request->file('file'));
                             // dd($request->file('file'));
                             // $folder='1';
                              $request->file('file')->storeAs('pictures', '2.txt');
                             // $request->file->storeAs('','1.jpg'); 
                             // $url=Storage::url('1.jpg'); 
                              //dd($url);
//echo asset('storage/file.txt');
//$path = $request->file('avatar')->store('avatars');
                              
                             }else{
                                return 'No file selected';
                                }
     
       $path=url($file);  
       
      
  
        $this->validate(request(), [
           'title' => 'required|min:2',
            'text' => 'required',
           
           

        ]);

        Post::create(
            request(array( 'title', 'text'))
        );
        Post::count();

     return redirect('/');  
    }
}