@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12 p-2 mb-3 text-center">
            <h2>
                Progetti eliminati di {{ Auth::user()->name }}!
            </h2>
        </div>
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $projects as $project )
                        <tr>
                            <th scope="row">
                                {{ $project->id }}
                            </th>
                            <td>
                                <a href="{{ route('admin.projects.deleted.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td>
                                {{ $project->image_url }}
                            </td>
                            <td>
                                {{ $project->date }}
                            </td>
                            <td>
                                <em>
                                    {{ substr($project->description, 0, 35) }}
                                </em>
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.deleted.show', $project) }}" class="text-decoration-none">
                                    <button class="btn btn-sm btn-primary">
                                        View
                                    </button>   
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.projects.deleted.restore', $project) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button class="btn btn-sm btn-warning" type="submit">
                                        Restore
                                    </button>
                                </form>
                                <form class="d-inline-block" action="{{ route('admin.projects.deleted.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                There are no posts available
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection