<?php

namespace App\Http\Controllers;

use App\Models\GodsGiftTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AssessmentController extends Controller
{

    public function store(Request $request)
    {

        $user = auth()->user();
        $admin = $user->admin_id;

        // Retrieve the JSON data from the request
        $data = $request->json()->all();

        // Extract the "strengths" and "weaknesses" arrays
        $strengths = $data['strengths'];
        $weaknesses = $data['weaknesses'];

        $godsGift_data = $request->validate([
            'strengths' => ['nullable', 'array'],
            'weaknesses' => ['nullable', 'array']
        ]);

        try {

            $godsGift_data['user_id'] = $user->id;

            $godsGift_result = GodsGiftTest::create([
                'user_id' => $user->id,
                'admin_id' => $admin,
                'strengths' => $strengths,
                'weaknesses' => $weaknesses
            ]);

            Log::info("Assessment data saved successfully");

        } catch (\Exception $e) {
            // Handle exception if save operation fails
            Log::error('Failed to save assessment data: ' . $e->getMessage());
            // Optionally, return a JSON response with error message
            return response()->json(['error' => 'Failed to save assessment data'], 500);
        }
    }
}
