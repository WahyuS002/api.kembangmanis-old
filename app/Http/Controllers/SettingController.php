<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $settingType = $request->settingType;

        $allowedFields = [];

        switch ($settingType) {
            case 'structure-image':
                $allowedFields = ['structureImage'];
                break;
        }

        $request->validate([
            'structureImage' => 'nullable',
        ]);

        foreach ($allowedFields as $field) {
            if (isset($request->settings_value[$field])) {
                Setting::where('key', $field)
                    ->update(
                        ['value' => $request->settings_value[$field]]
                    );
            }
        }

        if ($request->hasFile('structureImage')) {
            $structure = Setting::where('key', 'structureImage')->first();
            $structure->clearMediaCollection('setting_images');
            $structure->addMediaFromRequest('structureImage')->toMediaCollection('setting_images');
        }

        return response()->json([
            "message" => "Successfuly update the settings",
        ]);
    }

    public function show(Request $request)
    {
        $settingType = $request->settingType;

        switch ($settingType) {
            case 'structure-image':
                $mediaItems = Setting::where('key', 'structureImage')->first()->getMedia('setting_images');
                return response()->json([
                    "message" => "Successfuly get the structure image",
                    "structureImage" => $mediaItems[0]->getFullUrl(),
                ]);
                break;
        }
    }
}
