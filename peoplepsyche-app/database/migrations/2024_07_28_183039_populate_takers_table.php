<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fetch the most recent test record for each user
        $latestResults = DB::table('assessment_results')
            ->select('assessment_results.*')
            ->whereIn('id', function($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('assessment_results')
                    ->groupBy('user_id');
            })
            ->get();

        foreach ($latestResults as $result) {
            // Insert or update the takers table
            DB::table('takers')->updateOrInsert(
                ['user_id' => $result->user_id],
                [
                    'admin_id' => $result->admin_id,
                    'created_at' => $result->created_at,
                    'updated_at' => now()
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Get all user_ids from takers table
        $takerUserIds = DB::table('takers')->pluck('user_id');

        foreach ($takerUserIds as $userId) {
            // Get the second most recent test record for each user
            $previousResult = DB::table('assessment_results')
                ->where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->skip(1)
                ->first();

            if ($previousResult) {
                // Update the takers table with the previous test information
                DB::table('takers')
                    ->where('user_id', $userId)
                    ->update([
                        'admin_id' => $previousResult->admin_id,
                        'created_at' => $previousResult->created_at,
                        'updated_at' => now()
                    ]);
            } else {
                // If no previous test exists, remove the record from the takers table
                DB::table('takers')
                    ->where('user_id', $userId)
                    ->delete();
            }
        }
    }
};
