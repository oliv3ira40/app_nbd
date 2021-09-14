<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnualSalesResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_sales_results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('year', 4)->nullable();
            
            $table->integer('number_of_sales')->nullable();
            $table->integer('number_of_unique_sales')->nullable();
            $table->bigInteger('accumulated_points')->nullable();
            
            $table->unsignedBigInteger('specifier_id')->nullable();
            $table->foreign('specifier_id')
                ->references('id')->on('entities')
                ->onDelete('cascade');

            $table->unsignedBigInteger('entity_id')->nullable();
            $table->foreign('entity_id')
                ->references('id')->on('entities')
                ->onDelete('cascade');

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
        Schema::dropIfExists('annual_sales_results');
    }
}
