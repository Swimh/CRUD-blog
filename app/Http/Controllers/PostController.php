<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Stringable;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function update(Request $request, $id) {
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->update();
        return redirect('/');
    }

    public function edit(Post $post) {

        return view('edit-post',[
            'post'=> $post,
            'categories'=> Category::all()
        ]);
    }

    public function delete(Post $post) {
        $post->delete();

        return redirect('/')->with('success', 'Post deleted!');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>'required',
            'image'=>'required'
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);

        $attributes['user_id'] = Auth::user()->id;

        $fileName = time() . '-' . $request->title . '.' . $request->image->extension();

        $attributes['file_name'] = $fileName;

        $request->image->move(public_path('images'), $fileName);

        Post::create($attributes);

        return redirect('/');
    }

    public function create() {

        if (auth()->guest()) {
            
            return redirect()->back()->with('info', 'You must be authenticated to access this page!');
        }
        return view('add-post', [
            'categories' => Category::all()
        ]);
    }



    public function index() {
        return view('posts', [
            'posts'=> $this->search(),
            'categories'=>Category::all()
            
        ]);
    }

    public function show(Post $post) {
        return view('post',[
            'post' => $post
        ]);
    }

    public function search() {
        
        $posts = Post::latest();
        //$_REQUEST aka $_POST/$_GET
        if (request('search')) {
            $posts->where('title', 'like', '%'. request('search'). '%')
            ->orWhere('body',  'like', '%'. request('search'). '%');
        }
        return $posts->paginate(4);
    }
    
}

