@extends ('blog.layout.post')
@section ('content')
<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Add post
    </h3>
    <form action="/posts/store" id="contact-from" method="POST">
        <div class="controls">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input id="title" type="text" name="title" class="form-control" placeholder="Title of your post">
                        <div class="help-block with-errors"></div>
                    </div>

                </div>

                <div class="col-md-4">
                    <label for="title">Select Category *</label><br>

                    <select name="category_id" id="category-icon">
                        <option value="0">Category</option>
                        @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div><br>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="body">Text *</label>
                        <textarea id="body" name="body" class="form-control" placeholder="Your text" rows="4"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            
           
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="tags">Tags *</label>
                        <input type="text" name="tags" class="form-control" id="name" placeholder="Add more tags with  , ">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Add Post">
            </div>
        </div>
    </form>
</div>
@endsection