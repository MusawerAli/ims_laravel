@extends('header_footer.master')
@section('title','Categorie')

@section('body')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category id</th>
        <th scope="col">Category Name</th>
        <th scope="col">Status</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($categorie as $categorie)
      <tr>
      
        <th scope="row">{{$categorie->id}}</th>
        <td>{{$categorie->category_id}}</td>
        <td>{{$categorie->category_name}}</td>
        <td>{{$categorie->category_status}}</td>
        <td>{{$categorie->created_at}}</td>
        <td>{{$categorie->updated_at}}</td>
        <td>action</td>
       
        
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
    