<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('autoMobileWorkshop.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Garisarao.com</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <div class="text-center d-none d-md-inline" style="display: inline-block">
        <button class="rounded-circle" id="sidebarToggle"></button>
    </div>
    <li class="nav-item ">
        <a  class="nav-link"  href="{{route('autoMobileWorkshop.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
{{--        <a class="btn  rounded-circle border-0" id="sidebarToggle"></a>--}}
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Automobile Engineer</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Automobile Engineer</h6>
                <a class="collapse-item" href="{{route('autoMobileWorkshop.automobileEngineer.save')}}"> Add New</a>
                <a class="collapse-item" href="{{route('autoMobileWorkshop.automobileEngineer.list')}}"> view List</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Automobile Services</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Automobile Service:</h6>
                    <a class="collapse-item" href="{{route('autoMobileWorkshop.automobileService.save')}}"> Add New</a>
                    <a class="collapse-item" href="{{route('autoMobileWorkshop.automobileService.list')}}"> view List</a>
                </div>
            </div>
        </li>
    <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Service Package</span>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Automobile Service price:</h6>
                        <a class="collapse-item" href="{{route('autoMobileWorkshop.automobileServicePrice.save')}}"> Add New</a>
                        <a class="collapse-item" href="{{route('autoMobileWorkshop.automobileServicePrice.list')}}"> view List</a>
                    </div>
                </div>
            </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWorkshop" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Service requests</span>
            </a>
            <div id="collapseWorkshop" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Requests:</h6>
                    <a class="collapse-item" href="{{route('autoMobileWorkshop.service.requests')}}">Service requests</a>
                </div>
            </div>
        </li>


</ul>
