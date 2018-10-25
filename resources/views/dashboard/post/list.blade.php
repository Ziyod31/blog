@extends('dashboard.layout.board')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12"><br>
<div class="card">
   <div class="card-header">
       <h2>List of Posts</h2>
   </div> 
   
      <div class="card-body">
         

          @if(count($posts))
          <table class="table table-borderless">
             <thead>
                 <tr>
                     <th></th>
                     <th>Posts</th>
                     <th></th>
                     <th></th>
                 </tr>
             </thead>
              <tbody>
                  @foreach($posts as $post)
                  <tr>
                      <td></td>
                      <td><a href="/posts/{$post->id}">{{$post->title}}</a></td>
                      <td><a class="float-right btn btn-outline-success btn-sm" href="/posts/{{$post->id}}/edit">Edit</a></td>
                      <td>
                          <form method="post" action="/posts/{{$post->id}}" onsubmit="return confirm('Are you sure?')">
                              @csrf {{method_field("DELETE")}}
                              <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        @endif
    </div>
</div>
@endsection