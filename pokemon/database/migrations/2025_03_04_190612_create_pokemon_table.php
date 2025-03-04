<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 20);
            $table->unsignedTinyInteger('id_tipo1');
            $table->unsignedTinyInteger('id_tipo2')->nullable();

            $table->timestamps();

            //relacion
            $table->foreign('id_tipo1')->references('id')->on('tipos')->onDelete('cascade');
            $table->foreign('id_tipo2')->references('id')->on('tipos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
