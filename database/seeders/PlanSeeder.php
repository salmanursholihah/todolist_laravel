<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// Plan::create(['name'=>'Entry','price'=>180000,'description'=>'Fitur kamera','benefits'=>json_encode(['fitur kamera'])]);
// Plan::create(['name'=>'Small','price'=>99000,'description'=>'Promo','benefits'=>json_encode(['Fitur kamera','free apa ??'])]);
// Plan::create(['name'=>'Medium','price'=>199000,'description'=>'Best value','benefits'=>json_encode(['Unlimited penggunaan','fitur kamera'])]);
// Plan::create(['name'=>'Large','price'=>299000,'description'=>'Full','benefits'=>json_encode(['All features'])]);

        Plan::create([
         'name' => 'Paket Basic',
            'price' => 50000,
            'duration_month' => 1,
        ]);
        Plan::create([
            'name' => 'Paket Pro',
            'price' => 150000,
            'duration_month' => 3,
        ]);
        Plan::create([
            'name' => 'Paket Premium',
            'price' => 500000,
            'duration_month' => 12,
        ]);
    }
}
