<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## Travel Bog

Blog de Agencia de Viajes construido con el Framework de Desarrollo de Laravel 10, PHP 8.1, Vue.js.



## Importación del proyecto

Este proyecto estara dispoible para su construcción desde diferentes sedes y en colaboración con el equipo de desarrollo. Es importante considerar que esta constrido con las siguientes caracteristicas.

-  SO. Base - Debian 12 (bookworm)
-  Laravel v10.48.29 
-  PHP v8.1.32
-  MariaDB 10.11.11 database server
-  Vue.js 

Laravel es una herramienta poderosa, accesible robusta y provee herramientas para aplicaciones robustas y complejas.


## Instancia del Proyecto del proyecto

Al crear una instancia del proyecto debemos inicializar tambien las configuraciones iniciales, para poder trabajar en la instancia debemos tener en cuneta

- Verificar la instalación de composer
	$ composer install	

- Crear nuestro archivo de variables de entorno
	$ cp .env.example	.env

- Clave de encriptacion del proyecto
	$ php artisan key:generate

- Configurar la conexión a la base de datos.	

En el archivo de configuración para conectar la Bd debemos considerar los siguientes valores o en su defecto los de la BD

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=



## DB

Para iniciar el trabajo con la Base de datos debemos arrancar con las migraciones iniciales

    $ php artisan migrate

Para deshacer las migraciones
	$ php artisan migrate:rollback



## Modelos

Al crear el modelo podemos crear automaticamente la migración  (-m)

	$ php artisan make:model Post -m

Categorias de los post y sus etiquetas

	$php artisan make:model Category -m

Se crea posteior a los seeders de Post y Categorias otro modelo para las categorias

	$ php artisan make:model Tag -m
Posterior a la insercion de campos se ejecuta la migracion
	$ php artisan migrate


## Conatroladores



## Migraciones

Segunda migración Migración

Post Migration
	$ php artisan migrate

Categories migration
	$ php artisan migrate

Para tener un arelacion de muchos a muchos entre las etiquetas y los post, como se creara una tabla
	$ php artisan make:migration create_post_tag_table --create=post_tag   //el parametro es para la creación de la tabla

Puede Generarnos un error por que no existe la clase que se acaba de eliminar,s e soluciona con:
	$ composer dumpautoload  //Para refrescar el autoloader	

Se ejecuta la migración para los etiquetas de los post
	$php artisan migrate	


## Relations	

Para relacionar un Post a ua categoria
Uno a muchos: Una categoria puede tener varias Posts, pero un post no puede tener varias categorias - Relacion de uno a muchos

Se define en el modelo post la funcion Category y en la migración se establece un campo para relacionar 

	$table->unsignedInteger('category_id');             // En cada post vamos a almacenar el id de la categoria para hacer referencia a el

Posterior a ello se debe volvera ejecutar las migraciones
Quita la ultima migracion la de categorias
	$ php artisan migrate:rollback
	$ php artisan migrate:refresh		//Refrescar todo, para evitar volver a hacer todo, es decir hacer rollback y las ha vuelto a migrar, es decir todas

Se crea y ejecuta lamigración de la tabla create_post_tag_table

como funciona la relacion de muchos a muchos, Por ejemplo al crear dos etiquetas en la tabla tags
	Etiqueta 1
	Etiqueta 2
Ahora si queremos añadir al post 1 las dos etiquetas, en la tabla post_tag tendriamos

id		post_id		tag_id		created_at		updated_at
1		1			1
2		1			2
3		3			1
4		3			2		

De esta forma el post va a tener asignadas dos etieutas y las referencias estaran en la tabla, de esta forma el post 1 y 3 tendran ambas etiuqteas

Es necesario tener definida esta relación par apoder utilizarla para ello en el Modelo post se crea una nueva función tags(), haciendo algo similar a la primera relación

Modelo Post

return $this->belongsToMany(Tag::class);       //Retorna this belonstomany pertenece a muchos, la relacion es con la clase Tag

Como se esta utilizando la convención de llamar a la tabla "post_tag" y a los campos post_id y tag_id, no es necesario otra configuración, ya que Laravel utiliza esos valors por defecto





## Seeders
Al refrescar la Base de datos se evitara perder la información cargada en la Base de datos, la intención es guardar los datos persistidos
Crear un seeder para la tabla post
	$ php artisan make:seeder PostsTableSeeder

Para recrear la Bd
1. Se Refresca la Base de datos
	$ php artisan migrate:refresh

2. Se ejecutan los seeder
	$ php artisan db:seed
	
	 
se puede hacer todo en un solo caomando
	$ php artisan migrate:refresh --seed	 	//De esta forma refresca la _Bd y ejecuta los seeders



Para tener completo el seeder se incluye en PostTableSeeder, la limpieza de la tabla pivote
    Importa la clase DB al inicio del archivo:
---
	use Illuminate\Support\Facades\DB;

Agrega la línea para truncar la tabla post_tag justo antes o después de Post::truncate():
---
	DB::table('post_tag')->truncate();


Esto asegura que cada vez que ejecutes tu seeder (php artisan db:seed o php artisan migrate:fresh --seed), se limpie también la tabla de relaciones post_tag, y evites duplicaciones o errores por claves duplicadas en relaciones muchos a muchos.

Se queremos agrupar este seeder en DatabaseSeeder.php para que se ejecute automáticamente, seria de la siguiente manera:

Para agrupar tu seeder PostsTableSeeder y que se ejecute automáticamente con el comando:

	$ php artisan db:seed

o con:

	$ php artisan migrate:fresh --seed

solo se necesita registrarlo dentro de DatabaseSeeder.php.

Para ello:    Abre el archivo database/seeders/DatabaseSeeder.php.

    Dentro del método run(), llama a tu seeder PostsTableSeeder::class. Te quedará algo así:

public function run(): void
{
    $this->call([
        PostsTableSeeder::class,
    ]);
}

Si más adelante agregas otros seeders (por ejemplo, UsersTableSeeder, RolesTableSeeder, etc.), solo los añades a ese arreglo.


Si vamos haciendo mosificaciones a la Bd y a las tablas y se van generando los seeder rspectivos, podemos ir realimantando la Bd con 

	$ php artisan migrate:fresh --seed

	

## Etiquetas
Se establece una relacion de muchos a muchos
Donde:
	Un post podre tener muchas etiquetas, y una etiqueta podra tener muchos post

Para hacer que un post pueda tener varias etiquetas
Se crea otra tabla con los id que se relacionan, se creara una tabla con un campo para la almacenar el id del tag y otro campo para almacenar el id del post



## Vistas

En la vista Welcome, estan las etiquetas, cambiar las respectivas con los valores de la BD

Teniendo en cuenta que todos los post ahora tienen una etieuata se debe recorrer con un foreach los tags de cada post
En la vista Welcome:

	@foreach($post->tags as $tag)
							<span class="tag c-gray-1 text-capitalize">{{ $tag->name }}</span>
						@endforeach




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# travelblog
