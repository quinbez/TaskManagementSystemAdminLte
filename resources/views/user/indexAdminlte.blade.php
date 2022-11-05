<?php
    $count =App\Models\Task::where('user_id',Auth::user()->id)->where('seen', 0)->where('status', 'pending')->count();

    $expiring = App\Models\Task::where('user_id', Auth::user()->id)->where('status', '!=', 'completed')->where(function ($q) {
        return $q->whereDate('end_date', '>=', Carbon\Carbon::now())->whereDate('end_date', '<=', Carbon\Carbon::now()->addDays(2));
    })->count();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management System</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/adminlteTms.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <form action="{{ url('member/search') }}" method="GET">
                    @csrf
                    <div class="input-group custom-search-form" style="width: 500px;">
                        <input type="search" class="form-control" placeholder="Search..." name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="fa fa-search" id="searchhover"></span>
                            </button>
                        </span>
                    </div>
                </form>
                <li class="nav-item dropdown mt-2 ml-2">
                    @if ($count > 0 || $expiring > 0)
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
                    @endif
                    <i class="far fa-bell"></i>
                    @if($count >0 || $expiring>0)
                        <span class="badge badge-warning navbar-badge">
                            {{ $expiring > 0 ?  $count + $expiring : $count}}
                        </span>
                    @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{$count+$expiring}} Notifications</span>
                        <div class="dropdown-divider"></div>
                        <span class="mr-2"></span>
                        <a class="text-secondary" href="@if ($count < 1) # @else {{ route('pending') }} @endif">{{ $count }} Assigned tasks</a>
                        <div class="dropdown-divider"></div>
                        @if($expiring > 0)
                            <span class="mr-2"></span>
                            <a class="text-secondary" href="{{route('expiring') }}">{{$expiring}} Tasks are expiring soon!</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <div class="btn-group">
                    <button type="button" class="btn addcolor dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="boxx">
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="logbord" type="submit">{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </ul>
        </nav>
        <div class="d-flex flex-nowrap">
            <div class="d-flex flex-column main-sidebar sidebar-dark-primary border border-grey border-top-0 sidelinecontainerwidth">
                <a href="{{route('dashboards')}}" class="brand-link">
                    <span class="brand-text font-weight-light">Task Management System</span>
                </a>
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{route('dashboards')}}" class="nav-link" id="userdashboardNav">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('userproject')}}" class="nav-link" id="userAssignedProjNav">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Assigned Projects </p>
                                </a>
                            </li>
                            <li class="nav-item"  id="userTaskNav">
                                <a href="#" class="nav-link" id="userTaskNava">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Task
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('alltask')}}" class="nav-link" id="userAssignedNava">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Assigned Tasks</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('pending')}}" class="nav-link" id="userPendingNava">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pending Tasks</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('onprogress')}}" class="nav-link" id="userOnprogNav">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tasks on progress</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('completed')}}" class="nav-link" id="userCompNava">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Completed Tasks</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="d-flex flex-grow-1 flex-column">
            @yield('content')
        </div>
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
    <footer class="main-footer">
        <strong>Copyright &copy;<a href="https://vintechplc.com/">  Vintage Technologies</a>.</strong> All rights reserved.
    </footer>

    <script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/adminlte.min.js')}}"></script>
    <script src="{{ asset('jquery/jquery/jquery.knob.min.js') }}"></script>
    <script src="{{asset('js/sparkline.js')}}"></script>

</body>
</html>
