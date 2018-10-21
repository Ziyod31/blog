<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbor\Carbon;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->filter(request(['month', 'year']))->simplePaginate(3);
        $archives = Post::archives();

        return view('blog.index')->with('posts', $posts);
    }
    
    public function show($id)
    {
        $post = Post::find($id);
        return view('blog.show')->with('post', $post);
    }
    
    public function create()
    {
        return view('blog.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        
        return redirect('/')->with('success', 'Your post is added');
    }
    
    public function edit($id)
    {
        $post = Post::find($id);
        return view('blog.edit')->with('post', $post);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $post = Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        
        return redirect('/')->with('success', 'Your post is updated');
    }
    
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        return redirect('/')->with('success', 'Your post is deleted');
    }
}
