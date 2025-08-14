<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\AdEvent;
use App\Http\Requests\StoreRequest;

class AdController extends Controller
{
  public function list(Request $request)
    {
        $ads = Ad::orderByDesc('id')->paginate(20);
        return response()->json($ads);
    }

    // Create/Update/Delete
    public function store(StoreRequest $request)
    {
        $ad = Ad::create($request->validated());
        return response()->json($ad, 201);
    }

    public function update(StoreRequest $request, Ad $ad)
    {
        $ad->update($request->validated());
        return response()->json($ad);
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return response()->noContent();
    }

    /**
     * Endpoint pengambilan iklan by placement (server-side weighted rotation)
     * /api/ads?placement=header&limit=3
     */
    // public function index(Request $request)
    // {
    //     $placement = $request->query('placement');
    //     $limit = (int) $request->query('limit', 5);

    //     $query = Ad::active();
    //     if ($placement) $query->where('placement', $placement);

    //     $ads = $query->get();
    //     if ($ads->isEmpty()) return response()->json([]);

    //     // Weighted sampling
    //     $pool = [];
    //     foreach ($ads as $ad) {
    //         for ($i=0; $i < max(1, (int)$ad->weight); $i++) $pool[] = $ad;
    //     }

    //     shuffle($pool);
    //     $picked = collect($pool)->take(max(1, $limit))->unique('id')->values();

    //     // Serialisasi dengan url media
    //     $resp = $picked->map(function($ad){
    //         return [
    //             'id' => $ad->id,
    //             'title' => $ad->title,
    //             'type' => $ad->type,
    //             'placement' => $ad->placement,
    //             'media_path' => $ad->media_path,
    //             'url' => $ad->url,
    //             'link_url' => $ad->link_url,
    //             'duration' => $ad->duration,
    //             'autoplay' => $ad->autoplay,
    //             'mute' => $ad->mute,
    //             'meta' => $ad->meta,
    //         ];
    //     });

    //     return response()->json($resp);
    // }



    public function index(Request $request)
{
    $placements = ['header', 'inline', 'sidebar', 'footer', 'popup'];
    $adsByPlacement = [];

    foreach ($placements as $placement) {
        $adsByPlacement[$placement] = $this->getWeightedAds($placement, 3); // max 3 iklan per placement
    }

    return view('landing.index', [
        'ads' => $adsByPlacement
    ]);
}

private function getWeightedAds($placement, $limit = 5)
{
    $ads = Ad::active()->where('placement', $placement)->get();
    if ($ads->isEmpty()) return collect();

    $pool = [];
    foreach ($ads as $ad) {
        for ($i = 0; $i < max(1, (int)$ad->weight); $i++) {
            $pool[] = $ad;
        }
    }

    shuffle($pool);

    return collect($pool)
        ->take(max(1, $limit))
        ->unique('id')
        ->values();
}

    // Tracking event sederhana
    public function event(Request $request)
    {
        $data = $request->validate([
            'ad_id' => 'required|exists:ads,id',
            'event' => 'required|in:impression,click,close,start,complete,mute,unmute',
            'session_id' => 'nullable|string|max:100',
        ]);

        AdEvent::create([
            'ad_id' => $data['ad_id'],
            'event' => $data['event'],
            'session_id' => $data['session_id'] ?? null,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'occurred_at' => now(),
        ]);

        return response()->noContent();
    }


 // Controller
public function getThumbnailFromWebsite($url)
{
    $html = @file_get_contents($url);
    preg_match('/<meta property="og:image" content="(.*?)"/i', $html, $matches);
    if (isset($matches[1])) {
        return $matches[1]; // URL gambar thumbnail
    }
    return null; // fallback
}
}

