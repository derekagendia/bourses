<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScolarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scolarships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('type',['NATIONAL','COOPERATION']);
            $table->string('specialty')->nullable();
            $table->string('entry_level')->nullable();
            $table->string('exam_type')->nullable();
            $table->string('language')->nullable();
            $table->integer('training_period')->nullable();
            $table->string('country')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(1)->nullable();
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
        Schema::dropIfExists('scolarships');
    }
}
