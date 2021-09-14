@extends('layouts.main')

@section('title', 'Posts')

@section('content')
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th colspan="2">post</th>
                    <th>author</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->id }}</a>
                    </td>
                    <td colspan="2">{{ $post->body }}</td>
                    <td>{{ $post->user->username }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"> No posts found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection