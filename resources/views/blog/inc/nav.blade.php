<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">

	    @foreach($categories as $cat)
<li><a href="/posts/categories/{{$cat}}">{{$cat}}</a></li>
	    @endforeach

    </nav>
</div>