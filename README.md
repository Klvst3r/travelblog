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



## Conatroladores



## Migraciones

Segunda migración Migración

Post Migration
	$ php artisan migrate

Categories migration
	$ php artisan migrate


## Relations	

Para relacionar un Post a ua categoria
Uno a muchos: Una categoria puede tener varias Posts, pero un post no puede tener varias categorias - Relacion de uno a muchos

Se define en el modelo post la funcion Category y en la migración se establece un campo para relacionar 

	$table->unsignedInteger('category_id');             // En cada post vamos a almacenar el id de la categoria para hacer referencia a el

Posterior a ello se debe volvera ejecutar las migraciones
Quita la ultima migracion la de categorias
	$ php artisan migrate:rollback
	$ php artisan migrate:refresh		//Refrescar todo, para evitar volver a hacer todo, es decir hacer rollback y las ha vuelto a migrar, es decir todas vacias




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# travelblog
