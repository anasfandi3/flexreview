<?php

namespace App\Services;

use App\Enums\ChannelTypes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HostawayService
{
    protected $access_token;
    protected $api_url;
    protected $client_id;
    protected $client_secret;

    public function __construct()
    {
        $this->api_url = config('services.hostaway.api_url');
        $this->client_id = config('services.hostaway.client_id');
        $this->client_secret = config('services.hostaway.client_secret');
    }
    private function getAccessToken()
    {
        return Cache::rememberForever('hostaway_access_token', function () {
            //to silence intelphense
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::asForm()->post($this->api_url . '/accessTokens', [
                'grant_type' => 'client_credentials',
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'scope' => 'general',
            ]);
            if (! $response->successful()) {
                return null;
            }
            $data = $response->json();
            return $data['access_token'] ?? null;
        });
    }
    public function fetchReviews()
    {
        $token = $this->getAccessToken();
        if (! $token) {
            return [];
        }
        //to silence intelphense
        /** @var \Illuminate\Http\Client\Response $response */
        $response = Http::withToken($token)->get($this->api_url . '/reviews');
        if ($response->status() === 401 || $response->status() === 403) {
            Cache::forget('hostaway_access_token');
            return [];
        }

        if (!$response->successful()) {
            return [];
        }
        return $response->json()['result'] ?? [];
    }
    public function normalizeReviews($rawReviews)
    {
        return collect($rawReviews)
            ->map(fn($review) => $this->normalize($review))
            ->values();
    }
    private function normalize($review)
    {
        $ratings = [];
        $reviewRatings = $review['reviewCategory'] ?? [];
        $averageRating = 0;
        $count = 0;
        foreach ($reviewRatings as $rr) {
            if ($rr['category'] ?? false) {
                $rating = $rr['rating'] ?? 0;
                $ratings[$rr['category']] = $rating;
                $averageRating += $rating;
                $count++;
            }
        }
        if ($count > 0) {
            $averageRating = round($averageRating / $count, 1);
        }
        return [
            ...$ratings,
            'external_id' => $review['id'] ?? null,
            'channel' => ChannelTypes::HOSTAWAY->value,
            'type' => $review['type'] ?? null,
            'status' => $review['status'] ?? null,
            'average_rating' => $averageRating,
            'review_text' => $review['publicReview'] ?? null,
            'submitted_at' => isset($review['submittedAt']) ? Carbon::parse($review['submittedAt']) : null,
            'guest_name' => $review['guestName'] ?? null,
            'listing_name' => $review['listingName'] ?? null,
        ];
    }
}
