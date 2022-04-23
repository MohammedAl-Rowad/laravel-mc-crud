@extends('main')

@section('content')
<div class="container mt-4">
        
    <div class="row">
       @foreach ($posts as $post)
           <div class="col-4">
               <div class="card">
                   <div class="card-body">
                       <h5 class="card-title"></h5>
                       <p class="card-text text-truncate">
                           {{ $post->body }}
                       </p>
                       <a href="{{ route('posts-by-id', ['id' => $post->id]) }}" class="btn btn-primary">See deatils</a>
                   </div>
               </div>
           </div>
       @endforeach
   </div>
   {{ $posts->links() }}
</div>
@endsection