<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

protected $fillable = [
        'title',
        'type',
        'placement',
        'media_path',
        'link_url', // click-through
        'duration', // detik untuk rotasi
        'weight', // bobot rotasi server-side
        'autoplay',
        'mute',
        'is_active',
        'start_at',
        'end_at',
        'meta', // ukuran, aspect, dsb.
];

protected $casts = [
        'autoplay' => 'boolean',
        'mute' => 'boolean',
        'is_active'=> 'boolean',
        'meta' => 'array',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

   
    public function scopeActive($q)
    {
        $now = now();
        return $q->where('is_active', true)
                 ->where(function($q) use ($now){
                    $q->whereNull('start_at')->orWhere('start_at','<=',$now);
                 })
                 ->where(function($q) use ($now){
                    $q->whereNull('end_at')->orWhere('end_at','>=',$now);
                 });
    }

    public function getUrlAttribute(): ?string
    {
        return $this->media_path ? asset('storage/'.$this->media_path) : null;
    }
}


