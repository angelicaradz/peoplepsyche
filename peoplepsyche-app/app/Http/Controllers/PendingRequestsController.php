<?php

namespace App\Http\Controllers;

use App\Models\AssessType;
use App\Models\PendingRequests;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendingRequestsController extends Controller
{
    public function showForm()
    {
        $assess_types = AssessType::all();

        if($assess_types === null){
            return response()->json(['error' => 'Variable not found'], 500);
        }
        else{
            return view('users.client.request-assess', compact('assess_types'));
        }
    }

    public function send_request(Request $request)
    {
        $user = auth()->user();
        $admin_id = $user->admin_id;

        if(!$admin_id){
            Log::error('Admin ID not found for user: ' . $user->id);
            return response()->json(['error' => 'User not found'], 500);
        }

        $validatedData = $request->validate([
            'assess_type' => [
                'required',
                'integer',
                'min:1',
                'exists:assess_types,id'
            ],
            'receipt' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $assess_type_id = $validatedData['assess_type'];
        $path = null;

        if ($request->hasFile('receipt')) {
            $file = $request->file('receipt');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('pictures', $filename, 'public');
        }

        try {
            $save_request = PendingRequests::create([
                'user_id' => $user->id,
                'admin_id' => $admin_id,
                'assess_type_id' => $assess_type_id,
                'receipt_path' => $path
            ]);
            Log::info('Request saved successfully for user: ' . $user->id);
        } catch (\Exception $e) {
            Log::error('Error saving request for user: ' . $user->id . ' - ' . $e->getMessage());
            return response()->json(['error' => 'Failed to save request'], 500);
        }

        return redirect()->route('request-assess-form')->with('success', 'Request sent!');
    }
}
