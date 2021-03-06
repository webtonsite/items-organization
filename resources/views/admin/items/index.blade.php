@extends('admin.layouts.admin_app')

@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('scripts1')
  <!-- DataTables -->
  <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endsection

@section('scripts2')
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Items
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Items</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Count</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->category->title }}</td>
                  <td>{{ $item->count }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->description }}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route('items.edit', $item->id) }}" class="btn btn-info">Edit</a>
                      {{ Form::Open(['route'=>['items.destroy', $item->id], 'method'=>'DELETE', 'class'=>'inline']) }}
                        {{ Form::submit('Delete', ['class'=>'btn btn-danger btn-delete']) }}
                      {{ Form::Close() }}
                    </div>
                  </td>
                </tr>
                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


