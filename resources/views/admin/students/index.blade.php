@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Studenci') }}</div>

                    <div class="card-body">


                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Imie</th>
                                <th scope="col">Nazwisko</th>
                                <th scope="col">User_id</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{$student->id}}</th>
                                    <td>{{$student->imieStudent}}</td>
                                    <td>{{$student->nazwiskoStudent}}</td>
                                    <td>{{$student->user_id}}</td>
                                    <td>
                                        @can('edit-users')
                                            <a href="{{route('students.edit', $student->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                        @endcan
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
