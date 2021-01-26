<div class="modal fade" id="edit{{$engineer->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('automobileEngineer.update',$engineer->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label >Workshop name</label>
                        <input  value="{{ $engineer->full_name }}" required type="text" class="form-control" name="full_name"  placeholder="Enter automobile workshop name">
                        <span style="color: red">{{$errors->has('full_name') ? $errors->first('full_name') : ''}}</span>
                    </div>
                    <div class="form-group ">
                        <label>Gender</label>
                        <input @if($engineer->gender=='Male') checked @endif  type="radio" checked name="gender" value="Male" >
                        <label >Male</label>
                        <input @if($engineer->gender=='Female') checked @endif  type="radio" name="gender" value="Female" >
                        <label >Female</label> <br>
                        <span style="color: red">{{$errors->has('gender') ? $errors->first('gender') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Automobile Workshop</label>
                        <select name="automobile_work_shop_id" id="automobile_work_shop_id" class="form-control" required    >

                            @foreach($workshops as $work)
                                <option  @if($engineer->automobile_work_shop_id==$work->id)selected @endif value="{{ $work->id }}">{{ $work->name }}</option>
                            @endforeach
                        </select>
                        {{--                        <input required type="email" class="form-control" name="email"  placeholder="Enter business email address">--}}
                        <span style="color: red">{{$errors->has('automobile_work_shop_id') ? $errors->first('automobile_work_shop_id') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label >phone</label>
                        <input value="{{ $engineer->phone }}"  required type="text" class="form-control" name="phone"  placeholder="Enter business phone number">
                        <span style="color: red">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label >Image</label>
                        <input  type="file" class="form-control-file" name="image" id="profile-img">
                        <img src="{{ $engineer->image }}" id="profile-img-tag" width="200px" />
                        <span style="color: red">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                    </div>

                    <div class="form-group ">
                        <label>Status</label>
                        <input @if($engineer->status=='1') checked @endif  type="radio"  name="status" value="1" >
                        <label >Active</label>
                        <input  @if($engineer->status=='0') checked @endif type="radio" name="status" value="0" >
                        <label >Inactive</label> <br>
                        <span style="color: red">{{$errors->has('status') ? $errors->first('status') : ''}}</span>

                    </div>
                    <button type="submit"name="btn" class="btn btn-primary">Update Information</button>

                </form>
            </div>
        </div>
    </div>
</div>

