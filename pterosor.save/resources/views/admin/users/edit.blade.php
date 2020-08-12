@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Liste des abonnés :</div>

                <div class="card-body">
                    <div >{{ ('ID: $this->id') }}</div>
                    <div >{{ ('Name: $user->name') }}</div>
                    <div >{{ ('Firstname: $user->firstname') }}</div>
                    <div >{{ ('Email: $user->email') }}</div>
                    <div >{{ ('Country: $user->country') }}</div>
                    <div >{{ ('Organization: $user->organisation') }}</div>
                    <div >{{ ('Webpage: $user->webpage') }}</div>
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                        @foreach($roles as $role)
                            <div class="form group form-check" >
                                <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id  }}" 
                                id="{{ $role->id  }}" @foreach($user->roles as $userRole) @if($userRole->id===$role->id)
                                checked @endif @endforeach >
                                <label for="{{ $role->id  }}" class="form-check-label">{{ $role->name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection