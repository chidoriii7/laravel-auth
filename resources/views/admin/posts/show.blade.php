@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="header-page d-flex justify-content-between align-items-center mb-5">
        <h1>{{$post->title}}</h1>
        <div>
            <a href="{{route('admin.posts.edit', $post)}}">
                <button class="btn btn-secondary">Edit</button>
            </a>
        </div>
    </div>
    <p>{{$post->content}}</p>
    <hr>
    <a href="{{route('admin.posts.index')}}"><button class="btn btn-secondary">Torna alla home</button></a>
</div>

@endsection