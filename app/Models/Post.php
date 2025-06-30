<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    //Posteriormente los utilizaremos cuando enviaemos mas post desde un formulario
     protected $fillable = [
        'title',
        'excerpt',
        'body',
        'published_at',
        'category_id',
    ];

    //Relacion de uno a muchos
    public function category(){        //$post->category->name;  -> El post pertenece a la categoria

        return $this->belongsTo(Category::class);       //Retorna el objeto (post actual)
    }

    public function tags(){     //Etiquetas

        return $this->belongsToMany(Tag::class);       //Retorna this belonstomany pertenece a muchos, la relacion es con la clase Tag

    }

}
