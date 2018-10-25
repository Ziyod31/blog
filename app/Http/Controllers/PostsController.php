<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbor\Carbon;
use App\Category;
use App\Tag;

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
        $categories = Category::all();
        return view('blog.create')->with('categories', $categories);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post_tag->tag_id = $request->input('tag_id');
        $post->save();
        
        return redirect('/')->with('success', 'Your post is added');
    }
    
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('blog.edit')->with(compact('post'))->with('categories', $categories);
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
        $post->category_id = $request->input('category_id');
        $post_tag->tag_id = $request->input('tag_id');
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
