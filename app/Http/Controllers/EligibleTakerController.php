<?php

namespace App\Http\Controllers;

use App\Models\AssessCode;
use App\Models\EligibleTaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EligibleTakerController extends Controller
{
    public function store(Request $request)
    {
        // Validate and store the registration record
        $request->validate([
            'assess_code' => [
                'required',
                'string',
                'exists:assess_codes,code',
            ]
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $assess_code = $request->input('assess_code');
        $code = AssessCode::where('code', $assess_code)
            ->where('user_id', $user_id)
            ->first();

        if ($code && (($user->id) !== ($code->user_id))) {
            return redirect()->back()->withErrors(['access_code' => 'Trying to access different code.']);
        }

        $admin = $code->admin_id;
        $assess_type = $code->assess_type_id;

        $eligibleTaker = EligibleTaker::create([
            'user_id' => $user_id,
            'admin_id' => $admin,
            'assess_type_id' => $assess_type
        ]);

        $code->delete();

        return redirect()->route('test-page')->with('success', 'You are now eligible to take the assessment.');
    }
}
