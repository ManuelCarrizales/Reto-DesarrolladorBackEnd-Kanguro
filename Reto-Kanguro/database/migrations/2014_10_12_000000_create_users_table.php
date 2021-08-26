<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        DB::table('users')->insert(array( 'name' => 'Manuel Carrizales', 'email' => 'manuc-jack-@hotmail.com', 'password' => 'Manucxv99'));
        DB::table('users')->insert(array( 'name' => 'Isaías Vázquez', 'email' => 'isaias_vazquez_@hotmail.com', 'password' => 'VqzIsa'));
        DB::table('users')->insert(array( 'name' => 'Manuel Vázquez', 'email' => 'manuel_vqz@hotmail.com', 'password' => 'ManuVqz'));

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
