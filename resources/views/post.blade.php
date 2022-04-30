@extends('main')

@section('content')
    <div class="card container mt-4">
        @if (request()->get('added-to-card'))
            <div class="alert alert-success">
                Added to cart 🛒
            </div>
        @endif
        @if (request()->get('removed-from-card'))
            <div class="alert alert-info">
                Removed from cart 🛒
            </div>
        @endif
        <div class="card-header">
            post id = {{ $post->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">
                {{ $post->title }}
            </h5>
            <p class="card-text">
                {{ $post->body }}
            </p>
            <a href="{{ route('delete-post', ['id' => $post->id]) }}" class="btn btn-danger">Delete</a>
            <a href="{{ route('update-post-form', ['id' => $post->id]) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('add-to-cart', ['id' => $post->id]) }}" class="btn btn-info">Add to cart 🛒</a>
            @if ( in_array($post->id, explode(',', Cookie::get('PRODUCT_COOKIE'))))
                <a href="{{ route('remove-from-cart', ['id' => $post->id]) }}" class="btn btn-danger">Remove from to cart 🛒</a>
            @endif
        </div>
    </div>
@endsection