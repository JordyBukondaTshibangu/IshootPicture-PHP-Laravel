<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $guarded = [];

    public function user(){

       return  $this->belongsTo(User::class);
       
    }
    public function userProfil(){

        return ($this->image) ? "/storage/$this->image" : "/assets/notavailbale.jpeg";
    }
    public function followers(){
        
        return $this->belongsToMany(User::class);
    }

}
