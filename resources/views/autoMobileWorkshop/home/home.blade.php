@extends('autoMobileWorkshop.master')

@section('title')
    Dashboard
@endsection

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">GariSarao's Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

{{--        <!-- Content Row -->--}}
{{--        <div class="row">--}}

{{--            <!-- Earnings (Monthly) Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                <div class="card border-left-primary shadow h-100 py-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Completed Part's Order</div>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800">500</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Earnings (Monthly) Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                <div class="card border-left-success shadow h-100 py-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Service Request</div>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fas fa-comments fa-2x text-gray-300"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Earnings (Monthly) Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                <div class="card border-left-info shadow h-100 py-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Part's Orders</div>--}}
{{--                                <div class="row no-gutters align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">60%</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="progress progress-sm mr-2">--}}
{{--                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Pending Requests Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                <div class="card border-left-warning shadow h-100 py-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Service Requests</div>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fas fa-comments fa-2x text-gray-300"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">GariSarao's Management</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Part's Sell <span class="float-right">20%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Site Popularity <span class="float-right">40%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Site Developed <span class="float-right">60%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Sevice's Quality <span class="float-right">80%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">User Friendly <span class="float-right">Complete!</span></h4>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">GariSarao.com Founder</h6>
                    </div>
                    <div class="card-body">

                        <p>Emon</p>
                        <a target="_blank" rel="nofollow" href="https://github.com/Emon04/GariSarao.com">Visit Github &rarr;</a>
                    </div>
                </div>



            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


    <!-- End of Main Content -->

@Endsection