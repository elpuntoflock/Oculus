<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('contactos_bk');
        Schema::rename('contactos', 'contactos_bk');
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos',50);
            $table->string('apellido_casada',50)->nullable();
            $table->string('sexo',1);
            $table->date('fecha_nac');
            $table->string('direccion',100)->nullable();
            $table->string('tel_celular',20)->nullable();
            $table->string('tel_trabajo',20)->nullable();
            $table->string('observaciones');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contactos');
    }
}
