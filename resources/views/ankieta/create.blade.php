@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ankieta</div>

                    <div class="card-body">
                        <p> <strong>Wypelnij forme podaną ponizej krok po kroku!</strong></p>
                        <form method="POST" action="{{ route('ankieta.store') }}">

                            @csrf

                            <div class="form-group">
                                <label for="sel1">Wybierz profesora:</label>
                                <select class="form-control" id="sel1" name="sel1" style="width: 300px;">
                                    @foreach($profesors as $profesor)
                                        <option value="{{ $profesor->id }}">{{ $profesor->imieProf }} {{$profesor->nazwiskoProf }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel2">Wybierz przedmiot:</label>
                                <select class="form-control" id="sel2" name="sel2" style="width: 300px;">
                                    @foreach($przedmiots as $przedmiot)
                                        <option value="{{ $przedmiot->nazwaPrzedmiota }}">{{ $przedmiot->nazwaPrzedmiota }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 200px;">Pytania</th>
                                    <th scope="col" style="width: 50px;">1</th>
                                    <th scope="col" style="width: 50px;">2</th>
                                    <th scope="col" style="width: 50px;">3</th>
                                    <th scope="col" style="width: 50px;">4</th>
                                    <th scope="col" style="width: 50px;">5</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pytanias as $pytania)
                                <tr>
                                    <th scope="row">{{ $pytania->trescPytania }}</th>
                                        @for ($i=1; $i<=5; $i++)
                                            <td>
                                                <div class="radio">
                                                    <label><input type="radio" name="odp[{{ $pytania->trescPytania }}]" value="{{$i}}"></label>
                                                </div>
                                            </td>
                                        @endfor
                                </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div>
                                <button type="submit" class="btn btn-primary float-right">Wyślij</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
