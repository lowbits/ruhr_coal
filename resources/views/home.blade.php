@extends('layouts.app')

@section('content')


    <div class="section">
    <div class="columns is-centered">
        <div class="column is-8">
            <h1 class="title">
                Grüß Gott {{Auth::user()->name}}
            </h1>

        </div>
    </div>
    </div>
@endsection