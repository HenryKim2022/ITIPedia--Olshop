<?php

use App\Models\EnmartModule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnmartModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enmart_modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_default')->nullable()->default(false);
            $table->boolean('is_paid')->nullable()->default(false);
            $table->boolean('is_verified')->nullable()->default(false);
            $table->text('description')->nullable();
            $table->string('purchase_code')->nullable();
            $table->string('domain')->nullable();
            $table->timestamps();
        });
        $defaultModules = ['Support', 'PaymentGateway'];
        foreach($defaultModules as $module){
            EnmartModule::updateOrCreate([
                'name'=>$module
            ], [
                'is_default'=>1
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enmart_modules');
    }
}
