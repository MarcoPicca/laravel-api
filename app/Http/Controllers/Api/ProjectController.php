<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        // ? EAGER LOADING con il nome del metodo presente all'interno del model
        $projects = Project::with('type', 'technologies')->paginate(20);
        return response()->json(
            [
                "success" => true,
                "results" => $projects
            ]);
    }

    public function show(Project $project){
        return response()->json([
            "success" => true,
            "results" => $project
        ]);
    }

    public function search(Request $request){
        $data = $request->all();

        if ( isset($data['title'])){
            $stringa = $data['title'];
            $projects = Project::where('title', 'LIKE', "%{$stringa}%")->get();
        } elseif ( is_null($data['title'])) {
            $projects = Project::all();
        } else {
            abort(404);
        }

        return response()->json([
            "success" => true,
            "results" => $projects,
            "matches" => count($projects)
        ]);
    }
}
