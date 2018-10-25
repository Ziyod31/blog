<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">

	    @foreach($categories as $item)
<li><a href="/posts/categories/{{$item->id}}">{{$item->name}}</a></li>
	    @endforeach

    </nav>
</div>