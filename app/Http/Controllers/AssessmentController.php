<?php

namespace App\Http\Controllers;

use App\Models\AssessmentResult;
use App\Models\EligibleTaker;
use App\Models\GodsGiftTest;
use App\Models\Taker;
use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssessmentController extends Controller
{

    public function store(Request $request)
    {

        $user = auth()->user();
        $user_id = $user->id;
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
                'user_id' => $user_id,
                'admin_id' => $admin,
                'strengths' => $strengths,
                'weaknesses' => $weaknesses
            ]);

            Log::info('God\'s Gift Test saved', ['godsGift_result' => $godsGift_result]);

            $test_id = $godsGift_result->id;

            Log::info('Test ID retrieved', ['test_id' => $test_id]);

            $getTestData = Tests::where('user_id', $user_id)
                ->where('admin_id', $admin)
                ->where('testable_id', $test_id)
                ->orderBy('created_at', 'desc')
                ->first();

            Log::info('Test Data retrieved', ['getTestData' => $getTestData]);

            $getTakerData = EligibleTaker::where('user_id', $user_id)
                ->where('admin_id', $admin)
                ->first();

            $eligible_taker_id = $getTakerData->id;

            Log::info('Eligible Taker retrieved:', ['eligible_taker_id' => $eligible_taker_id]);

            // Log the values that will be used to create AssessmentResult
            Log::info('Creating AssessmentResult with values', [
                'eligible_taker_id' => $eligible_taker_id,
                'user_id' => $user_id,
                'assess_type_id' => $getTakerData->assess_type_id,
                'admin_id' => $admin,
                'tests_id' => $getTestData->id
            ]);

            $assessmentResult = AssessmentResult::create([
                'eligible_taker_id' => $eligible_taker_id,
                'user_id' => $user_id,
                'assess_type_id' => $getTakerData->assess_type_id,
                'admin_id' => $admin,
                'tests_id' => $getTestData->id
            ]);

            $taker = Taker::updateOrCreate(
                ['user_id' => $user_id],
                [
                    'admin_id' => $admin,
                    'assess_type_id' => $getTakerData->assess_type_id
                ]
            );

            $getTakerData->delete();

            Log::info('Assessment Result saved', ['assessmentResult' => $assessmentResult]);

        } catch (\Exception $e) {
            // Handle exception if save operation fails
            Log::error('Failed to save assessment data: ' . $e->getMessage());
            // Optionally, return a JSON response with error message
            return response()->json(['error' => 'Failed to save assessment data'], 500);
        }
    }
}
