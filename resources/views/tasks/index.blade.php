@extends('layouts.app')

@section('title', 'Mes Tâches')

@section('content')
<style>
    .tasks-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #e9ecef;
    }
    
    .tasks-header h1 {
        font-size: 2rem;
        color: #2c3e50;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .task-count {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: normal;
    }
    
    .btn-new-task {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 500;
        transition: transform 0.2s, box-shadow 0.2s;
        display: inline-block;
    }
    
    .btn-new-task:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .task-card {
        background: white;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        border-left: 4px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .task-card:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .task-card.completed {
        border-left-color: #28a745;
        background: #f8fff9;
    }
    
    .task-title {
        font-size: 1.25rem;
        margin-bottom: 0.75rem;
        color: #2c3e50;
        font-weight: 600;
    }
    
    .task-title.completed {
        text-decoration: line-through;
        color: #6c757d;
    }
    
    .task-description {
        color: #6c757d;
        margin-bottom: 1rem;
        line-height: 1.5;
    }
    
    .task-actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }
    
    .btn-edit {
        background: #ffc107;
        color: #856404;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-edit:hover {
        background: #e0a800;
        color: #856404;
    }
    
    .btn-delete {
        background: #dc3545;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-delete:hover {
        background: #c82333;
        transform: scale(1.05);
    }
    
    .empty-state {
        text-align: center;
        padding: 3rem;
        background: #f8f9fa;
        border-radius: 12px;
        color: #6c757d;
    }
    
    .empty-state a {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
    }
    
    .empty-state a:hover {
        text-decoration: underline;
    }
</style>

<div class="container">
    <div class="tasks-header">
        <h1>
            Mes Tâches 
            <span class="task-count">{{ $tasks->count() }}</span>
        </h1>
        <a href="{{ route('tasks.create') }}" class="btn-new-task">+ Nouvelle Tâche</a>
    </div>

    @forelse($tasks as $task)
    <div class="task-card {{ $task->completed ? 'completed' : '' }}">
        <div class="task-title {{ $task->completed ? 'completed' : '' }}">
            {{ $task->title }}
        </div>
        @if($task->description)
        <div class="task-description">
            {{ $task->description }}
        </div>
        @endif
        <div class="task-actions">
            <a href="{{ route('tasks.edit', $task) }}" class="btn-edit">✏️ Modifier</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('Supprimer cette tâche ?')">🗑️ Supprimer</button>
            </form>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <p>Aucune tâche pour le moment.</p>
        <a href="{{ route('tasks.create') }}">✨ Créer votre première tâche</a>
    </div>
    @endforelse
</div>
@endsection