@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User {{$student->imieStudent}}</div>

                    <div class="card-body">
                        <form action="{{route('students.update', $student)}}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label for="imieStudent" class="col-md-2 col-form-label text-md-right">imieStudent</label>

                                <div class="col-md-6">
                                    <input id="imieStudent" type="text" class="form-control @error('imieStudent') is-invalid @enderror" name="imieStudent" value="{{ $student->imieStudent }}" required autocomplete="imieStudent" autofocus>

                                    @error('imieStudent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nazwiskoStudent" class="col-md-2 col-form-label text-md-right">nazwiskoStudent</label>

                                <div class="col-md-6">
                                    <input id="nazwiskoStudent" type="text" class="form-control @error('nazwiskoStudent') is-invalid @enderror" name="nazwiskoStudent" value="{{ $student->nazwiskoStudent }}" required autocomplete="nazwiskoStudent" autofocus>

                                    @error('nazwiskoStudent')
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
