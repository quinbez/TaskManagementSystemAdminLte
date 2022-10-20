<?php
$count = App\Models\Task::where('status', '!=', 'pending')
    ->where(function ($q) {
        $q->where('on_progress', 0)->orWhere('completed', 0);
    })
    ->count();

    $expiring = App\Models\Task::where('status', '!=', 'completed')->where(function ($q) {
        return $q->whereDate('end_date', '>=', Carbon\Carbon::now())->whereDate('end_date', '<=', Carbon\Carbon::now()->addDays(2));
    })->count();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Management</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('fav.jpg') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet"
        href="{{ url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ url('css/bootstrapValidator.min.css') }}">
    @yield('styles')

</head>
<body>
    {{-- <div id ="wrapper"> --}}
    <div class="d-flex flex-column flex-shrink-0 p-3 me-0 bg-light border border-grey containerwidth">
        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="{{ route('dashboards') }}" class="navbar-brand">Task Management</a>
                </div>
                <div class="navbar-header">
                    <ul class="nav navbar-nav navbar-right">
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

                        <div class="dropdown bg-light">
                            @if ($count > 0 || $expiring > 0)
                                <a href="javascript:void(0)" class="dropbtn"><span class="badge badge-pill badge-primary me-1"
                                        style="float:right;margin-bottom:-10px;font-size:10px;">
                                        {{ $expiring > 0 ?  $count + $expiring : $count}}
                                    </span>

                                    @endif
                            <span class="fas fa-bell " style="color: #9b34ae"></span></a>

                            <div class="dropdown-content">
                                <a href="@if ($count < 1) # @else {{ route('notify') }} @endif">{{ $count }}
                                    Notification</a>
                                 @if($expiring > 0)<a href="{{route('expiringTasks') }}">
                                 {{$expiring}} Tasks are expiring soon!</a>
                                 @endif
                            </div>
                        </div>
                        <a href="{{ route('createproj') }}" class="btn addcolor" style="color: white">+ New Project</a>
                </div>
                </ul>
                <ul>
                    <div class="btn-group">
                        <button type="button" class="btn addcolor dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="boxx">
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        {{-- <x-jet-dropdown-link href="{{ route('logout') }}" --}}
                                        {{-- @click.prevent="$root.submit();"> --}}
                                        <button class="logbord" type="submit">{{ __('Log Out') }}</button>
                                        {{-- </x-jet-dropdown-link> --}}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </ul>
        </nav>
    </div>
    <div class="d-flex flex-nowrap">
        <div class="d-flex flex-column p-3 bg-light border border-grey border-top-0 sidelinecontainerwidth">
            {{-- <ul class="navbar-nav" id="side-menu">
            <hr> --}}
            <ul class="nav nav-pills flex-column mb-auto mt-2">
                <li class="nav-item">
                    <a href="{{ route('dashboards') }}" class="nav-link"><span
                            class="fas fa-dashboard px-2"></span>Dashboard</a>
                </li>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default mt-2">
                        <div class="panel-heading mt-2 ">
                            <a class="nav-link collapsed" href="#collapse2" data-bs-toggle="collapse"> <span
                                    class="fas fa-users px-2"></span>Members</a>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse px-4" data-bs-parent="#accordion">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ route('index') }}">All members</a></li>
                                <li class="list-group-item"><a href="{{ route('create') }}">Add member</a></li>
                            </ul>
                        </div>
                        <div class="panel-heading mt-2">
                            <a class="nav-link collapsed" href="#collapse4" data-bs-toggle="collapse"><span
                                    class="fas fa-list-alt px-2"></span>Category</a>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse px-4" data-bs-parent="#accordion">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ route('indexcategory') }}">All categories</a>
                                </li>
                                <li class="list-group-item"><a href="{{ route('categories') }}">Add category</a></li>
                                {{-- <li class="list-group-item"><a href="#">Edit category</a></li> --}}
                            </ul>
                        </div>
                        <div class="panel-heading">
                            <a class="nav-link" href="#collapse1" data-bs-toggle="collapse"><span
                                    class="fas fa-diagram-project px-2"></span>Projects</a>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse px-4" data-bs-parent="#accordion">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ route('indexproj') }}">All projects</a></li>
                                <li class="list-group-item "><a href="{{ route('createproj') }}">Create project</a>
                                </li>
                            </ul>
                        </div>

                        <div class="panel-heading mt-2">
                            <a class="nav-link collapsed" href="#collapse3" data-bs-toggle="collapse"><span
                                    class="fas fa-tasks px-2"></span>Tasks</a>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse px-4" data-bs-parent="#accordion">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ route('indextask') }}">All tasks</a></li>
                                <li class="list-group-item"><a href="{{ route('tasks') }}">Assign task</a></li>
                                {{-- <li class="list-group-item"><a href="#">Edit task</a></li> --}}
                            </ul>
                        </div>

                        <div class="panel-heading mt-2">
                            <a class="nav-link collapsed" href="{{ route('notify') }}">

                                <span class="fas fa-bell px-2"></span>Notifications</a>
                        </div>
                    </div>
                </div>
            </ul>
            </ul>

        </div>
        <div class="d-flex flex-grow-1 flex-column p-3">

            @yield('content')

        </div>
    </div>


    <script src="{{ asset('jquery/jquery/jquery.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ url('js/bootstrapValidator.min.js') }}"></script>
    <script>
        $('#fromDatePicker').datepicker({
            autoclose: true,
            // endDate: 'today',
        }).on('changeDate', function(selected) {
            var startDate = new Date(selected.date.valueOf());
            $('#toDatePicker').datepicker('setStartDate', startDate);
        }).on('clearDate', function(selected) {
            $('#toDatePicker').datepicker('setStartDate', null);
        });
        $('#toDatePicker').datepicker({
            autoclose: true,
            // endDate: 'today',
        }).on('changeDate', function(selected) {
            var endDate = new Date(selected.date.valueOf());
            $('#fromDatePicker').datepicker('setEndDate', endDate);
        }).on('clearDate', function(selected) {
            $('#fromDatePicker').datepicker('setEndDate', null);
        });
    </script>
    @yield('scripts')

</body>

</html>
