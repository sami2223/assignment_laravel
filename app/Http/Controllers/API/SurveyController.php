<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\SurveyMail;
use App\Models\Survey;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function create(Request $request)
    {
        
        $request->validate([
            'name' => "required|min:2",
            'gender' => "required|max:1",
            'img_or_vid' => 'required|mimes:jpg,png,jpeg,gif,svg,mp4,3gp,mkv',
            'voice' => 'required|mimes:mp3,wav',
        ]);
        $img_or_vid_path = $request->file('img_or_vid')->store('images', 'public');
        $voice_path = $request->file('voice')->store('voices', 'public');
        try {
            $survey = Survey::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'img_or_vid' => $img_or_vid_path,
                'voice' => $voice_path,
            ]);

            // mail send to admin
            Mail::to('admin@test.com')->send(new SurveyMail($survey));

            return response([
                'message' => "Email sent successfully",
                'data' => $survey
            ], 200);
        } catch (Exception $ex) {
            return response([
                'message' => $ex->getMessage()
            ], 400);
        }
    }
}
