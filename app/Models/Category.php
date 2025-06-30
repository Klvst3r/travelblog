<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Category extends Model
{
    use HasFactory;

      public function concept(){        //$post->category->name;  -> El post pertenece a la categoria

        return $this->belongsTo(Concept::class);       //Retorna el objeto (post actual)
    }
}
