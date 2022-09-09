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
        Schema::create('juncs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->date('birth_date');
            $table->integer('salary');
            $table->string('gender');
            $table->string('department');
            $table->string('skill');
            $table->string('bio');
            $table->string('password');
            $table->string('role');
            $table->boolean('is_approved')->default(0);
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
        Schema::dropIfExists('juncs');
    }
};
