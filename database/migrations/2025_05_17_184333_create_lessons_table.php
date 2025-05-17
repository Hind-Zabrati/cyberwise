<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('lessons', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->enum('type', ['text', 'video', 'pdf']);
        $table->text('content')->nullable(); // pour texte ou chemin vers fichier
        $table->unsignedBigInteger('module_id');
        $table->timestamps();

        $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
