<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = "mysql";
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'name'     => 'Juan',
                'email'    => 'juan@gmail.com',
                'password' => bcrypt("test1234"),
                'role'     => "admin"
            )
        );
        DB::table('users')->insert(
            array(
                'name'     => 'Test',
                'email'    => 'test@test.com',
                'password' => bcrypt("test1234"),
                'role'     => "user"
            )
        );
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
