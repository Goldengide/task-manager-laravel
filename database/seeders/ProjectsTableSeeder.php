<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Zerodip',
            ],
            [
                'name' => 'Church Project',
            ],
        ];
        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
