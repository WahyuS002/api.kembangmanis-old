<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        dd($request->all());
        $settingType = $request->settingType;

        $allowedFields = [];

        switch ($settingType) {
            case 'structure':
                $allowedFields = ['structureImage'];
                break;
        }

        $request->validate([
            'structureImage' => 'nullable',
        ]);

        foreach ($allowedFields as $field) {
            if (isset($request->settings[$field])) {
                Setting::where('key', $field)
                    ->update(
                        ['value' => $request->settings[$field]]
                    );
            }
        }

        return response()->json([
            "message" => "Successfuly update the settings",
        ]);
    }

    public function show(Request $request)
    {
        $settingType = $request->settingType;

        switch ($settingType) {
            case 'structure':
                $mediaItems = Setting::where('key', 'structureImage')->first()->getMedia();
                return response()->json([
                    "message" => "Successfuly get the structure image",
                    "structureImage" => $mediaItems[0]->getFullUrl(),
                ]);
                break;
        }
    }
}
