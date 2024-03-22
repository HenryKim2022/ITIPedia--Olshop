<?php

use App\Models\Category;
use App\Models\CategoryTheme;
use App\Scopes\ThemeCampaignScope;
use App\Scopes\ThemeCategoryScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssignExistingCategoriesToDefaultTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('themes') && Schema::hasTable('categories')){ 
            
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
