<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecuitmentCalidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recuitment_calidate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruitment_id');
            $table->foreignId('user_id');
            $table->foreignId('cv_id');
            $table->tinyInteger('stage');
            $table->timestamps();

            $table->foreign('recruitment_id')->references('id')->on('recruitments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cv_id')->references('id')->on('cvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recuitment_calidate');
    }
}
