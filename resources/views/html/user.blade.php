@extends('header_footer.master')

@section('title','User')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('body')
 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<a onclick="addForm()" class="btn btn-sm btn-success" data-target="#modal-form" >Add New</a>
<table id="user-table" class="table table-striped" >
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
     
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    {{-- @foreach ($user as $user)
      <tr>
      
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
    
        <td>action</td>
       
        
      </tr>
      @endforeach --}}
    </tbody>
   
  </table>
 
  @include('html/user/userForm');
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
{{-- <script src="{{URL::asset('public/vendor/jquery/jquery.min.js')}}"></script> --}}
   <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  var table=$('#user-table').DataTable({

    processing:true,
    serverSide:true,
    ajax:'{{route('user_data.json')}}',
    columns:[

          {data:'id',name:'id'},
          {data:'name',name:'name'},
          {data:'email',name:'email'},
          {data:'action',name:'action',orderable:false,searchable:false},

    ]
  });


//Event  function addForm()
      function addForm()
      {
        save_method= 'add';
        $('input[name_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add new User');
        $('#insert_btn').text('Add User');

      }

      // Insert Data by Ajax

          $(function(){
            $('#modal-form form').validator().on('submit',function(e){
           
              if(!e.isDefaultPrevented()){
                var id=$('#id').val();
               if(save_method=='add') URL = "{{url('user')}}";
               else url = " {{ url('user'). '/' }} " + id;
               $.ajax({
                        url:url,
                        type:"POST",
                        data:new FormData($("#modal-form form")[0]),
                        contentType:false,
                        processData:false,
                        success:function(data){
                          $('#modal-form').modal('hide');
                          table.ajax.reload();
                          swal({
                                title:"Good job!",
                                text:"You clicked",
                                icon:"Success",
                                button:"Great",
                              
                              });
                        },
                        error :function(data){
                          swal({
                          title:'Oops...',
                          text:data.message,
                          type:'error',
                          timer:'1500'
                          })
                          
                        }
               });
              }
            });
          });

      //Edit Form data
     
      function editForm(id)
      {
        save_method='edit';
        $('input[name_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url:"{{URL('user')}}"+'/'+ id +"/edit",
            type:"GET",
            datatype:"JSON",
            success:function(data){
              $('#modal-form ').modal("show");
              $('.modal-title').text('Edit Contact');
              $('#insert_btn').text('Update');
              $('#id').val(data.id);
              $('#name').val(data.name);
              $('#email').val(data.email);
              $('#password').val(data.password);
              

            },
            error: function(){

            }


        });
       
     
      }

    

</script> 
  @endsection
  