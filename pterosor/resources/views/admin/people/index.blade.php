@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Liste des membres :
                <a href="{{  route('admin.people.create')  }}"><button class="btn btn-warning">Add new</button></a>   
            </div>

            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Bio</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($people as $person)
                    <tr>
                    <td scope ="row">{{ $person->id  }}</td>
                    <td scope ="row">{{ $person->name  }}</td>
                    <td scope ="row">{{ $person->firstname  }}</td>
                    <td scope ="row">{{ $person->email  }}</td>
                    <td scope ="row">{{ $person->bio  }}</td>
                    <td scope>
                        <a href="{{  route('admin.people.edit', $person->id)  }}"><button class="btn btn-warning">Edit</button></a>
                        <form action="{{  route('admin.people.destroy', $person->id)  }" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                        @endforeach
                </tbody>
            </table> 
            </div>
        </div>
    </div>
</div>
</div>

@endsection