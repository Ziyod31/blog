@extends ('blog.layout.post')
@section ('content')
<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Edit post
    </h3>
    <form action="/posts/{{$post->id}}" id="contact-from" method="POST">
        <div class="controls">
            @csrf {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input id="title" type="text" name="title" class="form-control" value="{{old('title', $post->title)}}">
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
                
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="body">Text *</label>
                        <textarea id="body" name="body" class="form-control" rows="4" value="{{old('body', $post->body)}}"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Tags *</label>
                        <input type="text" name="tags" class="form-control" id="name" placeholder="repeat tags">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Edit Post">
            </div>
        </div>
    </form>
</div>
@endsection