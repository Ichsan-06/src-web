<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ServiceType::create([
            'name' => 'Web Development',
            'description' => 'Professional web development services for modern, responsive websites.'
        ]);

        \App\Models\ServiceType::create([
            'name' => 'Mobile App Development',
            'description' => 'Custom mobile application development for iOS and Android platforms.'
        ]);

        \App\Models\ServiceType::create([
            'name' => 'Graphic Design',
            'description' => 'Creative graphic design services for branding, marketing materials, and digital assets.'
        ]);
    }
}
