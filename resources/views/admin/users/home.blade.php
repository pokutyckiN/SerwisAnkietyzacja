@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card">
                        <div class="card-header">{{ __('Panel Administracyjna') }}</div>

                        <div class="card-body">
                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    <div class="float-left">Użytkownicy</div>
                                    <div class=""><img src="{{asset('/images/prof.png')}}" class="float-right" style = "width: 30px; height: 30px" /></div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Tabela ze wszystkimi użytkownikami</h5>
                                    <p class="card-text">
                                        <a href="{{ route('users.index') }}" class="btn btn btn-primary float-right">
                                            Wyswietl
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
                                            </svg>
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    <div class="float-left">Pytania</div>
                                    <div class=""><img src="{{asset('/images/pytanie.png')}}" class="float-right" style = "width: 30px; height: 30px" /></div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Tabela z pytaniami</h5>
                                    <p class="card-text">
                                        <a href="{{ route('pytania.index') }}" class="btn btn btn-primary float-right">
                                            Wyswietl
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
                                            </svg>
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    <div class="float-left">Ankietyzacja</div>
                                    <div class=""><img src="{{asset('/images/pytanie.png')}}" class="float-right" style = "width: 30px; height: 30px" /></div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Zloz ankietyzacje</h5>
                                    <p class="card-text">
                                        <a href="{{ route('ankieta.create') }}" class="btn btn btn-primary float-right">
                                            Wyswietl
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
                                            </svg>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
