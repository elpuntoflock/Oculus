<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('notifications'); 
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            
            $table->integer('tipoNotificacion');
            $table->integer('cantidad');
            $table->string('duracion', 2);
            $table->string('status', 1)  -> nullable();
            $table->timestamps();
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->foreignId('evento_id')->constrained('eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }

    
}
