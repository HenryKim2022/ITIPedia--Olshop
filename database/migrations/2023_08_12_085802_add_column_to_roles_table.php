<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; 
class AddColumnToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::table('roles', function (Blueprint $table) {
                $table->boolean('is_system')->nullable()->default(false);
                $table->tinyInteger('is_active')->default(1);
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->tinyInteger('is_delete')->nullable()->default(1);
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        try {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
            });
        } catch (\Throwable $th) {
            //throw $th;
        }

        try { 
            $data = [
                array('id' => '140', 'name' => 'own_staff', 'group_name' => 'staffs', 'guard_name' => 'web'),
                array('id' => '141', 'name' => 'delete_variations', 'group_name' => 'variations', 'guard_name' => 'web'),
            ]; 
            \DB::table('permissions')->insert($data);
         
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $columns = ['is_system', 'is_active', 'created_by', 'updated_by', 'is_delete'];
            $table->dropColumn($columns);
        });
        Schema::table('users', function (Blueprint $table) {
            $userColumns = ['created_by', 'updated_by'];
            $table->dropColumn($userColumns);
        });
    }
}
