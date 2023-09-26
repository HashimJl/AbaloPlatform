@extends('layouts.index')
@section('title','Categories')

@section('content')
    @foreach($data as $key => $value)
        <ul>
            <li>{{$value->ab_name}}</li>
        </ul>
    @endforeach
@endsection
