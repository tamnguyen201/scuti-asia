<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateEvaluateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_evaluate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id');
            $table->boolean('stage1');
            $table->boolean('stage2')->nullable();
            $table->string('comment2')->nullable();
            $table->boolean('stage3')->nullable();
            $table->string('comment3')->nullable();
            $table->boolean('stage4')->nullable();
            $table->string('comment4')->nullable();
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_evaluate');
    }
}
