@extends ('blog.layout.post')
@section ('content')
<div class="col-md-8 blog-main">

    @include('blog.post')
    
    @if (Auth::check())
    <div class="row">
        <a class="float-right btn btn-outline-success btn-sm" href="/posts/{{$post->id}}/edit">Edit</a>

        <form method="post" action="/posts/{{$post->id}}" onsubmit="return confirm('Are you sure?')">
            @csrf {{method_field("DELETE")}}
            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
        </form>
    </div>
    @endif
    <hr>
    <h2 id="comments">Comments</h2>
    @if(count($post->comments))
    <ul class="list-group">
        @foreach($post->comments as $comment)
        <li class="list-group-item">
            <b>{{$comment->created_at->diffForHumans()}}: </b> {{$comment->comment}}
        </li>
        @endforeach
    </ul>
    @else
    <h6>No Comments</h6>
    @endif
    <br><hr><br>
    @if(Auth::check())
    <div>
        <div class="card-block">
            <form action="/posts/{{$post->id}}/comments" method="POST">
                @csrf
                <div class="fomr-group">
                    <textarea name="comment" id="body" class="form-control" placeholder="Leave you comment.."></textarea>
                </div>
                <div class="from-group text-center">
                    <button type="submit" class="btn btn-outline-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    <br><br>
</div><!-- /.blog-main -->
@endsection