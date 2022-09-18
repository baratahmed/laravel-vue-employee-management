@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit City</h1>
    <a href="{{route('cities.index')}}" class="btn btn-primary">All Cities</a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit City') }}
                    <a href="{{ route('cities.index') }}" class="float-right">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update',$city->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="state_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="state_id" id="">
                                    <option selected>Open This Select Menu</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}" {{$state->id == $city->state->id ? 'selected' : ''}} >{{$state->name}}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                       

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $city->name) }}"
                                    required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="my-2 py-2">
                <form method="POST" action="{{ route('cities.destroy', $city->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete {{ $city->name }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection