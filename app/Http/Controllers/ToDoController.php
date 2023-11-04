<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{

    public function index()
    {
        $ToDo = ToDo::latest()->paginate(5);

        return view('index', compact('ToDo'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required'
        ]);

        ToDo::create(array_merge($request->all(), ['status' => 'active']));

        $ToDo = ToDo::latest()->paginate(5);

        return view('index', compact('ToDo'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('sucess', 'User updated sucessfully!');
    }

    public function show($id)
    {
        $ToDo = ToDo::find($id);

        return view('show', compact('ToDo'));
    }

    public function edit($id)
    {
        $ToDo = ToDo::find($id);
        return view('edit', compact('ToDo', 'id'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'text' => 'required',
            'status' => 'required'
        ]);


        $ToDo = ToDo::find($id);
        $ToDo->text = request('text');
        $ToDo->status = request('status');
        $ToDo->save();


        $ToDo = ToDo::latest()->paginate(5);
        return view('index', compact('ToDo'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function destroy($id)
    {
        ToDo::find($id)->delete();

        $ToDo = ToDo::latest()->paginate(5);
        return view('index', compact('ToDo'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('sucess', 'User deleted sucessfully!');

    }
}
