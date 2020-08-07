<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanidateEvaluateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canidate_evaluate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('canidate_id');
            $table->boolean('stage1')->default(0);
            $table->boolean('stage2')->default(0);
            $table->string('comment2');
            $table->boolean('stage3')->default(0);
            $table->string('comment3');
            $table->boolean('stage4')->default(0);
            $table->string('comment4');
            $table->timestamps();

            $table->foreign('canidate_id')->references('id')->on('canidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canidate_evaluate');
    }
}
