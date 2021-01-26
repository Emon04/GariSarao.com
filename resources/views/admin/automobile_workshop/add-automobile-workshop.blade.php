@extends('admin.master')


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
            <h2>New Automobile Workshop</h2>
            <div class="col-md-12">
                <form action="{{route('automobileWorkshop.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >Workshop name</label>
                        <input required type="text" class="form-control" name="name"  placeholder="Enter automobile workshop name">
                        <span style="color: red">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >About the automobile workshop</label>
                        <textarea required class="form-control" name="about" placeholder="Write about the workshop"></textarea>
                        <span style="color: red">{{$errors->has('about') ? $errors->first('about') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Address</label>
                        <input required type="text" class="form-control" name="address"  placeholder="Enter address">
                        <span style="color: red">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Service areas (use comma (',') to separate areas</label>
                        <input required type="text" class="form-control" name="service_areas"  placeholder="Enter areas you want to provide service">
                        <span style="color: red">{{$errors->has('service_areas') ? $errors->first('service_areas') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input required type="email" class="form-control" name="email"  placeholder="Enter business email address">
                        <span style="color: red">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >phone</label>
                        <input required type="text" class="form-control" name="phone"  placeholder="Enter business phone number">
                        <span style="color: red">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Trade License</label>
                        <input required type="text" class="form-control" name="trade_license"  placeholder="Enter business trade license number">
                        <span style="color: red">{{$errors->has('trade_license') ? $errors->first('trade_license') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Workshop Banner/Logo Image</label>
                        <input required type="file" class="form-control-file" name="image" id="profile-img">
                        <img src="" id="profile-img-tag" width="200px" />
                        <span style="color: red">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input required type="password" class="form-control-file" name="password" id="password" required>
                        <span style="color: red">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                    </div>
                    <div class="form-group ">
                        <label>Status</label>
                        <input type="radio" checked name="status" value="1" >
                        <label >Active</label>
                        <input type="radio" name="status" value="0" >
                        <label >Inactive</label> <br>
                        <span style="color: red">{{$errors->has('status') ? $errors->first('status') : ''}}</span>

                    </div>
                    <button type="submit"name="btn" class="btn btn-primary">Add-Brand</button>
                </form>

            </div>
        </div>

    </div>
@endsection

