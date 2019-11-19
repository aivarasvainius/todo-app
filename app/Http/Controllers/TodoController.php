<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Database\Eloquent\Collection;
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
}
