@extends('layouts.admin')

@section('title', 'Admin Project')

@section('main-content')
<div class="container">
    <div class="row text-center pt-4">
        <div class="col-12">
            
            <h2 scope="row">
                {{ $project->id }}
            </h2>
        </div>
        <div class="col-12 text-center">
            <h2>
                {{ $project->title }}
            </h2>

            <ul>
                @forelse ($project->technologies as $technologie)
                    <li class="d-inline me-3">
                        <span class="badge px-2 px-1">
                            {{ $technologie->name }}
                        </span>
                    </li>

                @empty
                    <li class="d-inline me-3">
                        This post has no tags yet...
                    </li>
                @endforelse
            </ul>

            <img src="{{ $project->image_url }}" alt="">

            <p>
                {{ $project->type->name }}
            </p>

            <p>
                {{ $project->date }}
            </p>
            <div class="p-5">
                <p>
                    <em>
                        {{ $project->content}}
                    </em>
                </p>
            </div>
            <td>
                <a href="{{ route('admin.projects.edit', $project) }}" class="text-decoration-none">
                    <button class="btn btn-sm btn-success">
                        Modifica
                    </button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $project->id }}">
                    Elimina
                </button>
            </td>
        </div>
        @auth
        <a href="{{ route('admin.projects.index') }}" class="text-decoration-none mt-3">
            <button class="btn btn-primary">
                Progetti
            </button>
        </a>
        @endauth
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Deleting post...</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi davvero eliminare {{ $project->title }}?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>

                <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit">
                        Elimina
                    </button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection