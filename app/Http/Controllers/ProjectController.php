<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = $request->user()->projects()
            ->with('tasks')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => [
                'projects' => ProjectResource::collection($projects->items()),
                'pagination' => [
                    'current_page' => $projects->currentPage(),
                    'per_page' => $projects->perPage(),
                    'total' => $projects->total(),
                    'last_page' => $projects->lastPage(),
                    'from' => $projects->firstItem(),
                    'to' => $projects->lastItem(),
                ]
            ]
        ], 200);
    }

    public function store(ProjectRequest $request)
    {
        $project = $request->user()->projects()->create([
            'name' => $request->name,
            'description' => $request->description,
            'is_archived' => $request->is_archived ?? false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Proyecto creado exitosamente',
            'data' => new ProjectResource($project)
        ], 201);
    }

    public function show(Request $request, string $id)
    {
        $project = $request->user()->projects()->with('tasks')->find($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Proyecto no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new ProjectResource($project)
        ], 200);
    }

    public function update(ProjectRequest $request, string $id)
    {
        $project = $request->user()->projects()->find($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Proyecto no encontrado'
            ], 404);
        }

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_archived' => $request->is_archived ?? $project->is_archived,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Proyecto actualizado exitosamente',
            'data' => new ProjectResource($project->load('tasks'))
        ], 200);
    }

    public function destroy(Request $request, string $id)
    {
        $project = $request->user()->projects()->find($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Proyecto no encontrado'
            ], 404);
        }

        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Proyecto eliminado exitosamente'
        ], 200);
    }
}
