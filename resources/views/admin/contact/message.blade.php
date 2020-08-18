@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Message</li>
	</ol>
@endsection

@section('main_content')
    <div class="col-lg-12">
      <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Message</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Message.No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Reply</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($messages as $message)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $message->fname}}
                      </td>
                      <td>{{ $message->lname}}</td>
                      <td>{{ $message->email}}</td>
                      <td>{{ $message->phoneNo}}</td>
                      <td>{{ $message->message}}</td>
                      <td>
                        <a class="btn btn-sm btn-info" href="#">
                          Reply
                        </a>
                      </td>

                      <td>
                        <form id="delete-form-{{ $message->id }}" action="{{ route('admincontact.destroy', $message->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                                                 
                        </form>
                        <a onclick="if(confirm('Are you sure to delete this message?')){event.preventDefault(); document.getElementById('delete-form-{{ $message->id }}').submit();}else{
                          event.preventDefault();
                        }
                        " class="btn btn-sm" href="">
                            <i class="fas fa-trash"></i>
                        </a> 
                        
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>

@endsection

@section('footersection')
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection