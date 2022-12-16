<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        try {
            return Settings::all();
        } catch (Exception $ex) {
            return response([
                'message' => $ex->getMessage()
            ], 400);
        }
    }

    public function create(Request $request)
    {
        
        $request->validate([
            'title' => "required|min:3",
            'sub_title' => "required|min:3",
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('image')->store('images', 'public');
        try {
            Settings::create([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => $image_path
            ]);
            return response([
                'message' => "Record saved successfully",
            ], 200);
        } catch (Exception $ex) {
            return response([
                'message' => $ex->getMessage()
            ], 400);
        }
    }

    public function delete(Settings $setting)
    {
        $setting->delete();

        return response()->json([
            "success" => true,
            "message" => "Record deleted successfully.",
            "data" => $setting
        ]);
    }
}
