@extends('main')

@section('content')
    <div class="card container mt-4">
        <div class="card-header">
            post id = {{ $post->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">
                {{ $post->id }}
            </h5>
            <p class="card-text">
                {{ $post->body }}
            </p>
            <a href="{{ route('delete-post', ['id' => $post->id]) }}" class="btn btn-danger">Delete</a>
            <a href="{{ route('update-post-form', ['id' => $post->id]) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
@endsection