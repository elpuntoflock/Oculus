<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //Schema::drop('eventos_bk');
        Schema::rename('eventos', 'eventos_bk');
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->integer('groupId')  -> nullable();
            $table->boolean('allDay')  -> nullable();
            $table->datetime('start')  -> nullable();
            $table->datetime('end')  -> nullable();
            $table->integer('daysOfWeek')  -> nullable();
            $table->datetime('startTime')  -> nullable();
            $table->datetime('endTime')  -> nullable();
            $table->datetime('starRecur')  -> nullable();
            $table->datetime('endRecur')  -> nullable();
            $table->string('title',50);
            $table->datetime('description',300)  -> nullable();
            $table->string('url',50)  -> nullable();
            $table->string('classNames',50)  -> nullable();
            $table->boolean('editable')  -> nullable();
            $table->boolean('startEditable')  -> nullable();
            $table->boolean('durationEditable')  -> nullable();
            $table->boolean('resourceEditable')  -> nullable();
            $table->string('resourceId',50)  -> nullable();
            $table->string('resourceIds',50)  -> nullable();
            $table->string('display',50)  -> nullable();
            $table->boolean('overlap',50)  -> nullable();
            $table->string('constraint',50)  -> nullable();
            $table->string('color',50)  -> nullable();
            $table->string('backgroundColor',50)  -> nullable();
            $table->string('borderColor',50)  -> nullable();
            $table->string('textColor',50) -> nullable();
            $table->string('rrule',50)  -> nullable();
            $table->string('duration',50)  -> nullable();
            
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
        Schema::dropIfExists('eventos');
    }
}
