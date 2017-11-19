@extends('layouts.app')


@section('content')

    <div class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-8">
                <div class="box">
                    <div class="box-heading"><h1 class="title">{{ $user->name }}</h1></div>
                    <div class="box-content">
                        <p>{{ $user->email }}</p>


                        @if($user->activities->count() > 0)
                            <h2 class="subtitle">Meine Aktivitäten</h2>

                        @foreach($user->activities as $activity)
                            <a>{{$activity->title}}</a>
                            <p></p>
                            <hr>
                        @endforeach
                        @else

                          <p>Du hast noch keine Aktivitäten!</p>


                        @endif

                        @if($user->gactivities->count() > 0)
                            <h2 class="subtitle">Guided Aktivitäten</h2>

                        @foreach($user->gactivities as $gactivity)
                            <a>{{$gactivity->title}}</a>
                            <p></p>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection