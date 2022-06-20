<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    function index()
    {
     return view('subscribe');
    }

    public function store(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email'
     ]);

     $newPost = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'status' => 1
    ]);     

    }
}
