@extends('layouts.app')

@section('title')
    {{ $project->title }}
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary mt-4 mb-3">Modifica</a>
        <button type="button" class="btn btn-danger mt-4 mb-3" data-bs-toggle="modal"
            data-bs-target="#delete-project-{{ $project->id }}">
            Elimina
        </button>
        <h1 class="mt-3 fw-bold">{{ $project->title }}</h1>
        <span class="d-inline-block me-2">Categoria</span><code class="d-inline-block fs-5">{{ $project->type_id }}</code>
        <span class="mt-4 fs-5 fw-bold d-block">Descrizione:</span>
        <p>{{ $project->description }}</p>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="delete-project-{{ $project->id }}" tabindex="-1"
        aria-labelledby="delete-project-{{ $project->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminare Progetto {{ $project->title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Premendo elimina l'azione sarà irreversibile. Procedere?
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" value="Elimina">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection