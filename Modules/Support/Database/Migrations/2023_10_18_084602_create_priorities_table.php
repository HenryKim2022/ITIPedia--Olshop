<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Support\Entities\Priority;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active')->nullable()->default(true);
            $table->integer('user_id')->nullable();
            $table->text('color')->nullable();
            $table->timestamps();
        });
        $array = [
                [
                    'name'=>'High',
                    'color'=>'#e11414'
                ],
                [
                    'name'=>'Low',
                    'color'=>'#528118'
                ]
        ];
        foreach($array as $item)
        {
            Priority::updateOrCreate([
                'name'=>$item['name']
            ],
            [
                'color'=>$item['color'],
                'user_id'=>1
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
        Schema::dropIfExists('priorities');
    }
}
