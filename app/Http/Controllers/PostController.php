<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Mail;
use App\Mail\SendMail;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
	$posts = Post::all(); 
	return view('post.index', [
        'posts' => $posts,
    ]); //returns the view with posts
}
public function show(Post $post)
{
    return view('post.show', [
        'post' => $post,
    ]); //returns the view with the post
}
public function create()
    {
        return view('post.create');
    }

public function store(Request $request)
    {
        $newPost = Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $userData= User::where('status', "=" ,1)->get();

        //dd($userData);

     Mail::to('abc@mail.com')->send(new SendMail($userData));
     return redirect('blog/' . $newPost->id);
    } 
public function edit(Post $post)
    {
        return view('post.edit', [
        'post' => $post,
    ]); //returns the edit view with the post
}    
public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $post->id);
    }
public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/blog');
    }  
    
 public function login(Request $request)
    {        
     if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
     {
        return redirect('/post');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }
    }      
}
