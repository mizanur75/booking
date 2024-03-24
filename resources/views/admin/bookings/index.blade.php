@extends('layouts.app')

@section('title','Bookings')

@push('css')
    
@endpush

@section('admin-content')
<!-- Content Header (Page header) -->	  
<div class="content-header">
  <div class="d-flex align-items-center">
    <div class="me-auto">
      <div class="d-inline-block align-items-center">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
          </ol>
        </nav>
      </div>
    </div>
    
    @if(Auth::user()->role_id == '1')
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i> Add New</button>
    @endif
  </div>
</div>
<!-- Main content -->
<section class="content">
  <div class="row">
    @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
    @endif
      <div class="col-12">
          <div class="box">
              <div class="box-body">
                  <div class="table-responsive rounded card-table">
                      <table class="table table table-striped table-bordered display text-center" id="booking1">
                          <thead>
                            <tr>
                                <th>SL</th>
                                <th>Hotel Name</th>
                                <th>Location</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Occupants</th>
                                <th>Number of Rooms</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                              <td>{{$loop->index +1}}</td>
                              <td>{{$booking->hotel->name}}</td>
                              <td>{{$booking->hotel->location}}</td>
                              <td>{{$booking->check_in}}</td>
                              <td>{{$booking->check_out}}</td>
                              <td>{{$booking->occupants}}</td>
                              <td>{{$booking->number_of_room}}</td>
                              <td>{{$booking->status}}</td>
                              <td>
                                @if(Auth::user()->role_id == 1)
                                <a data-href="{{route('bookings.edit',$booking->id)}}" data-id="{{$booking->id}}" class="edit btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal"> <i class="fa fa-edit"></i></a>
                                  @if($booking->status != 'Checked out')
                                  <a href="javascript:void(0);" data-href="{{route('bookings.destroy',$booking->id)}}" class="delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                  @endif
                                @else
                                <i class="fa fa-eye"></i>
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- /.content -->

<!-- Modal add Start -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Hotel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('bookings.store')}}" method="POST" id="_add_data">
      <div class="modal-body">
          @csrf
          <div class="mb-3">
            <label for="booking-name" class="col-form-label">Hotel Name <sup class="text-danger">*</sup></label>
            <input type="text" name="name" class="form-control" placeholder="Enter booking name" id="booking-name" autofocus="true">
          </div>
          
          <div class="mb-3">
            <label for="booking-location" class="col-form-label">Hotel location <sup class="text-danger">*</sup></label>
            <input type="text" name="location" class="form-control" placeholder="Enter booking location" id="booking-location" autofocus="true">
          </div>
          
          <div class="mb-3">
            <label for="available_rooms" class="col-form-label">Available Rooms <sup class="text-danger">*</sup></label>
            <input type="number" name="available_rooms" class="form-control" placeholder="Enter available rooms" id="available_rooms" autofocus="true">
          </div>
          
          <div class="mb-3">
            <label class="col-form-label">Status <sup class="text-danger">*</sup></label>
            <input type="radio" name="status" id="booking-status-a" value="1" checked> <label for="booking-status-a">Active</label>
            <input type="radio" name="status" id="booking-status-d" value="0"> <label for="booking-status-d">Deactive</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary float-right"><span class="spinner-border spinner-border-sm loading d-none"></span> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal add End -->

<!-- Modal Edit Start -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="edit_data">
        
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit End -->

<!-- delete form Start -->

    <form action="" method="POST" id="delete_data">
        <div class="modal-body">
            @csrf
            @method('DELETE')
        </div>
    </form>
<!--  delete form End -->

@endsection

@push('js')
<script src="{{asset('back/assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('back/js/pages/data-table.js')}}"></script>
<script type="text/javascript">

  // Show all data by datatable
  var table = $('#booking1').DataTable();
  //Data show/edit by ajax
  $("table").on('click','.edit', function(){
    let id = $(this).data('id');
    let url = $(this).attr('data-href');
    $.ajax({
      url: url,
      type: "GET",
      success:function(res){
        $("#edit_data").html(res);
      }
    })
  });

  //Data delete by ajax
  $("table").on('click','.delete', function(){
    let url = $(this).attr('data-href');
    $("#delete_data").attr('action', url);

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    })
    .then((result) => {
      if (result.isConfirmed) {
        $("#delete_data").submit();
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    });
    $("#delete_data").submit(function(e){
          e.preventDefault();
          $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: $(this).serialize(),
            success:function(res){
              $("#delete_data")[0].reset();
              location.reload();
            }
        })
    });

    
  });

</script>
@endpush
