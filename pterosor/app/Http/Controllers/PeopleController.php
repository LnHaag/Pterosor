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

    public function welcome()
    {
        $people=People::all();
        ;return view('welcome')->withPeople($people);
    }

    public function store( Request $request)
    {
        People::create($request->all());
    }

    public function show($id)
    {
        $person = People::where('people.id',$id)->get()->first();
        
    $response =  $person;
    return response()->json($response);return $person;
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
