@extends('dashboard.layout.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12"><br>
<div class="card">
   <div class="card-header">
       
       <h2>List of Categories
       <span class="float-right"><a href="/categories/category/create" class="btn btn-success btn-sm">Add Category</a></span></h2>
   </div> 
   
      <div class="card-body">
         
          @if(count($categories))
          
          <table class="table table-borderless">
             <thead>
                 <tr>
                     <th>id</th>
                     <th>Name</th>
                     <th></th>
                     <th></th>
                 </tr>
             </thead>
              <tbody>
                  @foreach($categories as $category)
                  <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                      <td><a class="float-right btn btn-outline-success btn-sm" href="/categories/{{$category->id}}/edit">Edit</a></td>
                      <td>
                          <form method="post" action="/categories/{{$category->id}}" onsubmit="return confirm('Are you sure?')">
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