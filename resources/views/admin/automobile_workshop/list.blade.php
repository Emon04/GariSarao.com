
@extends('admin.master')

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
                        <h6 class="m-0 font-weight-bold text-primary">View Brand</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Workshop Name</th>
                                    <th>About</th>
                                    <th>Trade License</th>
                                    <th>Brand Image</th>
                                    <th>Publication Status</th>
                                    <th class="text-center">Action</th>
                                </tr>

                                @php ($i = 1)
                                @foreach($workshops as $workshop)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$workshop->name}}</td>
                                        <td>{{$workshop->about}}</td>
                                        <td>{{$workshop->trade_license}}</td>
                                        <td><img src="{{asset($workshop->image)}}" width="80"></td>
                                        <td>{{$workshop->status==1?'active':'inactive'}}</td>
                                        <td>

                                            <a href=""  class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$workshop->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="post" action="{{ route('automobileWorkshop.destroy',$workshop->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you confirm to delete?')"> <i class="fas fa-trash"></i>Delete</button>
                                            </form>
{{--                                            <a href="{{route('automobileWorkshop.delete',$workshop->id)}}" class="btn btn-sm btn-danger">--}}
{{--                                                <i class="fas fa-trash"></i>--}}
                                            </a>
                                        </td>
                                    </tr>
                                   @include('admin.automobile_workshop.edit-workshop')
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
