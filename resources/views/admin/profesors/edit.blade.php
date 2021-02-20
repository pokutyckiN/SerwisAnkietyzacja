@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User {{$profesor->imieProf}}</div>

                    <div class="card-body">
                        <form action="{{route('profesors.update', $profesor)}}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label for="imieProf" class="col-md-2 col-form-label text-md-right">imieProf</label>

                                <div class="col-md-6">
                                    <input id="imieProf" type="text" class="form-control @error('imieProf') is-invalid @enderror" name="imieProf" value="{{ $profesor->imieProf }}" required autocomplete="imieProf" autofocus>

                                    @error('imieProf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nazwiskoProf" class="col-md-2 col-form-label text-md-right">nazwiskoProf</label>

                                <div class="col-md-6">
                                    <input id="nazwiskoProf" type="text" class="form-control @error('nazwiskoProf') is-invalid @enderror" name="nazwiskoProf" value="{{ $profesor->nazwiskoProf }}" required autocomplete="nazwiskoProf" autofocus>

                                    @error('nazwiskoProf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{method_field('PUT')}}
                            <button type = "submit" class="btn btn-primary">
                                Update
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
