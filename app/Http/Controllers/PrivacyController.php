<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index() {
        return view('privacy', [
            'contact_email' => env('PRIVACY_CONTACT_EMAIL', 'email@example.com'),
            'update_at' => '18 November 2025'
        ]);
    }
}
