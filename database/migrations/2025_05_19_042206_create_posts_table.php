<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {   //Tabla post
            $table->id();
            $table->string('title');                            //Titulo Post
            $table->mediumText('excerpt');                      //Contenido
            $table->text('body');                               //Cuerpo del Post
            $table->timestamp('published_at')->nullable();      //Fecha publicació
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
