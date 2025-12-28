<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Services\HostawayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HostawayController extends Controller
{
    protected $hostawayService;
    public function __construct(HostawayService $hostawayService)
    {
        $this->hostawayService = $hostawayService;
    }
    public function syncReviews()
    {
        try {
            $rawReviews = $this->getReviews();
            $normalized = $this->hostawayService->normalizeReviews($rawReviews);
            $this->storeReviews($normalized);
            return response()->json(['data' => $normalized]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Failed to load reviews',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    private function getReviews()
    {
        $reviews = $this->hostawayService->fetchReviews();

        if (! empty($reviews)) {
            $rawReviews = $reviews;
        } else {
            // fallback to mock
            $mock = file_get_contents(public_path('reviews.json'));
            if (! $mock) {
                if (! $mock) {
                    throw new \Exception('Mock file not found or empty');
                }
            }
            $decoded = json_decode($mock, true);
            $rawReviews = $decoded['result'] ?? [];
        }
        return $rawReviews;
    }
    private function storeReviews($normalized)
    {
        DB::transaction(function () use ($normalized) {
            foreach ($normalized as $review) {
                Review::updateOrCreate([
                    'external_id' => $review['external_id'],
                ], $review);
            }
        });
    }
}
