<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post; // Ruta del modelo Post
use App\Models\Category; // Ruta del modelo Category

use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Evitar duplicidad de registros co los mismos valores de la tabla Post
        Post::truncate(); //Limpie la bd y ejecute el post


        //Referencia de la categoria, se crea la categoria
        Category::truncate();


        //Regostros de la tabla category
        $category = new Category;
        $category->name = "Laravel";
        $category->save();

        $category = new Category;
        $category->name = "Segunda Categoria";
        $category->save();


        //Creamos los Post de prueba
        // Primer Post
        $post = new Post;
        $post->title = "Mi Primer Post";
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Cuerpo del Primer Post</p>";
        $post->published_at = Carbon::now()->subDay(4);
        $post->category_id = 1;
        $post->save();

        //Segund Post
        $post = new Post;
        $post->title = "Mi Segundo Post";
        $post->excerpt = "Extracto del segundo post";
        $post->body = "<p>Cuerpo del Segundo Post</p>";
        $post->published_at = Carbon::now()->subDay(3);
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Mi Tercer Post";
        $post->excerpt = "Extracto de mi Tercer post";
        $post->body = "<p>Cuerpo del Tercer Post</p>";
        $post->published_at = Carbon::now()->subDay(2);
        $post->category_id = 2;
        $post->save();


        $post = new Post;
        $post->title = "Mi Cuarto Post";
        $post->excerpt = "Extracto de mi Cuarto post";
        $post->body = "<p>Cuerpo del Cuarto Post</p>";
        $post->published_at = Carbon::now()->subDay(1);
        $post->category_id = 2;
        $post->save();

    }
}
