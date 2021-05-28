<?php

namespace App\Http\Controllers;


use App\Models\Todo;
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
        // $todos = DB::table('todos')->get();
        $todos = Todo::all();
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


        Todo::create($request->all());


        // Todo::create([
        //     'name' => $request->name,
        //     'dec' => $request->dec
        // ]);



        // DB::table('todos')->insert([
        //     'name' => $request->name,
        //     'dec' => $request->dec
        // ]);

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
        // $todo = DB::table('todos')->where('id', $id)->first();

        $todo = Todo::find($id)->first();

        if (!$todo) {
            return view('error');
        }
        // $todos = DB::table('todos')->get();


        $todos = Todo::all();
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


        Todo::find($id)->update([
            'name' => $request->name,
            'dec' => $request->dec
        ]);

        // $todo = DB::table('todos')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'dec' => $request->dec
        // ]);
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

        Todo::find($id)->delete();

        // DB::table('todos')->where('id', $id)->delete();

        return redirect()->route('todos');
    }
}
