<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->simplePaginate(3);
        return view ('blog.index', compact('posts'));
    }
    
    public function create()
    {
        return view('dashboard.tags.create')->with('tags', $tags);
    }
    
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('dashboard.tags.list')->with('tag', $tag);
    }
    
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        
        return redirect('/tags/list')->with('success', 'Tag was Deleted');
    }
    
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'name' => 'required'
//        ]);
//        
//        $tag = new Tag;
//        $tag->name = $request->input('name');
//        $tag->save();
//        
//        return redirect('/tags/list')->with('success', 'Tag was Added');
//    }
    
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('blog.edit', compact('tag'));
    }
    
//    public function update(Request $request, $id)
//    {
//         $this->validate($request, [
//            'name' => 'required'
//        ]);
//        
//        $tag = Tag::find($id);
//        $tag->name = $request->input('name');
//        $tag->save();
//        
//        return redirect('/categories/category')->with('success', 'Category updated');
//    }
}   