<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ad;
use Carbon\Carbon;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //  public function run(): void
    // {
    //     Ad::factory()->createMany([
    //         [
    //             'title' => 'Banner Header Promo',
    //             'type' => 'image',
    //             'placement' => 'header',
    //             'media_path' => 'ads/sample-header.webp',
    //             'link_url' => 'https://contoh.com/promo',
    //             'duration' => 8,
    //             'weight' => 3,
    //             'is_active' => true,
    //         ],
    //         [
    //             'title' => 'Video Sidebar',
    //             'type' => 'video',
    //             'placement' => 'sidebar',
    //             'media_path' => 'ads/sample-video.mp4',
    //             'link_url' => 'https://contoh.com/video',
    //             'duration' => 15,
    //             'weight' => 2,
    //             'is_active' => true,
    //         ],
    //         [
    //             'title' => 'Audio Spot',
    //             'type' => 'audio',
    //             'placement' => 'audio',
    //             'media_path' => 'ads/sample-audio.mp3',
    //             'link_url' => null,
    //             'duration' => 20,
    //             'weight' => 1,
    //             'is_active' => true,
    //         ],
    //         [
    //             'title' => 'Popup Harian',
    //             'type' => 'popup',
    //             'placement' => 'popup',
    //             'media_path' => 'ads/sample-popup.webp',
    //             'link_url' => 'https://contoh.com/daftar',
    //             'duration' => 0,
    //             'weight' => 1,
    //             'is_active' => true,
    //         ],
    //     ]);
    // }


    //  public function run()
    // {
    //     $now = Carbon::now();
    //     $nextWeek = Carbon::now()->addWeek();

    //     // Banner di header
    //     Ad::create([
    //         'title' => 'Promo Banner Header',
    //         'type' => 'image',
    //         'placement' => 'header',
    //         'media_path' => 'ads/banner-header.jpg',
    //         'link_url' => 'https://example.com',
    //         'is_active' => true,
    //         'start_at' => $now,
    //         'end_at' => $nextWeek,
    //     ]);

    //     // Video di header
    //     Ad::create([
    //         'title' => 'Promo Video Header',
    //         'type' => 'video',
    //         'placement' => 'header',
    //         'media_path' => 'ads/video-header.mp4',
    //         'link_url' => 'https://example.com/video',
    //         'is_active' => true,
    //         'start_at' => $now,
    //         'end_at' => $nextWeek,
    //     ]);

    //     // Audio di header
    //     Ad::create([
    //         'title' => 'Iklan Audio Header',
    //         'type' => 'audio',
    //         'placement' => 'header',
    //         'media_path' => 'ads/audio-header.mp3',
    //         'link_url' => null,
    //         'is_active' => true,
    //         'start_at' => $now,
    //         'end_at' => $nextWeek,
    //     ]);

    //     // Popup banner
    //     Ad::create([
    //         'title' => 'Promo Popup',
    //         'type' => 'image',
    //         'placement' => 'popup',
    //         'media_path' => 'ads/popup-banner.jpg',
    //         'link_url' => 'https://example.com/popup',
    //         'is_active' => true,
    //         'start_at' => $now,
    //         'end_at' => $nextWeek,
    //     ]);

    //     // Popup video
    //     Ad::create([
    //         'title' => 'Popup Video Promo',
    //         'type' => 'video',
    //         'placement' => 'popup',
    //         'media_path' => 'ads/popup-video.mp4',
    //         'link_url' => null,
    //         'is_active' => true,
    //         'start_at' => $now,
    //         'end_at' => $nextWeek,
    //     ]);

    //     // Popup audio
    //     Ad::create([
    //         'title' => 'Popup Audio Iklan',
    //         'type' => 'audio',
    //         'placement' => 'popup',
    //         'media_path' => 'ads/popup-audio.mp3',
    //         'link_url' => null,
    //         'is_active' => true,
    //         'start_at' => $now,
    //         'end_at' => $nextWeek,
    //     ]);
    // }



     public function run()
     
    {
        // Banner Header (Image)
        Ad::create([
            'title' => 'Promo Besar 70%',
            'type' => 'image',
            'placement' => 'header',
            'media_path' => 'https://images.unsplash.com/photo-1503602642458-232111445657',
            'link_url' => 'https://tokopedia.com',
            'is_active' => true,
            'start_at' => now(),
            'end_at' => now()->addWeek(),
        ]);

        // Banner Header (Video)
        Ad::create([
            'title' => 'Video Promo Gadget',
            'type' => 'video',
            'placement' => 'header',
            'media_path' => 'https://player.vimeo.com/external/450704786.sd.mp4?s=88a43b73f3d7a9f6ecb2f2b5f99377c3d1d664f1&profile_id=165',
            'link_url' => 'https://shopee.co.id',
            'is_active' => true,
            'start_at' => now(),
            'end_at' => now()->addWeek(),
        ]);

        // Popup Ad (Image)
        Ad::create([
            'title' => 'Diskon Akhir Tahun',
            'type' => 'image',
            'placement' => 'popup',
            'media_path' => 'https://images.unsplash.com/photo-1495020689067-958852a7765e',
            'link_url' => 'https://blibli.com',
            'is_active' => true,
            'start_at' => now(),
            'end_at' => now()->addWeek(),
        ]);

        // Popup Ad (Video)
        Ad::create([
            'title' => 'Video Iklan Kopi',
            'type' => 'video',
            'placement' => 'popup',
            'media_path' => 'https://player.vimeo.com/external/370133654.sd.mp4?s=05f3f52b0138f4560d9e4638a31a26e72a5a7b15&profile_id=165',
            'link_url' => 'https://kopikenangan.com',
            'is_active' => true,
            'start_at' => now(),
            'end_at' => now()->addWeek(),
        ]);

        // Popup Ad (Audio)
        Ad::create([
            'title' => 'Jingle Iklan Gratis',
            'type' => 'audio',
            'placement' => 'popup',
            'media_path' => 'https://cdn.pixabay.com/download/audio/2022/03/15/audio_6c196fe8da.mp3?filename=happy-advertising-11254.mp3',
            'link_url' => 'https://spotify.com',
            'is_active' => true,
            'start_at' => now(),
            'end_at' => now()->addWeek(),
        ]);
    }

    // public function run()
    // {
    //     $now = Carbon::now();
    //     $end = $now->copy()->addMonth();

    //     Ad::insert([
    //         [
    //             'title' => 'Banner Header Promo',
    //             'type' => 'image',
    //             'media_path' => 'https://cdn.pixabay.com/photo/2017/08/30/01/05/banner-2699737_1280.jpg',
    //             'link_url' => 'https://contoh.com/promo1',
    //             'start_at' => $now,
    //             'end_at' => $end,
    //             'placement' => 'header',
    //             'is_active' => 1,
    //         ],
    //         [
    //             'title' => 'Promo Video Summer',
    //             'type' => 'video',
    //             'media_path' => 'https://player.vimeo.com/external/367851776.sd.mp4?s=8d5b38cbfb1e908c4c2d5f45287ebfac8258bbd1&profile_id=165&oauth2_token_id=57447761',
    //             'link_url' => 'https://contoh.com/video-promo',
    //             'start_at' => $now,
    //             'end_at' => $end,
    //             'placement' => 'main',
    //             'is_active' => 1,
    //         ],
    //         [
    //             'title' => 'Audio Promo Jingle',
    //             'type' => 'audio',
    //             'media_path' => 'https://cdn.pixabay.com/download/audio/2022/03/15/audio_2bfaeb6e04.mp3?filename=upbeat-corporate-112940.mp3',
    //             'link_url' => 'https://contoh.com/audio-promo',
    //             'start_at' => $now,
    //             'end_at' => $end,
    //             'placement' => 'main',
    //             'is_active' => 1,
    //         ],
    //         [
    //             'title' => 'Popup Special Discount',
    //             'type' => 'popup',
    //             'media_path' => 'https://cdn.pixabay.com/photo/2018/01/23/18/10/sale-3103740_1280.jpg',
    //             'link_url' => 'https://contoh.com/discount',
    //             'start_at' => $now,
    //             'end_at' => $end,
    //             'placement' => 'popup',
    //             'is_active' => 1,
    //         ],
    //     ]);
    // }

}
