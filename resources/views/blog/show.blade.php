@extends ('blog.layout.post')
@section ('content')
<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        From the Firehose
    </h3>

    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
        </h2>
        <p class="blog-post-meta">
            <span>{{$post->user->name}} </span> on
            {{$post->created_at->format('d-m-Y H:i:s') }}
        </p>
    {!!$post->body!!}
    </div>
    @if (Auth::check())
    <div class="row">
        <a class="float-right btn btn-outline-success btn-sm" href="/posts/{{$post->id}}/edit">Edit</a>

        <form method="post" action="/posts/{{$post->id}}" onsubmit="return confirm('Are you sure?')">
            @csrf {{method_field("DELETE")}}
            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
        </form>
    </div>
    @endif
</div><!-- /.blog-main -->
@endsection