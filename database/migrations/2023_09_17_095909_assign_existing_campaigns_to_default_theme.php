<?php

use App\Models\Campaign;
use App\Models\CampaignTheme;
use App\Scopes\ThemeCampaignScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssignExistingCampaignsToDefaultTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('themes') && Schema::hasTable('campaigns')){ 
            $campaigns = Campaign::withoutGlobalScope(ThemeCampaignScope::class)->get(); 
            $data = [];
            foreach ($campaigns as $campaign) {
                $tempArr = [
                    'campaign_id' => $campaign->id,
                    'theme_id' => 1,
                ];
                array_push($data, $tempArr);
            } 
            if(!empty($data)){
                CampaignTheme::insert($data);
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
