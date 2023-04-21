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
        Schema::table('animes', function (Blueprint $table) {
            $table->string('cover_image')->nullable();
            $table->date('release_date')->nullable();
            $table->string('genre')->nullable();
            $table->decimal('rating', 3, 1)->default(0);
            $table->integer('episodes')->nullable();
            $table->string('studio')->nullable();
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing');
            $table->text('synopsis')->nullable();
            $table->string('trailer_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animes', function (Blueprint $table) {
            $table->dropColumn([
                'cover_image',
                'release_date',
                'genre',
                'rating',
                'episodes',
                'studio',
                'status',
                'synopsis',
                'trailer_url'
            ]);
        });
    }
};
