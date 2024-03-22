<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('themes')){ 
            Schema::create('themes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('code');
                $table->tinyInteger('is_active')->default(1);
                $table->tinyInteger('is_default')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });
        } 

        \DB::table('themes')->insert(array (
            0 => 
            array (
                'id'         => '1',
                'name'       => 'Grocery',
                'code'       => 'default',
                'is_active'  => '1',
                'is_default' => '1',
                'created_at' => '2023-09-16 12:21:37',
                'updated_at' => '2023-09-16 12:21:37',
                'deleted_at' => NULL
            ),
            array (
                'id'         => '2',
                'name'       => 'Halal Food',
                'code'       => 'halal',
                'is_active'  => '1',
                'is_default' => '0',
                'created_at' => '2023-09-16 12:21:37',
                'updated_at' => '2023-09-16 12:21:37',
                'deleted_at' => NULL
            ),
        )); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
