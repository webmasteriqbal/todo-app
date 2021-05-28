<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{

    /**
     *
     * todo index
     *
     */
    public function index()
    {
        $todos = DB::table('todos')->get();
        return view('welcome', compact('todos'));
    }

    /***
     *
     *
     * todo create
     *
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'dec' => 'required'
        ]);


        DB::table('todos')->insert([
            'name' => $request->name,
            'dec' => $request->dec
        ]);
        return redirect()->route('todos');
    }
    /**
     *
     *
     *
     * todo edit
     *
     *
     */
    public function edit($id)
    {
        $todo = DB::table('todos')->where('id', $id)->first();


        if (!$todo) {
            return view('error');
        }
        $todos = DB::table('todos')->get();
        return view('welcome', compact('todos', 'todo'));
    }
    /**
     *
     *
     * todo update
     *
     *
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'dec' => 'required'
        ]);

        $todo = DB::table('todos')->where('id', $id)->update([
            'name' => $request->name,
            'dec' => $request->dec
        ]);
        return redirect()->route('todos');
    }

    /**
     *
     *
     * todo delete
     *
     */
    public function delete($id)
    {
        DB::table('todos')->where('id', $id)->delete();

        return redirect()->route('todos');
    }
}
