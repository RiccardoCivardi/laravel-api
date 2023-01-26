<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with(['type', 'technologies'])->orderBy('id','desc')->paginate(10);

        return response()->json(compact('projects'));
    }

}
