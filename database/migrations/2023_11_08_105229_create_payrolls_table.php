<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('basic_salary',12,2);
            $table->boolean('status');
            $table->string('month');
            $table->text('bonus')->nullable();
            $table->text('deduct')->nullable();
            $table->decimal('total_allownce',12,2);
            $table->decimal('total_deduction',12,2);
            $table->decimal('total_salary', 12,2);
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
        Schema::dropIfExists('payrolls');
    }
}
