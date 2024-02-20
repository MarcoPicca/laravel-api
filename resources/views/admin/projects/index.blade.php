@extends('layouts.admin')

@section('main-content')
    <section class="products">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <table class="table p-2 m-3">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">titolo</th>
                                <th scope="col">Tipo di sviluppo</th>
                                <th scope="col">immagine</th>
                                <th scope="col">data</th>
                                <th scope="col">descrizione</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }} </td>
                                <td>{{ $project->title }} </td>
                                <td>{{ $project->type->name }} </td>
                                <td>{{ $project->image_url }} </td>
                                <td>{{ $project->date }} </td>
                                <td>{{ $project->description }} </td>
                                
                                <td>
                                    <a href="{{ route('admin.projects.show', $project) }}" class="text-decoration-none">
                                        <button class="btn btn-sm btn-primary">
                                            Visualizza
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-decoration-none">
                                        <button class="btn btn-sm btn-success">
                                            Modifica
                                        </button>
                                    </a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $project->id }}">
                                        Elimina
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Elimina progetto...</h1>
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


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 text-center">
                    <a href="{{ route('admin.projects.create') }}" class="text-decoration-none">
                        <button class="btn btn-primary">
                            Aggiungi un nuovo progetto
                        </button>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection