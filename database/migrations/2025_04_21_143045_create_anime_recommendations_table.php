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
        Schema::create('anime_recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anime_id')->constrained()->onDelete('cascade');
            $table->foreignId('recommended_anime_id')->constrained('animes')->onDelete('cascade');
            $table->decimal('similarity_score', 5, 4); // Score between 0 and 1
            $table->string('reason')->nullable(); // Why this anime is recommended
            $table->timestamps();

            $table->unique(['anime_id', 'recommended_anime_id']);
            $table->index('similarity_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_recommendations');
    }
};
