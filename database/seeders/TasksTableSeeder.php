<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $tasks = [
            [
                'name' => 'Run the Webpack CLI',
                'project_id' => 1,
                'priority' => 1,
            ],
            [
                'name' => 'Push to Github',
                'project_id' => 1,
                'priority' => 2,
            ],
        ];
        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
