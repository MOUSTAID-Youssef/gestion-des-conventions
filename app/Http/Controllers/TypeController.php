<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('type.index', ['types' => $types]);
    }
    public function create()
    {
        return view('type.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
        ]);
        Type::create($data)->with('success','type de fuite ajouté avec succés');
        return redirect(route('type.index'));
    }
    public function edit(Type $type)
    {
        return view('type.edit',['type'=>$type]);
    }
    public function update(Type $type, Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
        ]);
        $type->update($data);
        return redirect(route('type.index'))->with('success', 'type de fuite modifié avec succés');
    }
    public function delete(Type $type)
    {
        $type->delete();
        return redirect(route('type.index'))->with('success', 'type de fuite supprimé avec succés');
    }
}
