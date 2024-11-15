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
        Schema::create('futsal_standings', function (Blueprint $table) {
            $table->id();
            $table->string('team_name');
            $table->smallInteger('games_played');
            $table->smallInteger('wins');
            $table->smallInteger('losses');
            $table->smallInteger('draws');
            $table->smallInteger('goals_scored');    
            $table->smallInteger('goals_conceded');      

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Teams');
    }
};
