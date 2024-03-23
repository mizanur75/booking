<form action="{{route('hotels.update', $data->id)}}" method="POST" id="_update_data">
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="hotel-name" class="col-form-label">Hotel Name <sup class="text-danger">*</sup></label>
          <input type="text" name="name" class="form-control" value="{{$data->name}}" id="hotel-name" autofocus="true">
        </div>

        <div class="mb-3">
            <label for="hotel-location" class="col-form-label">Location <sup class="text-danger">*</sup></label>
            <input type="text" name="location" class="form-control" value="{{$data->location}}" id="hotel-location" autofocus="true">
        </div>

        <div class="mb-3">
            <label for="available_rooms" class="col-form-label">Available Rooms <sup class="text-danger">*</sup></label>
            <input type="text" name="available_rooms" class="form-control" value="{{$data->available_rooms}}" id="available_rooms" autofocus="true">
        </div>
        
        <div class="mb-3">
            <label class="col-form-label">Status <sup class="text-danger">*</sup></label>
            <input type="radio" name="status" id="hotel-status-aU" value="1" {{$data->status == 1 ? 'checked':''}}> <label for="hotel-status-aU">Active</label>
            <input type="radio" name="status" id="hotel-status-dU" value="0" {{$data->status == 0 ? 'checked':''}}> <label for="hotel-status-dU">Deactive</label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary float-right"><span class="spinner-border spinner-border-sm loading d-none"></span> Update</button>
    </div>
</form>

<script>
//Data update by ajax
$("#update_data").submit(function(e){
    e.preventDefault();
    $(".loading").removeClass('d-none');
    var url = $(this).attr('action');
    var request = $(this).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: request,
        success: function(res){
            Swal.fire(res.success);
            $("#update_data")[0].reset();
            $(".loading").addClass('d-none');
            $("#editModal").modal('hide');
        }
    })
});
</script>