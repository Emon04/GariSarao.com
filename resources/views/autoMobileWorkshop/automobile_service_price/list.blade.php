
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
                        <h6 class="m-0 font-weight-bold text-primary">Service Price List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Engineer</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th class="center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($i = 1)
                                @foreach($servicesp as $servicep)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$servicep->automobileService->service_name}}</td>
                                        <td>{{$servicep->description}}</td>
                                        <td>{{ $servicep->automobileEngineer->full_name }}</td>
                                        <td>{{ $servicep->price}}</td>
                                        <td>{{$servicep->status==1?'Active':'Inactive'}}</td>
                                        <td>

                                            <a href=""  class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$servicep->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="post" action="{{ route('autoMobileWorkshop.automobileServicePrice.delete',$servicep->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you confirm to delete?')"> <i class="fas fa-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                   @include('autoMobileWorkshop.automobile_service_price.edit-service')
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
