@extends('layouts.app')

@section('content')
<div class="container py-3-">
    <div class="header-page d-flex justify-content-between align-items-center mb-3">
        <h1>Lista dei post</h1>
        <div>
          <a href="{{route('admin.posts.create')}}">
            <button class="btn btn-primary">Nuovo Post</button>
          </a>
        </div>
    </div>

    @if (@session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col" class="col">ID</th>
            <th scope="col" class="col-9">Title</th>
            <th scope="col" class="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>
              <div class="d-flex gap-3">
                <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-success">
                  info
                </a>
                <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning">
                  edit
                </a>
                <form action="{{route('admin.posts.destroy', $post) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">delete</button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection