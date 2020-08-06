@extends('admin.layout.layout')
@section('content')
    <ul>
        @foreach ($roles as $item)
        <li>{{$itme->name}}</li>
        @endforeach
    </ul>
@endsection