<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',10);
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('status')->default(0);
            $table->boolean('admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create(['name'=>'admin','email'=>'admin@admin.com','password'=>'$2y$10$XlSxrLH5LgUIPSeUH12i/.itGM6dRyU.6tNI9tv5IabhHs2jNWKWK','admin'=>1,'status'=>1]);
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
