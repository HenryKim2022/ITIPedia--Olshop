<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if(!Schema::hasColumn($table->getTable(), 'vedio_link')) {
                $table->text('vedio_link')->nullable();
            }
            if(!Schema::hasColumn($table->getTable(), 'created_by')) {
                $table->integer('created_by')->nullable();
            }
            if(!Schema::hasColumn($table->getTable(), 'updated_by')) {
                $table->integer('updated_by')->nullable();
            }
            if(!Schema::hasColumn($table->getTable(), 'is_import')) {
                $table->integer('is_import')->nullable()->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $columns = ['vedio_link', 'created_by', 'updated_by', 'is_import'];
            $table->dropColumn($columns);
        });
    }
};
