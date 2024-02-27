<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


use App\Models\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $project = new Project();

            $project->name = $faker->words(3, true);
            $project->description = $faker->text(100);
            $project->slug = Str::slug($project->name, "-");
            $project->assigned_by = $faker->words(3, true);

            $project->save();
        }
    }
}
