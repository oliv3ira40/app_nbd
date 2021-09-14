<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesHasProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices_has_professionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('office_id')->nullable();
            $table->foreign('office_id')
                ->references('id')->on('offices')
                ->onDelete('cascade');

            $table->unsignedBigInteger('professional_id')->nullable();
            $table->foreign('professional_id')
                ->references('id')->on('professionals')
                ->onDelete('cascade');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices_has_professionals');
    }
}
