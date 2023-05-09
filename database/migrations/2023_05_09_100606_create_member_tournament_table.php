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
        Schema::create('member_tournament', function (Blueprint $table) {
            $table->softDeletes();
            $table->foreignId('member_id')->constrained();
            $table->foreignId('tournament_id')->constrained();
            $table->integer('tournament_rank');
            $table->primary(['tournament_id', 'member_id']);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_tournamnet');
    }
};
