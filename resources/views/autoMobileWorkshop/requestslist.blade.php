
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
                        <h6 class="m-0 font-weight-bold text-primary">Service Requests</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Service name</th>
                                    <th>Requester Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($i = 1)
                                @foreach($requests as $engineer)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$engineer->service->name}}</td>
                                        <td>{{$engineer->customer_name}}</td>
                                        <td>{{$engineer->phone}}</td>
                                        <td>{{$engineer->email}}</td>
                                        <td>{{$engineer->address}}</td>
                                        <td>{{$engineer->message}}</td>
                                    </tr>
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
