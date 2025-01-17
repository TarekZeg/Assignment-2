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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('player_name'); // Define player_name as a string
            $table->integer('player_number'); // Define player_number as an integer
            $table->integer('player_games')->default(0);
            $table->integer('player_goals')->default(0);
            $table->integer('player_assists')->default(0);
            $table->integer('player_yellow')->default(0);
            $table->integer('player_red')->default(0);
            $table->string('player_position');
    
            // Foreign Key referencing `id` in the `futsal_standings` table
            $table->foreignId('futsal_standings_id')->nullable()->constrained('futsal_standings')->onDelete('set null');
    
            // $table->timestamps();
        });
    }
    
    


    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
