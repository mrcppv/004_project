<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Note = Note::latest()->paginate(5);

        return view('index', compact('Note'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        Note::create(array_merge($request->all(), ['status' => 'active']));

        $Note = Note::latest()->paginate(5);

        return view('index', compact('Note'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('sucess', 'Note updated sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Note = Note::find($id);

        return view('show', compact('Note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Note = Note::find($id);
        return view('edit', compact('Note', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'status' => 'required'
        ]);


        $Note = Note::find($id);
        $Note->title = request('title');
        $Note->text = request('text');
        $Note->status = request('status');
        $Note->save();


        $Note = Note::latest()->paginate(5);
        return view('index', compact('Note'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Note = Note::find($id);
        if($Note->status === 'active'){
            $Note->status = 'deleted';
        }else{
            $Note->status = 'active';
        }
        $Note->save();


        $Note = Note::latest()->paginate(5);
        return view('index', compact('Note'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
