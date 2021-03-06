<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Recipe extends Model
{
    use HasFactory, Searchable;

    
    public function author(){
    	return $this->belongsTo(Author::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
     public function team(){
        return $this->belongsTo(Team::class);
    }
     public function comments(){
            return $this->hasMany(Comment::class);
     }

     public function timeline(){
        return Comment::where('recipe_id', '=' , $this->id)->latest()->get();
     }

     public function searchableAs()
     {
         return 'recipes_index';
     }

     public function toSearchableArray()
     {
         return  $this->toArray();
     }
}