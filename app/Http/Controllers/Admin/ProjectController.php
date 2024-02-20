<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technologie;
use App\Models\Project;
use App\Models\Type;

class ProjectController extends Controller
{

    private $rules = [
        'title' => ['required', 'min:3', 'string', 'max:255'],
        'image_url' => ['required', 'url:https', 'min:3', 'string', 'max:200'],
        'date' => ['required'],
        'description' => ['min:5', 'required'],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technologie::all();
        $types = Type::all();

        return view('admin.projects.create', compact('project', 'technologies', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules);


        $project = Project::create($data);

        $project->technologies()->sync($data['technologies']);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technologie::all();

        return view('admin.projects.edit', compact('project', 'technologies', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate($this->rules);
        $project->update($data);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function deletedIndex(){
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.deleted-index', compact('projects'));
    }

    public function deletedShow(string $id){
        $projects = Project::withTrashed()->where('id', $id)->first();
        return view('admin.projects.deleted-show', compact('projects'));
    }

    public function deletedRestore(string $id){
        $projects = Project::withTrashed()->where('id', $id)->first();
        $projects->restore();

        return redirect()->route('admin.projects.show', $projects);
    }

    public function deletedDestroy(string $id){
        $projects = Project::withTrashed()->where('id', $id)->first();
        $projects->forceDelete();

        return redirect()->route('admin.projects.deleted.index');
    }
}
