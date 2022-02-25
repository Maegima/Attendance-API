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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("cpf", 255)->unique();
            $table->string("email", 50)->unique();
            $table->string("remember_token", 100)->unique()->nullable()->default(null);
            $table->string("password", 64);
            $table->boolean("active")->default(true);
            $table->foreignId("type")->default(1)->constrained("permissions");
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
        Schema::dropIfExists('employees');
    }
};
