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
                <div class="card-header">Liste des abonnés :</div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Country </th>
                        <th scope="col">Organization </th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach($users as $user)
                        <tr>
                        <td scope ="row">{{ $user->id  }}</td>
                        <td scope ="row">{{ $user->name  }}</td>
                        <td scope ="row">{{ $user->firstname  }}</td>
                        <td scope ="row">{{ $user->email  }}</td>
                        <td scope ="row">{{ $user->country  }}</td>
                        <td scope ="row">{{ $user->organization  }}</td>
                        <td scope ="row">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())  }}</td>
                        <td scope>
                            <a href="{{  route('admin.users.edit', $user->id)  }}"><button class="btn btn-warning">Edit</button></a>
                            <form action="{{  route('admin.users.destroy', $user->id)  }" method="POST" class="d-inline">
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