<?php

namespace App\Services;

use App\Models\SystemSetting;
use App\Models\Theme;

class ThemeService
{
    public function getAllThemes()
    {
        return Theme::query()->get();
    }
    public function findThemeById($id)
    {
        return Theme::query()->findOrFail($id);
    }

    public function makeThemeDefault(object $theme)
    {
        $theme->update(["is_default" => 1]);

        return $theme;

    }


    public function makeActiveThemes(int $theme_id)
    {

        $theme = $this->findThemeById($theme_id);

        return $this->updateThemeAsActive($theme);
    }

    public function setInactiveThemes()
    {
        return Theme::query()->update(["is_active" => 0]);
    }

    public function updateThemeAsActive(object $theme)
    {
        $theme->update(["is_active" => 1]);

        return $theme;
    }

    public function updateSystemSettingsActiveThemes(object $theme)
    {
        $isKeyExists = $this->findBySystemSettingByEntity(appStatic()::ENTITY_ACTIVE_THEMES);

        $activeThemesEncoded = json_encode(["$theme->id"]);

        $payloads = [
            "entity" =>appStatic()::ENTITY_ACTIVE_THEMES,
            "value" => $activeThemesEncoded,
        ];

        if (empty($isKeyExists)){
            SystemSetting::query()->create($payloads);

            return $theme;
        }


         $isKeyExists->update($payloads);

        return $theme;
    }

    public function findBySystemSettingByEntity($entity)
    {
        return SystemSetting::query()->where("entity", $entity)->first();
    }
}
