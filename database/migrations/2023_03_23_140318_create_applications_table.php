<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('orientation')->nullable();
            $table->string('candidature')->nullable();
            $table->string('first_choice');
            $table->string('first_choice_center');
            $table->string('first_choice_location');
            $table->string('second_choice');
            $table->string('second_choice_center');
            $table->string('second_choice_location');
            $table->string('third_choice')->nullable();
            $table->string('third_choice_center')->nullable();
            $table->string('third_choice_location')->nullable();
            $table->integer('status')->default(0)->nullable();
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
        Schema::dropIfExists('applications');
    }
}
