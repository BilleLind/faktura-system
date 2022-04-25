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
        Schema::create('fakturas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('skabt')->nullable();
            $table->string("status");
            $table->unsignedInteger('total_pris');
            $table->string('til_firma');
            $table->string('til_addresse');
            $table->string('til_cvr');

            $table->unsignedBigInteger('ordre_id')->unique();
            $table->foreign('ordre_id')->references('id')->on('ordrer')->onDelete('cascade')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fakturas');
    }
};
