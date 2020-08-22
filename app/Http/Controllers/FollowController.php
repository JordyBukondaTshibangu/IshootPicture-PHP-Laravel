<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowController extends Controller
{
    public function __constrcut(){
        $this->middleware('auth');
    }
    public function store(User $user){

        return auth()->user()->following()->toggle($user->profil);
    }
}
