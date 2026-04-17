@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
    }
    
    .form-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .form-header {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        color: white;
        padding: 1.5rem;
        text-align: center;
    }
    
    .form-header h4 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .form-body {
        padding: 2rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #2c3e50;
    }
    
    .form-label.required::after {
        content: '*';
        color: #dc3545;
        margin-left: 0.25rem;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #ff6b6b;
        box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }
    
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
    }
    
    .checkbox-group input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    
    .checkbox-group label {
        margin: 0;
        font-weight: 600;
        color: #28a745;
        cursor: pointer;
    }
    
    .btn-update {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
        margin-bottom: 0.75rem;
    }
    
    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }
    
    .btn-cancel {
        background: #6c757d;
        color: white;
        text-decoration: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
        text-align: center;
        width: 100%;
    }
    
    .btn-cancel:hover {
        background: #5a6268;
        color: white;
    }
    
    .error-message {
        background: #f8d7da;
        color: #721c24;
        padding: 0.75rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        border-left: 4px solid #dc3545;
    }
</style>

<div class="container form-container">
    <div class="form-card">
        <div class="form-header">
            <h4>✏️ Modifier la Tâche</h4>
        </div>
        <div class="form-body">
            @if($errors->any())
                <div class="error-message">
                    Veuillez corriger les erreurs ci-dessous.
                </div>
            @endif
            
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label required">Titre</label>
                    <input type="text" 
                           name="title" 
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $task->title) }}"
                           placeholder="Entrez le titre de la tâche">
                    @error('title')
                        <div class="error-message" style="margin-top: 0.5rem;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" 
                              class="form-control @error('description') is-invalid @enderror"
                              placeholder="Décrivez votre tâche...">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <div class="error-message" style="margin-top: 0.5rem;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="checkbox-group">
                    <input type="checkbox" 
                           name="completed" 
                           id="completed" 
                           {{ $task->completed ? 'checked' : '' }}>
                    <label for="completed">
                        ✅ Marquer comme terminée
                    </label>
                </div>
                
                <button type="submit" class="btn-update">🔄 Mettre à jour</button>
                <a href="{{ route('tasks.index') }}" class="btn-cancel">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection