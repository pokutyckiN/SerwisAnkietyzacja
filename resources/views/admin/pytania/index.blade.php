@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pytania') }}</div>

                    <div class="card-body">


                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tresc pytania</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pytanias as $pytania)
                                <tr>
                                    <th scope="row">{{$pytania->id}}</th>
                                    <td>{{$pytania->trescPytania}}</td>
{{--                                    <td>--}}
{{--                                        @can('edit-users')--}}
{{--                                            <a href="{{route('profesors.edit', $profesor->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>--}}
{{--                                        @endcan--}}
{{--                                    </td>--}}
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
