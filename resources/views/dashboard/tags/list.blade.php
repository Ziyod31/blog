@extends('dashboard.layout.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12"><br>
<div class="card">
   <div class="card-header">
       <h2>List of Tags</h2>
   </div> 
   
      <div class="card-body">
          @if(count($tags))
          <table class="table table-borderless">
             <thead>
                 <tr>
                     <th>Name</th>
                     <th></th>
                 </tr>
             </thead>
              <tbody>
                  @foreach($tags as $tag)
                  <tr>
                      <td>{{$tag->name}}</td>
                      <td class="tag-delete">
                          <form method="post" action="/tags/{{$tag->id}}" onsubmit="return confirm('Are you sure?')">
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