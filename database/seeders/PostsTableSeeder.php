<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post; // Ruta del modelo Post
use App\Models\Category; // Ruta del modelo Category
use App\Models\Tag;

use Carbon\Carbon;

// Importa la clase DB al inicio del archivo, para limpiar la tabla pivote
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Desactivar restricciones
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        // Limpiar tablas
        DB::table('post_tag')->truncate();
        DB::table('posts')->truncate();

        // Post::truncate();  //Esta linea hace lo mismo que la linea anterior por lo que vamos a omitirla es mas directo con QueryBuilder
        Category::truncate();
        Tag::truncate();

        // Reactivar restricciones
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Crear Tags
        $tag1 = Tag::create(['name' => 'Etiqueta 1']);
        $tag2 = Tag::create(['name' => 'Etiqueta 2']);
        $tag3 = Tag::create(['name' => 'Etiqueta 3']);

        // Crear Categorías
        $category1 = Category::create(['name' => 'Laravel']);
        $category2 = Category::create(['name' => 'Segunda Categoria']);

        // Crear Posts
        $post1 = Post::create([
            'title' => 'Mi Primer Post',
            'url' => 'mi-primer-post',
            'excerpt' => 'Extracto de mi primer post',
            'body' => '<p>Cuerpo del Primer Post</p>',
            'published_at' => Carbon::now()->subDay(4),
            'category_id' => $category1->id,
        ]);

        $post2 = Post::create([
            'title' => 'Mi Segundo Post',
            'url' => 'mi-segundo-post',
            'excerpt' => 'Extracto del segundo post',
            'body' => '<p>Cuerpo del Segundo Post</p>',
            'published_at' => Carbon::now()->subDay(3),
            'category_id' => $category1->id,
        ]);

        $post3 = Post::create([
            'title' => 'Mi Tercer Post',
            'url' => 'mi-tercer-post',
            'excerpt' => 'Extracto de mi Tercer post',
            'body' => '<p>Cuerpo del Tercer Post</p>',
            'published_at' => Carbon::now()->subDay(2),
            'category_id' => $category2->id,
        ]);

        $post4 = Post::create([
            'title' => 'Mi Cuarto Post',
            'url' => 'mi-cuarto-post',
            'excerpt' => 'Extracto de mi Cuarto post',
            'body' => '<p>Cuerpo del Cuarto Post</p>',
            'published_at' => Carbon::now()->subDay(1),
            'category_id' => $category2->id,
        ]);

        // Asignar Tags según la tabla deseada
        $post1->tags()->attach([$tag1->id, $tag2->id]); // IDs 1 y 2
        $post2->tags()->attach([$tag1->id]);            // ID 1
        $post3->tags()->attach([$tag2->id]);            // ID 2
        $post4->tags()->attach([$tag2->id]);            // ID 2
        $post1->tags()->attach([$tag3->id]);            // ID 3
    }
}
