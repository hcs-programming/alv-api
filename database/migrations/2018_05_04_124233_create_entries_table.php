<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->integer('day_id');
            $table->integer('student_id');
            $table->string('attendance')->nullable();
            $table->boolean('lunch')->nullable();
            $table->boolean('beard')->nullable();
            $table->boolean('belt')->nullable();
            $table->boolean('shoes')->nullable();
            $table->boolean('uniform')->nullable();
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
        Schema::dropIfExists('entries');
    }
}
