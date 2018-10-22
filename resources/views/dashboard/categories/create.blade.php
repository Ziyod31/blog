@extends('dashboard.layout.board')
@section('content')

<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Add Category
    </h3>
    <form action="/categories/category/store" id="contact-from" method="POST">
        <div class="controls">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input id="category" type="text" name="name" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                    <input type="submit" class="btn btn-success btn-send" value="Add Category">
                </div>
            </div>
        </div>
    </form>
</div>

@endsection