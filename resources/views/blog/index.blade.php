@extends('blog.layout.main')
@section('content')
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                The latest posts
            </h3>
            @if(count($posts))
            @foreach($posts as $post)
            @include('blog.post')
            @endforeach
            @else
            <h3>Nothing published yet...</h3>
            @endif
            <nav class="blog-pagination">
                <!--
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
-->
                {{$posts->links()}}
            </nav>
        </div>
        @include('blog.inc.sidebar')
    </div>
</main>

@endsection