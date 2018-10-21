<aside class="col-md-4 blog-sidebar">
    <div class="p-3 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <div class="p-3">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">

            @foreach($archives as $item)
            <li><a href="/?year={{$item['year']}}&month={{$item['month']}}">{{$item['month']}} {{$item['year']}}</a></li>
            @endforeach

        </ol>
    </div>

    <div class="p-3">
        <h4 class="font-italic">Tags</h4>
        <ol class="list-unstyled">

        @foreach($tags as $tag)
        <li><a href="/posts/tags/{{$tag}}">{{$tag}}</a></li>
        @endforeach

       
        </ol>
    </div>
</aside>