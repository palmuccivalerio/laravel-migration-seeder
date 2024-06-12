@extends('layouts.app')

@section('content')
    <h1>Home page</h1>

<ul>
    @foreach ($trains as  $train)
        <li>
           {{$train->name}} 
        </li>

        
    @endforeach
</ul>

@endsection
.