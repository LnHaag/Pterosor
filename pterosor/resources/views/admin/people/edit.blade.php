@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{  route('admin.people.update', $person)  }}" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $person->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-3 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-7">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') ?? $person->firstname }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $person->email }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-3 col-form-label text-md-right">{{ __('Biography') }}</label>

                            <div class="col-md-7">
                                <textarea id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" rows="4" name="bio" autocomplete="bio" autofocus>{{ old('bio') ?? $person->bio }}</textarea>

                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="personnalpage" class="col-md-3 col-form-label text-md-right">{{ __('Web page') }}</label>

                            <div class="col-md-7">
                                <input id="personnalpage" type="text" class="form-control @error('personnalpage') is-invalid @enderror" name="personnalpage" value="{{ old('personnalpage') ?? $person->personnalpage }}" autocomplete="personnalpage" autofocus>

                                @error('personnalpage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="picture" class="col-md-3 col-form-label text-md-right">{{ __('picture') }}</label>

                            <div class="col-md-7">
                                <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') ?? $person->picture }}" autocomplete="picture">

                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="HALNumber" class="col-md-3 col-form-label text-md-right">{{ __('HAL number') }}</label>

                            <div class="col-md-7">
                                <input id="HALNumber" type="text" class="form-control @error('HALNumber') is-invalid @enderror" name="HALNumber" value="{{ old('HALNumber') ?? $person->HALNumber }}" autocomplete="HALNumber" autofocus>

                                @error('HALNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
