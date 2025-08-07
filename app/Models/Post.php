<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];


    //Sobreescribimos el metodo getRouteKeyName, para trabajar urls amigables
    public function getRouteKeyName()
    {
        return 'url'; //  esto es crucial
    }

    //Posteriormente los utilizaremos cuando enviaemos mas post desde un formulario
    protected $fillable = [
        'title',
        'url', // este campo debe estar incluido
        'excerpt',
        'body',
        'published_at',
        'category_id',
    ];

    //Relacion de uno a muchos
    public function category()
    {        //$post->category->name;  -> El post pertenece a la categoria

        return $this->belongsTo(Category::class);       //Retorna el objeto (post actual)
    }

    public function tags()
    {     //Etiquetas

        return $this->belongsToMany(Tag::class);       //Retorna this belonstomany pertenece a muchos, la relacion es con la clase Tag

    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at') //visualizamos los posst que no sean null, solo post activos
            ->where('published_at', '<=', Carbon::now()) //que la fecha no sea anterior a la actual
            ->latest('published_at'); //ordenado por publicación
    }
}
