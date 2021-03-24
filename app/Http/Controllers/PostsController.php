<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

use App\Post;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $users = auth()->user()->following()->pluck('profils.user_id');
        $user = auth()->user()->id;
        $posts = Post::all();

        // dd($posts);
        // $posts = Post::whereIn('user_id', $users)->latest()->paginate(10);

        // dd($posts);

        return view('posts.index', compact('posts', 'user'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);
        
        $pathName = request('image')->store('uploads', 'public');

        
        $image = Image::make(public_path("storage/$pathName"))->fit(1200,1200);
        $image->save();

        $post = auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $pathName
        ]);

        return redirect('/profile/' .auth()->user()->id);
        
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
