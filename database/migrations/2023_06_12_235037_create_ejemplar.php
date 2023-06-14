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
        Schema::create('ejemplar', function (Blueprint $table) {
            $table->id();
            $table->string('localizacion');
            $table->integer('cantidad');
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id')->references('id')->on('libro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejemplar');
    }
};
