
@extends('autoMobileWorkshop.master')

@section('body')
    <div class="container">
        @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Automobile Engineer List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Workshop Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($i = 1)
                                @foreach($engineers as $engineer)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$engineer->full_name}}</td>
                                        <td>{{$engineer->workshop->name}}</td>
                                        <td>{{$engineer->email}}</td>
                                        <td><img src="{{asset($engineer->image)}}" width="80"></td>
                                        <td>{{$engineer->status==1?'Active':'Inactive'}}</td>
                                        <td>

                                            <a href=""  class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$engineer->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="post" action="{{ route('autoMobileWorkshop.automobileEngineer.delete',$engineer->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you confirm to delete?')"> <i class="fas fa-trash"></i>Delete</button>
                                            </form>
{{--                                            <a href="{{route('autoMobileWorkshop.automobileEngineer.delete',$engineer->id)}}" class="btn btn-sm btn-danger">--}}
{{--                                                <i class="fas fa-trash"></i>--}}
{{--                                            </a>--}}
                                        </td>
                                    </tr>
                                   @include('autoMobileWorkshop.automobile_engineer.edit-engineer')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
