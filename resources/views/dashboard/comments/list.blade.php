@extends('dashboard.layout.board')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8"><br>
<div class="card">
   <div class="card-header">
       <h2>List of Comments</h2>
   </div> 
   
      <div class="card-body">
          @if(count($comments))
          <table class="table table-borderless">
             <thead>
                 <tr>
                     <th>Comments</th>
                     <th></th>
                 </tr>
             </thead>
              <tbody>
                  @foreach($comments as $item)
                  <tr>
                      <td>{{$item->comment}}</td>
                      <td class="comment-delete">
                          <form method="post" action="/comments/{{$item->id}}" onsubmit="return confirm('Are you sure?')">
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