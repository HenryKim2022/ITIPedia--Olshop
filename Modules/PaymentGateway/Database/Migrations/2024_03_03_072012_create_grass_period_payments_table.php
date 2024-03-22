<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrassPeriodPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grass_period_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('order_id')->nullable();
            $table->string('transaction_status')->nullable();
            $table->string('status_code')->nullable();
            $table->integer('product_id');
            $table->longText('response');
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
        Schema::dropIfExists('grass_period_payments');
    }
}
