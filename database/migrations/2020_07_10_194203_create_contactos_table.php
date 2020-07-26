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
        Schema::create('conctactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos',50);
            $table->string('apellido_casada',50);
            $table->string('sexo',1);
            $table->date('fecha_nac');
            $table->string('tel_celular',20);
            $table->string('tel_trabajo',20);
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
        Schema::drop('conctactos');
    }
}
