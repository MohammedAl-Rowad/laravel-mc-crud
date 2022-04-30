@extends('main')


@section('content')


<div class="container mt-4">
    <div class="row">
        @isset($cart_posts)
            <div class="alert alert-info">
                Products from cart 🛒
            </div>
            
        @endisset
        @foreach ($posts as $post)
                <div class="col-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $post->title }}
                        </h5>
                        <p class="card-text text-truncate">
                            {{ $post->body }}
                        </p>
                        <a href="{{ route('post-by-id', ['id' => $post->id]) }}" class="btn btn-primary">
                            See details
                        </a>
                    </div>
                </div>
        @endforeach
    </div>
    {{ $posts->links('pagination::bootstrap-5') }}
</div>

@endsection
