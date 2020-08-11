<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;

class PeopleController extends Controller
{
    public function index()
    {
        $people=People::all();
        return $people->toJson(JSON_PRETTY_PRINT);
    }

    public function store( Request $request)
    {
        People::create($request->all());
    }

    public function show(People $people)
    {
        return $people;
    }

    public function update(Request $request, People $people)
    {
        $people->update($request->all());
    }
    public function delete(People $people)
    {
        $people->delete();
    }
}
