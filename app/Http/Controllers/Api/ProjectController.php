<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with(['type', 'technologies'])->orderBy('id','desc')->paginate(9);

        $types = Type::all();
        $technologies = Technology::all();

        return response()->json(compact('projects','types','technologies'));
    }

    public function show($slug) {

        $project = Project::where('slug', $slug)->with(['type', 'technologies'])->first();

        if($project->cover_image){
            $project->cover_image = url("storage/" . $project->cover_image);
        }else{
            $project->cover_image = url("storage/uploads/placeholder.png");
        }

        return response()->json($project);

    }


    public function search(){


        $tosearch = $_GET['tosearch'];
        $projects = Project::where('name','like',"%$tosearch%")->with(['type','technologies'])->orderBy('id','desc')->paginate(9);

        return response()->json($projects);
    }


    public function getByType($id){

        $projects = Project::where('type_id',$id)->with(['type','technologies'])->orderBy('id','desc')->paginate(9);

        return response()->json($projects);

    }

    public function getByTechnology($id){

        $projects = Project::with(['technologies','type'])
            ->whereHas('technologies', function (Builder $query) use($id){
                $query->where('technology_id', $id);
            })
            ->orderBy('id','desc')->paginate(9);

        return response()->json($projects);

    }

}

