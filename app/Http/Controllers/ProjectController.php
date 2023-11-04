<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $Project = Project::latest()->paginate(5);

        return view('index', compact('Project'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'fname' => 'required',
            'lname' => 'required'
        ]);

        Project::create(array_merge($request->all(), ['status' => 'active']));

        $Project = Project::latest()->paginate(5);

        return view('index', compact('Project'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('success', 'Project updated sucessfully!');
    }

    public function show($id)
    {
        $Project = Project::find($id);

        return view('show', compact('Project'));
    }

    public function edit($id)
    {
        $Project = Project::find($id);
        return view('edit', compact('Project', 'id'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'fname'=> 'required',
            'lname' => 'required'
        ]);


        $Project = Project::find($id);
        $Project->title = request('title');
        $Project->description = request('description');
        $Project->status = request('status');
        $Project->fname = request('fname');
        $Project->lname = request('lname');
        $Project->stDate = request('stDate');
        $Project->enDate = request('enDate');
        $Project->save();


        $Project = Project::latest()->paginate(5);
        return view('index', compact('Project'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function destroy($id)
    {
        $Project = Project::find($id);
        if($Project->status === 'active'){
            $Project->status = 'deleted';
        }else{
            $Project->status = 'active';
        }
        $Project->save();


        $Project = Project::latest()->paginate(5);
        return view('index', compact('Project'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
}
