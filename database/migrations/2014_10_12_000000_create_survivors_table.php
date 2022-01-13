<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurvivorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survivors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('age');
            $table->enum('gender', ['Male', 'Female']);
            $table->double('latitude', 18,8);
            $table->double('longitude', 18,8);
            $table->boolean('infected')->default(0);
            $table->decimal('points',18,2)->default(0);

            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
