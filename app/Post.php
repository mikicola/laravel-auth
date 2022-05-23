<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// per ordinare l'url
use illuminate\Support\Str;

class Post extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }
    protected $fillable = ['title', 'content', 'slug'];

    static public function generateSlug($originalStr){
        // per ordinare l'url
        $baseSlug = Str::of($originalStr)->slug('-')->__toString();
        $slug = $baseSlug;
        $i = 1;
        while(self::where('slug', $slug)->first()){
            $slug = "$baseSlug-$i";
            $i++;
        }
        return $slug;
    }
}
