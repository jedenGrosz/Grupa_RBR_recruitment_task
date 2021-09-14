@extends('layouts.main')

@section('title', $post->title)

@section('content')
    <div class="bg-light p-5 rounded-lg m-3">
        <h1 class="display-4">{{ $post->title}}</h1>
        <p class="lead">{{ $post->body }}</p>
        <hr class="my-4">
        <p><strong>author: </strong>{{$post->user->name}} "{{$post->user->username}}"</p>
    </div>
@endsection