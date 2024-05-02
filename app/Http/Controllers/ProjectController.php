<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project = new Project();
        $project->name = $request->input('name');
        $project->save();

        // Return the newly created task
        return response()->json($project);
    }
}
