<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a list of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return (new Response(Todo::all()));
    }

    /**
     * Display specific resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return (new Response(Todo::find($id)));
    }

    /**
     * Create a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return (new Response($todo, 201));
    }

    /**
     * Update existing resource.
     *
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($request->all());

        return (new Response($todo));
    }

    /**
     * Delete existing resource.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        return new Response(null, 204);
    }
}
