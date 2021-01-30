<div class="modal fade" id="edit{{$service->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('autoMobileWorkshop.automobileService.update',$service->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label >Automobile Service Name</label>
                        <input value="{{ $service->service_name }}" required type="text" class="form-control" name="service_name"  placeholder="Enter automobile engineer name">
                        <span style="color: red">{{$errors->has('service_name') ? $errors->first('service_name') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label >Service Description</label>
                        <textarea  required name="description" id="description" class="form-control" cols="30" rows="10">{{ $service->description }}</textarea>
                        <span style="color: red">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                    </div>


                    <div class="form-group">
                        <label >Service Banner Image</label>
                        <input  type="file" class="form-control-file" name="image" id="profile-img">
                        <img src="{{ asset($service->image) }}" id="profile-img-tag" width="200px" />
                        <span style="color: red">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                    </div>

                    <div class="form-group ">
                        <label>Status</label>
                        <input @if($service->status=='1') checked @endif  type="radio"  name="status" value="1" >
                        <label >Active</label>
                        <input  @if($service->status=='0') checked @endif type="radio" name="status" value="0" >
                        <label >Inactive</label> <br>
                        <span style="color: red">{{$errors->has('status') ? $errors->first('status') : ''}}</span>

                    </div>
                    <button type="submit"name="btn" class="btn btn-primary">Update Information</button>

                </form>
            </div>
        </div>
    </div>
</div>

