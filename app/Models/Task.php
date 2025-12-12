<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'due_date',
        'is_completed',
        'priority', // ← agregado
    ];

    protected $casts = [
        'due_date' => 'date',
        'is_completed' => 'boolean',
        'priority' => 'integer', // ← recomendado si es un número
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
