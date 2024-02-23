<?php

namespace Database\Seeders;

use App\Models\technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\project;


class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technology::factory()
            ->count(10)
            ->create()
            ->each(function ($technology) {
                $projects = project::inRandomOrder()->limit(3)->get();
                $technology->projects()->attach($projects);
                $technology->save();

            });
    }
}
