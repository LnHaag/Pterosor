<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\People;
use APP\Http\Requests\PeopleStore;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people=People::all();
        return view('admin.people.index')->with('people',$people);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      *@param  \Illuminate\Http\Request  $validated
      *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => ['required', 'unique:people', 'max:30'],
            'firstname' => ['required', 'max:30'],
            'email' => ['required'],
            'bio' => ['nullable'],
            'personnalpage' => ['nullable'],
            'picture' => ['nullable'],
        ]);

        $person= new People();
        $person->name=$validated['name'];
        $person->firstname=$validated['firstname'];
        $person->email=$validated['email'];
        $person->bio=$validated['bio'];
        $person->personnalpage=$validated['personnalpage'];
        $person->picture=$validated['picture'];
    
        $person->save();
;
        return redirect()->route('admin.people.index')->with('success','nouveau membre enregisré avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $person
     * @return \Illuminate\Http\Response
     */
    public function show(People $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(People $person)
    {
        return view('admin.people.edit')->with('person',$person); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $validated
     * @param  \App\People $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $person)
    {
        $person->name=$request['name'];
        $person->firstname=$request['firstname'];
        $person->email=$request['email'];
        $person->bio=$request['bio'];
        $person->personnalpage=$request['personnalpage'];
        $person->picture=$request['picture'];
        //dd($request);
        $person->save();
        $request->session()->flash('success','Your details have been updated!');
        return redirect()->route('admin.people.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peopple  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $person)
    {
        //
    }
}
