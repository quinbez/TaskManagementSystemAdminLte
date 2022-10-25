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

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <form action="{{ url('member/search') }}" method="GET">
                    @csrf
                    <div class="input-group custom-search-form" style="width: 500px;">
                        <input type="search" class="form-control" placeholder="Search..." name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="fa fa-search" id="searchhover"></span>
                            </button>
                        </span>

                </form>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">

                    @if ($count > 0 || $expiring > 0)
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">

                        @endif
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">@if($count >0 || $expiring>0){{ $expiring > 0 ?  $count + $expiring : $count}}@endif</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{$count+$expiring}} Notifications</span>
                    <div class="dropdown-divider"></div>
                    <span class="mr-2"></span><a class="text-secondary" href="@if ($count < 1) # @else {{ route('pending') }} @endif">{{ $count }}
                         Assigned tasks</a>
                    <div class="dropdown-divider"></div>
                    @if($expiring > 0)
                    <span class="mr-2"></span><a class="text-secondary" href="{{route('expiring') }}">
                        {{$expiring}} Tasks are expiring soon!</a>
                        @endif
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            </ul>
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
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <div class="d-flex flex-nowrap">
            {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> --}}
            <div class="d-flex flex-column main-sidebar sidebar-dark-primary border border-grey border-top-0 sidelinecontainerwidth">

                <!-- Brand Logo -->
            <a href="{{route('dashboards')}}" class="brand-link">
                <span class="brand-text font-weight-light">Task Management System</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('dashboards')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('userproject')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Assigned Projects </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Task
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('alltask')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assigned Tasks</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pending')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pending Tasks</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('onprogress')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tasks on progress</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('completed')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Completed Tasks</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('notify')}}" class="nav-link active">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Notifications
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>


                    </ul>

                    </li>


                </nav>
            </div>
        </div>
        <div class="d-flex flex-grow-1 flex-column p-3">

            @yield('content')

        </div>
        </div>
    </div>

    </div>

    </div>






    </div>
    </section>

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy;<a href="https://vintechplc.com/">  Vintage Technologies</a>.</strong> All rights reserved.
    </footer>

    </div>

    <!-- jQuery -->
    <script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/adminlte.min.js')}}"></script>
    <!-- jQuery Knob -->
    <script src="{{ asset('jquery/jquery/jquery.knob.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{asset('js/sparkline.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{asset('js/demo.js')}}"></script> --}}

</body>
</html>
