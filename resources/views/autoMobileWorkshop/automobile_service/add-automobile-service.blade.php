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
                <form action="{{route('autoMobileWorkshop.automobileService.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >Automobile Service Name</label>
                        <input required type="text" class="form-control" name="service_name"  placeholder="Enter automobile engineer name">
                        <span style="color: red">{{$errors->has('service_name') ? $errors->first('service_name') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label >Service Description</label>
                        <textarea required name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                             <span style="color: red">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label >Service Banner Image</label>
                        <input required type="file" class="form-control-file" name="image" id="profile-img">
                        <img src="" id="profile-img-tag" width="200px" />
                        <span style="color: red">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                    </div>

                    <div class="form-group ">
                        <label>Service Status</label>
                        <input type="radio" checked name="status" value="1" >
                        <label >Active</label>
                        <input type="radio" name="status" value="0" >
                        <label >Inactive</label> <br>
                        <span style="color: red">{{$errors->has('status') ? $errors->first('status') : ''}}</span>
                    </div>
                    <button type="submit"name="btn" class="btn btn-primary">Save Engineer</button>
                </form>
            </div>
        </div>

    </div>
@endsection

