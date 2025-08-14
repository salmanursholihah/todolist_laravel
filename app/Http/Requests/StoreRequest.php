<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'type' => 'required|in:banner,video',
            'placement' => 'required|string|max:255',
            'media_path' => 'required|file|mimes:jpg,jpeg,png,mp4,webm',
            'link_url' => 'nullable|url',
            'duration' => 'nullable|integer|min:1',
            'weight' => 'nullable|integer|min:1',
            'autoplay' => 'boolean',
            'mute' => 'boolean',
            'is_active' => 'boolean',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'meta' => 'nullable|array',
        ];
    }
}
