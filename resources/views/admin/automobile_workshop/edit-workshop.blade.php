<div class="modal fade" id="edit{{$workshop->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('automobileWorkshop.update',$workshop->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label >Workshop name</label>
                        <input value="{{ $workshop->name }}" required type="text" class="form-control" name="name"  placeholder="Enter automobile workshop name">
                        <span style="color: red">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >About the automobile workshop</label>
                        <textarea required class="form-control" name="about" placeholder="Write about the workshop">{{  $workshop->about  }}</textarea>
                        <span style="color: red">{{$errors->has('about') ? $errors->first('about') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Address</label>
                        <input value="{{ $workshop->address }}" required type="text" class="form-control" name="address"  placeholder="Enter address">
                        <span style="color: red">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Service areas (use comma (',') to separate areas</label>
                        <input value="{{ $workshop->service_areas }}" required type="text" class="form-control" name="service_areas"  placeholder="Enter areas you want to provide service">
                        <span style="color: red">{{$errors->has('service_areas') ? $errors->first('service_areas') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label >phone</label>
                        <input value="{{ $workshop->phone }}"  required type="text" class="form-control" name="phone"  placeholder="Enter business phone number">
                        <span style="color: red">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Trade License</label>
                        <input value="{{ $workshop->trade_license }}"  required type="text" class="form-control" name="trade_license"  placeholder="Enter business trade license number">
                        <span style="color: red">{{$errors->has('trade_license') ? $errors->first('trade_license') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Workshop Banner/Logo Image</label>
                        <input  type="file" class="form-control-file" name="image" id="profile-img">
                        <img src="{{ $workshop->image }}" id="profile-img-tag" width="200px" />
                        <span style="color: red">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                    </div>

                    <div class="form-group ">
                        <label>Status</label>
                        <input @if($workshop->status=='1') checked @endif  type="radio"  name="status" value="1" >
                        <label >Active</label>
                        <input  @if($workshop->status=='0') checked @endif type="radio" name="status" value="0" >
                        <label >Inactive</label> <br>
                        <span style="color: red">{{$errors->has('status') ? $errors->first('status') : ''}}</span>

                    </div>
                    <button type="submit"name="btn" class="btn btn-primary">Add-Brand</button>

                </form>
            </div>
        </div>
    </div>
</div>

