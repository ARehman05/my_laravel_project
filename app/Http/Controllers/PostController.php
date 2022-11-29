<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// for session you can use both 
// use Illuminate\Support\Facades\Session;
use Session;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = auth()->user()->posts()->paginate(3);
        return view('admin.posts.index', ['posts'=>$posts]);
    }
    
    public function show(Post $post) {

        return view('blog-post', ['post' => $post]);
    }

    public function create() {
        return view('admin.posts.create');
    }
    
    public function store() {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        } 
        auth()->user()->posts()->create($inputs);
        session()->flash('post_create_message', 'Post is create');
        return redirect()->route('post.index');
    }

    public function edit(Post $post) {
        // $this->authorize('view', $post);
        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        Session::flash('message', 'Post was Deleted');
        return back();
    }
    public function update(Post $post) {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        } 
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $this->authorize('update', $post);
        $post->save();
        session()->flash('post_update_message', 'Post has updated');
        return redirect()->route('post.index');
    }

}
