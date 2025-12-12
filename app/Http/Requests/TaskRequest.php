<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date',
            'is_completed' => 'sometimes|boolean',
        ];
    }

    public function expectsJson(): bool
    {
        return true;
    }

    public function ajax(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'project_id.required' => 'El proyecto es obligatorio.',
            'project_id.exists' => 'El proyecto seleccionado no existe.',
            'title.required' => 'El título de la tarea es obligatorio.',
            'title.max' => 'El título no puede exceder los 255 caracteres.',
            'due_date.date' => 'La fecha de vencimiento debe ser una fecha válida.',
            'is_completed.boolean' => 'El campo completado debe ser verdadero o falso.',
        ];
    }
}
