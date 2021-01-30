@extends('autoMobileWorkshop.master')


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
            <h2>New Automobile Engineer</h2>
            <div class="col-md-12">
                <form action="{{route('autoMobileWorkshop.automobileEngineer.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >Automobile Engineer Name</label>
                        <input required type="text" class="form-control" name="full_name"  placeholder="Enter automobile engineer name">
                        <span style="color: red">{{$errors->has('full_name') ? $errors->first('full_name') : ''}}</span>
                    </div>
                    <div class="form-group ">
                        <label>Gender</label>
                        <input type="radio" checked name="gender" value="Male" >
                        <label >Male</label>
                        <input type="radio" name="gender" value="Female" >
                        <label >Female</label> <br>
                        <span style="color: red">{{$errors->has('gender') ? $errors->first('gender') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label >Email</label>
                        <input required type="email" class="form-control" name="email"  placeholder="Enter  email address">
                        <span style="color: red">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >phone</label>
                        <input required type="text" class="form-control" name="phone"  placeholder="Enter business phone number">
                        <span style="color: red">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label >Image</label>
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
                    <button type="submit"name="btn" class="btn btn-primary">Save Engineer</button>
                </form>

            </div>
        </div>

    </div>
@endsection

