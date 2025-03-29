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
        Schema::table('debilidades', function (Blueprint $table) {
            if (!Schema::hasColumn('debilidades', 'tipo_id')) {
                $table->unsignedBigInteger('tipo_id')->nullable();
            }
            if (!Schema::hasColumn('debilidades', 'debilidad')) {
                $table->unsignedBigInteger('debilidad')->nullable();
            }
            if (!Schema::hasColumn('debilidades', 'status')) {
                $table->boolean('status')->default(1);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('debilidades', function (Blueprint $table) {
            //
        });
    }
};
