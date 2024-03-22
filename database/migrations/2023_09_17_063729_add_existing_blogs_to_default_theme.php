<?php

use App\Models\Blog;
use App\Models\BlogTheme;
use App\Scopes\ThemeBlogScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExistingBlogsToDefaultTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        if(Schema::hasTable('themes') && Schema::hasTable('blogs')){ 
            $blogs = Blog::withoutGlobalScope(ThemeBlogScope::class)->get();
            $data = [];
            foreach ($blogs as $blog) {
                $tempArr = [
                    'blog_id' => $blog->id,
                    'theme_id' => 1,
                ];
                array_push($data, $tempArr);
            }

            if(!empty($data)){
                BlogTheme::insert($data);
            }
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
