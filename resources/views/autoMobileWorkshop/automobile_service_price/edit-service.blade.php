<div class="modal fade" id="edit{{$servicep->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Service Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('autoMobileWorkshop.automobileServicePrice.update',$servicep->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                    <label >Automobile Services</label>
                    <select name="automobile_service_id" id="automobile_service_id" class="form-control" required    >
                        <option value="" disabled selected>Select A Service</option>
                        @foreach($services as $work)
                            <option @if($servicep->automobile_service_id==$work->id)selected @endif value="{{ $work->id }}">{{ $work->service_name }}</option>
                        @endforeach
                    </select>
                    {{--                        <input required type="email" class="form-control" name="email"  placeholder="Enter business email address">--}}
                    <span style="color: red">{{$errors->has('automobile_service_id') ? $errors->first('automobile_service_id') : ''}}</span>
            </div>
            <div class="form-group">
                <label >Automobile Engineers</label>
                <select name="automobile_engineer_id" id="automobile_engineer_id" class="form-control" required    >
                    <option value="" disabled selected>Select an Engineer</option>
                    @foreach($engineers as $work)
                        <option @if($servicep->automobile_engineer_id==$work->id)selected @endif value="{{ $work->id }}">{{ $work->full_name }}</option>
                    @endforeach
                </select>
                {{--                        <input required type="email" class="form-control" name="email"  placeholder="Enter business email address">--}}
                <span style="color: red">{{$errors->has('automobile_engineer_id') ? $errors->first('automobile_engineer_id') : ''}}</span>
            </div>
            <div class="form-group">
                <label >Price</label>
                <input value="{{ $servicep->price }}" required type="number" step="any" class="form-control" name="price"  placeholder="200.5">
                <span style="color: red">{{$errors->has('price') ? $errors->first('price') : ''}}</span>
            </div>

            <div class="form-group">
                <label >Description</label>
                <textarea required name="description" id="description" class="form-control" cols="30" rows="5">{{ $servicep->description }}</textarea>
                <span style="color: red">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
            </div>


            <div class="form-group ">
                        <label>Status</label>
                        <input @if($servicep->status=='1') checked @endif  type="radio"  name="status" value="1" >
                        <label >Active</label>
                        <input  @if($servicep->status=='0') checked @endif type="radio" name="status" value="0" >
                        <label >Inactive</label> <br>
                        <span style="color: red">{{$errors->has('status') ? $errors->first('status') : ''}}</span>

                    </div>
                    <button type="submit"name="btn" class="btn btn-primary">Update Information</button>

                </form>
            </div>
        </div>
    </div>
</div>

