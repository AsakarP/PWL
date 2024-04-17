<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polling_details', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('nrp_user', 8);
            $table->char('kode_mata_kuliah', 6);
            $table->char('guid_polling', 36);
            $table->foreign('nrp_user')->references('nrp')->on('users')->onDelete('cascade');
            $table->foreign('kode_mata_kuliah')->references('kode')->on('mata_kuliahs')->onDelete('cascade');
            $table->foreign('guid_polling')->references('guid')->on('pollings')->onDelete('cascade');
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
        Schema::dropIfExists('polling_details');
    }
}
