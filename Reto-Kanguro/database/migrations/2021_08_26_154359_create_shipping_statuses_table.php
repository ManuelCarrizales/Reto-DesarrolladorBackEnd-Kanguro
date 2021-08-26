<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateShippingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });

        DB::table('shipping_statuses')->insert(array( 'description' => 'En paqueteria' ));
        DB::table('shipping_statuses')->insert(array( 'description' => 'Enviado' ));
        DB::table('shipping_statuses')->insert(array( 'description' => 'En espera' ));
        DB::table('shipping_statuses')->insert(array( 'description' => 'Entregado' ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_statuses');
    }
}
