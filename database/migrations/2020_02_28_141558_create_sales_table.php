<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name')->nullable();
            $table->decimal('value', 8, 2);
            $table->date('purchase_date')->nullable();
            $table->date('start_sales_period')->nullable();
            $table->date('end_sales_period')->nullable();
            $table->string('cpf_or_cnpj_client', 30)->nullable();
            $table->string('sale_code', 30)->nullable();
            $table->dateTime('validated')->nullable();
            $table->date('computed_for_reporting')->nullable();

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
        Schema::dropIfExists('sales');
    }
}
