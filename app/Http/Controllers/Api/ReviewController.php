<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::query();

        // Channel Filter
        if ($request->filled('channel') && $request->channel !== 'All') {
            $query->where('channel', strtolower($request->channel));
        }

        // Dynamic Sort
        $sortField = $request->get('sort', 'submitted_at');
        $sortOrder = $request->get('order') === 'asc' ? 'asc' : 'desc';

        // Safety check: only allow sorting on actual columns
        $allowedSorts = ['submitted_at', 'cleanliness', 'communication', 'respect_house_rules', 'average_rating', 'guest_name'];

        if (in_array($sortField, $allowedSorts)) {
            $query->orderBy($sortField, $sortOrder);
        }

        return $query->paginate($request->get('per_page', 10));
    }

    public function getRatingStats()
    {
        // Simple, high-performance aggregation on flattened columns
        $stats = Review::select([
            DB::raw('ROUND(AVG(cleanliness), 1) as avg_clean'),
            DB::raw('ROUND(AVG(communication), 1) as avg_comm'),
            DB::raw('ROUND(AVG(respect_house_rules), 1) as avg_rules'),
            DB::raw('ROUND(AVG(average_rating), 1) as overall'),
            DB::raw('COUNT(*) as total_count')
        ])->first();

        // Map to your UI structure
        return response()->json([
            [
                'category' => 'Cleanliness',
                'rating' => (float)($stats->avg_clean ?? 0),
                'count' => $stats->total_count,
                'icon' => 'Sparkles',
                'color' => 'text-emerald-600'
            ],
            [
                'category' => 'Communication',
                'rating' => (float)($stats->avg_comm ?? 0),
                'count' => $stats->total_count,
                'icon' => 'MessageSquare',
                'color' => 'text-blue-600'
            ],
            [
                'category' => 'House Rules',
                'rating' => (float)($stats->avg_rules ?? 0),
                'count' => $stats->total_count,
                'icon' => 'ShieldCheck',
                'color' => 'text-purple-600'
            ],
            [
                'category' => 'Overall Experience',
                'rating' => (float)($stats->overall ?? 0),
                'count' => $stats->total_count,
                'icon' => 'Star',
                'color' => 'text-amber-500'
            ]
        ]);
    }

    public function toggleStatus(Request $request, Review $review)
    {
        $status = $request->get('status');
        if (!$review) {
            return response()->json(['message' => 'no review found'], 400);
        }
        $review->status = $status;
        $review->save();
        return response()->json(['message' => 'toggled successfully']);
    }
}
