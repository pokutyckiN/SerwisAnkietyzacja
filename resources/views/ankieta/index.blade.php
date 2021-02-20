@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('WYNIKI') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" >Przedmiot</th>
                                <th scope="col">Pytanie</th>
                                <th scope="col">Średnia ocena</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ankietas as $ankieta)
                            <tr>
                                <th scope="row" style="width: 50px;">{{ $ankieta->przedmiot_id }}</th>
                                <th style="width: 150px;">{{ $ankieta->pytania_id }}</th>
                                <th style="width: 20px;">{{ $ankieta->ocena }}</th>
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
