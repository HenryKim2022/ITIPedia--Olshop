<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsForDeliverymanToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('is_active')->after('is_banned')->default(1)->comment('added for deliveryman');   
            $table->tinyInteger('location_id')->after('postal_code')->default(1)->comment('added for deliveryman');   
            $table->longText('address')->after('location_id')->nullable()->comment('added for deliveryman');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
