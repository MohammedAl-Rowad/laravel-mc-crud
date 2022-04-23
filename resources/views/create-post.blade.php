@extends('main')
@section('content')
    <div class="container mt-4">
        <form 
            action="
                @if (isset($post))
                    {{ route('update-post', ['id' => $post->id]) }}
                @else
                    {{ route('create-post') }}
                @endif
            " 
            method="post"
        >
            @csrf
            <div class="mb-3">
                <label for="post-title" class="form-label">Post title</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="post-title" 
                    name="title" 
                    placeholder="Post title"
                    value="@isset($post) {{ $post->title }} @endisset"
                />
            </div>
            <div class="mb-3">
                <label for="post-body" class="form-label">Body</label>
                <textarea class="form-control" id="post-body" name="body" rows="10">
                    @isset($post) {{ $post->body }} @endisset
                </textarea>
            </div>
            <button type="submit" name="post_data" class="btn btn-primary mb-3">Create post</button>
        </form>
    </div>
@endsection