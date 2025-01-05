<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // PRIMARY KEY, auto-increment, unsigned
            $table->string('name', 255)->nullable(false); // varchar(255), NOT NULL
            $table->string('email', 255)->nullable(false); // varchar(255), NOT NULL
            $table->string('password', 255)->nullable(false); // varchar(255), NOT NULL
            $table->timestamps(); // created_at and updated_at timestamps
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
