<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projectId = $request->query('project_id');
        
        $query = Task::whereHas('project', function ($q) use ($request) {
            $q->where('user_id', $request->user()->id);
        });

        if ($projectId) {
            $query->where('project_id', $projectId);
        }

        $tasks = $query->orderBy('due_date')->paginate(15);

        return response()->json([
            'success' => true,
            'data' => [
                'tasks' => TaskResource::collection($tasks->items()),
                'pagination' => [
                    'current_page' => $tasks->currentPage(),
                    'per_page' => $tasks->perPage(),
                    'total' => $tasks->total(),
                    'last_page' => $tasks->lastPage(),
                    'from' => $tasks->firstItem(),
                    'to' => $tasks->lastItem(),
                ]
            ]
        ], 200);
    }

    public function store(TaskRequest $request)
    {
        // Verificar que el proyecto pertenezca al usuario
        $project = $request->user()->projects()->find($request->project_id);
        
        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permiso para agregar tareas a este proyecto'
            ], 403);
        }

        $task = Task::create([
            'project_id' => $request->project_id,
            'title' => $request->title,
            'due_date' => $request->due_date,
            'is_completed' => $request->is_completed ?? false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tarea creada exitosamente',
            'data' => new TaskResource($task)
        ], 201);
    }

    public function show(Request $request, string $id)
    {
        $task = Task::whereHas('project', function ($q) use ($request) {
            $q->where('user_id', $request->user()->id);
        })->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new TaskResource($task)
        ], 200);
    }

    public function update(TaskRequest $request, string $id)
    {
        $task = Task::whereHas('project', function ($q) use ($request) {
            $q->where('user_id', $request->user()->id);
        })->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        // Verificar que el nuevo proyecto pertenezca al usuario
        $project = $request->user()->projects()->find($request->project_id);
        
        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permiso para mover la tarea a este proyecto'
            ], 403);
        }

        $task->update([
            'project_id' => $request->project_id,
            'title' => $request->title,
            'due_date' => $request->due_date,
            'is_completed' => $request->is_completed ?? $task->is_completed,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tarea actualizada exitosamente',
            'data' => new TaskResource($task)
        ], 200);
    }

    public function destroy(Request $request, string $id)
    {
        $task = Task::whereHas('project', function ($q) use ($request) {
            $q->where('user_id', $request->user()->id);
        })->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tarea eliminada exitosamente'
        ], 200);
    }

    /**
     * Marcar una tarea como completada
     */
    public function complete(Request $request, string $id)
    {
        $task = Task::whereHas('project', function ($q) use ($request) {
            $q->where('user_id', $request->user()->id);
        })->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        $task->update(['is_completed' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Tarea marcada como completada',
            'data' => new TaskResource($task)
        ], 200);
    }
}
