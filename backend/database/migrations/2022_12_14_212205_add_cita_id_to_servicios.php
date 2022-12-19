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
        Schema::table('servicios', function (Blueprint $table) {
                // Relación
                $table->unsignedBigInteger('cita_id');
                // Un paciente puede realizar muchos citas y un cita le pertenece a un paciente            $table->unsignedBigInteger('role_id');
                $table->foreign('cita_id')
                        ->references('id')
                        ->on('citas')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            //
        });
    }
};
