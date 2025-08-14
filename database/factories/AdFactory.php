<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  protected $model = Ad::class;

    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(3),
            'type'        => $this->faker->randomElement(['image','video','audio','popup']),
            'placement'   => $this->faker->randomElement(['header','sidebar','inline','popup','preroll','audio']),
            'media_path'  => match ($this->faker->randomElement(['image','video','audio'])) {
                'image' => 'ads/sample-' . $this->faker->word . '.webp',
                'video' => 'ads/sample-' . $this->faker->word . '.mp4',
                'audio' => 'ads/sample-' . $this->faker->word . '.mp3',
            },
            'link_url'    => $this->faker->boolean(70) ? $this->faker->url() : null, // 70% ada link
            'duration'    => $this->faker->numberBetween(3, 20),
            'weight'      => $this->faker->numberBetween(1, 5),
            'autoplay'    => $this->faker->boolean(),
            'mute'        => $this->faker->boolean(),
            'is_active'   => $this->faker->boolean(90),
            'start_at'    => $this->faker->optional()->dateTimeBetween('-1 month', '+1 month'),
            'end_at'      => $this->faker->optional()->dateTimeBetween('+1 day', '+2 months'),
            'meta'        => [
                'width'  => $this->faker->numberBetween(300, 1200),
                'height' => $this->faker->numberBetween(250, 800),
                'format' => $this->faker->randomElement(['webp','jpg','mp4','mp3'])
            ],
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }

}

