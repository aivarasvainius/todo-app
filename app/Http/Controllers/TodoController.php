<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return (new Response(Todo::all()));
    }
}
