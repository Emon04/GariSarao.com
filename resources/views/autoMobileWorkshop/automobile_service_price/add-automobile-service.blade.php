@extends('autoMobileWorkshop.master')

@section('title','New Automobile Service')
@section('body')
    <div class="container-fluid">
        @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <h2>New Automobile Service</h2>
            <div class="col-md-12">
                <form action="{{route('autoMobileWorkshop.automobileServicePrice.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >Automobile Services</label>
                        <select name="automobile_service_id" id="automobile_service_id" class="form-control" required    >
                            <option value="" disabled selected>Select A Service</option>
                            @foreach($services as $work)
                                <option value="{{ $work->id }}">{{ $work->service_name }}</option>
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
                                <option value="{{ $work->id }}">{{ $work->full_name }}</option>
                            @endforeach
                        </select>
                        {{--                        <input required type="email" class="form-control" name="email"  placeholder="Enter business email address">--}}
                        <span style="color: red">{{$errors->has('automobile_engineer_id') ? $errors->first('automobile_engineer_id') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Price</label>
                        <input required type="number" step="any" class="form-control" name="price"  placeholder="200.5">
                        <span style="color: red">{{$errors->has('price') ? $errors->first('price') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label >Description</label>
                        <textarea required name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                             <span style="color: red">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                    </div>


                    <div class="form-group ">
                        <label>Service Status</label>
                        <input type="radio" checked name="status" value="1" >
                        <label >Active</label>
                        <input type="radio" name="status" value="0" >
                        <label >Inactive</label> <br>
                        <span style="color: red">{{$errors->has('status') ? $errors->first('status') : ''}}</span>
                    </div>
                    <button type="submit"name="btn" class="btn btn-primary">Create Now</button>
                </form>
            </div>
        </div>

    </div>
@endsection

