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
        Schema::create('ordre_produkt', function (Blueprint $table) {
            $table->unsignedBigInteger('ordre_id');
            $table->foreign('ordre_id')->references('id')->on('ordrer')->onDelete('cascade');
            $table->unsignedBigInteger('produkt_id');
            $table->foreign('produkt_id')->references('id')->on('produkter')->onDelete('cascade');
            $table->integer('kvantitet')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produkt_ordre');
    }
};
