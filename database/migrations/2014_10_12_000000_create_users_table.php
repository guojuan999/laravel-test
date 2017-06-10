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
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'name'     => 'Juan',
                'email'    => 'juan@gmail.com',
                'password' => bcrypt("test1234"),
                'is_admin' => 1
            )
        );
        DB::table('users')->insert(
            array(
                'name'     => 'Test',
                'email'    => 'test@test.com',
                'password' => bcrypt("test1234"),
                'is_admin' => 0
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
