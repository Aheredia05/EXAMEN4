<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
             // ID para la tabla de la BDD
             $table->id();

             // columnas para la tabla de la BDD
             $table->date('fechac')->nullable();
             $table->string('description')->nullable();
             $table->boolean('state')->default(true);

             $table->string('sintomas')->nullable();
             $table->string('diagnostico')->nullable();
             $table->string('prescripcion')->nullable();
             $table->string('observaciones')->nullable();
 
             // Relación
             $table->unsignedBigInteger('paciente_id');
             // Un paciente puede realizar muchos citas y un cita le pertenece a un paciente            $table->unsignedBigInteger('role_id');
             $table->foreign('paciente_id')
                     ->references('id')
                     ->on('pacientes')
                     ->onDelete('cascade')
                     ->onUpdate('cascade');

      
 
             // columnas especiales para la tabla de la BDD
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
        Schema::dropIfExists('citas');
    }
};
