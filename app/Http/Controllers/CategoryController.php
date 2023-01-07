<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function update(Request $request,$id) {
        $category = Category::find($id);

        $category->name = $request->input('name');

        if($request->hasFile('image')) {
            
            $destination = public_path('images').$category->image_name;
            if(File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $file->move(public_path('images'), $imageName);
            $category->image_name = $imageName;
        }
        

        $category->update();
        
        return redirect('/')->with('success','Category updated succesfully!');
    }

    public function edit(Category $category) {
        return view('edit-category',[
            'category'=> $category
    ]);

    }

    public function store(Request $request) {

        $attributes = $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $imageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $attributes['image_name'] = $imageName;
        $request->image->move(public_path('images'), $imageName);

        Category::create($attributes);
        return redirect('/')->with('Category added succsefully!');
    }

    public function create() {
        return view('add-category');
    }

    public function delete(Category $category) {
        if(!$category->posts->isEmpty()) {
            return redirect('/')->with('error',"Can't delete category if contains posts!");
        }
        $category->delete();

        return redirect('/')->with('success', 'Category deleted succesfully!');
    }

    public function categoryPosts(Category $category) {
        return view('category', [
            'category' => $category
        ]);
    }

    public function show() {
        return view('categories', [
            'categories' => Category::all()
        ]);
    }
}
