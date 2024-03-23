<form action="{{route('bookings.update', $data->id)}}" method="POST" id="_update_data">
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="hotel-name" class="col-form-label">Hotel Name <sup class="text-danger">*</sup></label>
          <input type="text" name="name" class="form-control" value="{{$data->hotel->name}}" id="hotel-name" autofocus="true">
          <input type="hidden" name="user_id" value="{{$data->user->id}}">
          <input type="hidden" name="hotel_id" value="{{$data->hotel->id}}">
        </div>

        <div class="mb-3">
            <label for="hotel-location" class="col-form-label">Location <sup class="text-danger">*</sup></label>
            <input type="text" name="location" class="form-control" value="{{$data->hotel->location}}" id="hotel-location" autofocus="true">
        </div>

        <div class="mb-3">
            <label class="col-form-label">Room Type <sup class="text-danger">*</sup></label>
            <select name="room_type" id="" class="form-control">
                <option selected="false" disabled> Select Room Type </option>
                <option value="Single" {{$data->room_type == 'Single' ? 'selected':''}}>Single</option>
                <option value="Double" {{$data->room_type == 'Double' ? 'selected':''}}>Double</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="check_in" class="col-form-label">Check In <sup class="text-danger">*</sup></label>
            <input type="text" name="check_in" class="form-control" value="{{$data->check_in}}" id="check_in" autofocus="true">
        </div>

        <div class="mb-3">
            <label for="check_out" class="col-form-label">Room Type <sup class="text-danger">*</sup></label>
            <input type="text" name="check_out" class="form-control" value="{{$data->check_out}}" id="check_out" autofocus="true">
        </div>
        
        <div class="mb-3">
            <label for="occupants" class="col-form-label">Occupants <sup class="text-danger">*</sup></label>
            <input type="text" name="occupants" class="form-control" value="{{$data->occupants}}" id="occupants" autofocus="true">
        </div>

        <div class="mb-3">
            <label for="number_of_room" class="col-form-label">Number of Rooms <sup class="text-danger">*</sup></label>
            <input type="numer" name="number_of_room" class="form-control" value="{{$data->number_of_room}}" id="number_of_room" autofocus="true">
        </div>
        
        <div class="mb-3">
            <label class="col-form-label">Status <sup class="text-danger">*</sup></label>
            <select name="status" id="" class="form-control">
                <option selected="false" disabled> Select Status </option>
                <option value="Pending" {{$data->status == 'Pending' ? 'selected':''}}>Pending</option>
                <option value="Confirm" {{$data->status == 'Confirm' ? 'selected':''}}>Confirm</option>
                <option value="Checked out" {{$data->status == 'Checked out' ? 'selected':''}}>Checked out</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        @if($data->status != 'Checked out')
        <button type="submit" class="btn btn-sm btn-primary float-right"><span class="spinner-border spinner-border-sm loading d-none"></span> Update</button>
        @endif
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