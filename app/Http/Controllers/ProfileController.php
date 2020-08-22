<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index( User $user)
    {  
        
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;

        $postscount = $user->posts->count();
        $followersCount = $user->profil->followers->count();
        $followingCount = $user->following->count();

        return view('profiles.index', compact('user', 'follows','postscount','followersCount','followingCount'));
    }

    public function edit(User $user){

        $this->authorize('update', $user->profil);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        $this->authorize('update', $user->profil);

        if(request('image')){

            $pathName = request('image')->store('profil', 'public');

            $image = Image::make(public_path("storage/$pathName"))->fit(1000,1000);
            $image->save();

            $image_array = ['image' => $pathName];
        }

        auth()->user()->profil->update(array_merge(
            $data,
            $image_array ?? []
        ));


        return redirect("/profile/{$user->id}");
    }
}
