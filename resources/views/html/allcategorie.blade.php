@extends('header_footer.master')

@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('title','Category')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('body')
 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<a onclick="addData()" class="btn btn-sm btn-success" data-target="#modal-form" >Add New</a>
<table id="category-table" class="table table-striped" >
    <thead>
      <tr>
        <th scope="col">#</th>
      
        <th scope="col">Category Name</th>
        <th scope="col">Status</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
     
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   
    </tbody>
   
  </table>
 
  @include('html/Modal-html-File/category');
@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
{{-- <script src="{{URL::asset('public/vendor/jquery/jquery.min.js')}}"></script> --}}
   <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  var table=$('#category-table').DataTable({

    processing:true,
    serverSide:true,
    ajax:'{{route('all.category')}}',
    columns:[

          {data:'id',name:'id'},
         
          {data:'category_name',name:'category_name'},
          {data:'category_status',name:'category_status'},
          {data:'created_at',name:'created_at'},
          {data:'updated_at',name:'updated_at'},
          {data:'action',name:'action',orderable:false,searchable:false},
           

    ]
  });


//Event  function addForm()
      function addData()
      {
          
        save_method= 'add';
        $('input[name_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add new Category');
        $('#insert_btn').text('Add User');

      }

      // Insert Data by Ajax

          $(function(){
            $('#modal-form form').validator().on('submit',function(e){
           
              if(!e.isDefaultPrevented()){
                var id=$('#id').val();
               if(save_method =='add') URL = "{{url('allcategorie')}}";
               else URL = "{{ url('allcategorie'). '/' }} " + id;
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
     
      function editData(id)
      {
  
        save_method='edit';
        $('input[name_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url:"{{URL('allcategorie')}}" +'/' + id + "/edit",
            type:"GET",
            datatype:"JSON",
            success:function(data){
              $('#modal-form ').modal("show");
              $('.modal-title').text('Edit Contact');
              $('#insert_btn').text('Update');
              $('#id').val(data.id);
              $('#categorie_name').val(data.category_name);
              $('#status').val(data.category_status);
              

            },
            error: function(){
              alert('not working');
            }


        });
       
     
      }

      function deleteData(id)
      {
        var csrf_token=$('meta[name="csrf-token"]').attr('content');
        swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   $.ajax({
    url:"{{URL('allcategorie')}}" +'/' + id,
    type:"get",
    data:{'_method':'DELETE','_token':csrf_token},
    success:function(data){
      console.log(data);
      table.ajax.reload();
      swal("Poof! Your imaginary file has been deleted!", {
      title:"Deleted Done",
      text:"You Clicked Button",
      icon:"Success",
      button:"Done",
    });
    },
    error:function(data){
      console.log(data);
      swal({
        title:'Oops....',
        text:data.message,
        type:'error',
        timer:'1500',
      })
    }
   });
    
  } else {
    swal("Your imaginary file is safe!");
  }
});
      }

    

</script> 
  @endsection
  