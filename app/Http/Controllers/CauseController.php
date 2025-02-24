<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cause;

class CauseController extends Controller
{
    public function index()
    {
        $causes = Cause::all();
        return view('cause.index', ['causes' => $causes]);
    }
    public function create()
    {
        return view('cause.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
        ]);
        Cause::create($data);
        return redirect(route('cause.index'));
    }
    public function edit(Cause $cause)
    {
        return view('cause.edit',['cause'=>$cause]);
    }
    public function update(Cause $cause, Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
        ]);
        $cause->update($data);
        return redirect(route('cause.index'))->with('success',"cause d'intervention modifié avec succé");
    }
    public function delete(Cause $cause)
    {
        $cause->delete();
        return redirect(route('cause.index'))->with('success',"cause d'intervention supprimé avec succé");
    }
}
