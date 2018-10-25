<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CategoriesController extends Controller
{
    public function index($category)
    {
        $posts = \App\Category::findOrFail($category)->posts()->simplePaginate(3);
        return view ('blog.index', compact('posts'));
    }
    
    public function show($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.list')->with('category', $category);
    }
    
    public function create()
    {

        return view('dashboard.categories.create')->with('categories', $categories);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $category = new Category;
        $category->name = $request->input('name');
        $category->save();
        
        return redirect('/categories/category')->with('success','Category Added');
    }
    
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        return redirect('/categories/category')->with('success', 'Category Deleted');
    }
    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.edit')->with('categories', $categories);
    }
    
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required'
        ]);
        
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        
        return redirect('/categories/category')->with('success', 'Category updated');
    }
}