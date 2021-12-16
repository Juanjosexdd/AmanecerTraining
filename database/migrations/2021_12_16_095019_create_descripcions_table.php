<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripcions', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('procedimiento_id');
            
            $table->foreign('procedimiento_id')
                  ->references('id')
                  ->on('procedimientos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('descripcions');
    }
}
