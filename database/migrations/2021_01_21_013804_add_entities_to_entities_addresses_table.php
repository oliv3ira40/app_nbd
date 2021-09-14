<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEntitiesToEntitiesAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entities_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->foreign('entity_id')
                ->references('id')->on('entities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entities_addresses', function (Blueprint $table) {
            //
        });
    }
}