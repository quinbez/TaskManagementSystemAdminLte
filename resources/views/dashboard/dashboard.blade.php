   @extends('layouts.adminlte')
    @section('content')
    <link rel="stylesheet" href="{{ asset('css/adminlteTms.css') }}">

    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid p-3">
                    <h5 class="mb-2">Dashboard</h5>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12 containerstyle">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Admins</span>
                                    <h6>{{$total_admin}} registered</h6>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12 containerstyle">
                            <div class="info-box">
                                <span class="info-box-icon bg-fuchsia"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Members</span>
                                    <h6>{{$total_members}} registered</h6>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12 containerstyle">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-tasks"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Tasks</span>
                                    <h6>{{$total_task}} added</h6>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12 containerstyle">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="fas fa-list-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Categories</span>
                                    <h6>{{$total_category}} added</h6>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12 containerstyle">
                            <div class="info-box">
                                <span class="info-box-icon bg-purple"><i class="fas fa-diagram-project icons"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total projects</span>
                                    <h6>{{$total_project}} added</h6>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12 containerstyle">
                            <div class="info-box">
                                <span class="info-box-icon bg-gray"><i class="fas fa-battery-empty"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pending Tasks</span>
                                    <h6>{{$pending_task}} tasks</h6>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12 containerstyle">
                            <div class="info-box">
                                <span class="info-box-icon bg-orange"><i class="fas fa-battery-half"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Task on progress</span>
                                    <h6> {{$on_progress}} tasks </h6>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12  containerstyle">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-battery-full"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Completed tasks</span>
                                    <h6>{{$completed}} tasks</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-md-3 col-sm-6 col-12 mr-2 ml-5 progresscontainer rounded">
                        <div class="p-3 me-2 fontsize">Completed Tasks</div>
                        <div class="container progressbar1">
                            <div class="circular-progress1">
                                <span class="progress-value1"></span>
                                <input type="hidden" id="comletedTasks" value="{{ $completed }}">
                                <input type="hidden" id="totalTasks" value="{{ $total_task }}">
                            </div>
                            <div class="p-2 px-2 font-weight-bold text-black">
                                <h6>{{ $completed }} tasks</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 mr-2 ml-5 progresscontainer rounded">
                        <div class="p-3 me-2 fontsize">Task on progress</div>
                        <div class="container progressbar2">
                            <div class="circular-progress2">
                                <span class="progress-value2"></span>
                                <input type="hidden" id="onProgress" value="{{ $on_progress }}">
                                <input type="hidden" id="totalTasks" value="{{ $total_task }}">
                            </div>
                            <div class="p-2 px-2 font-weight-bold text-black">
                                <h6>{{ $on_progress }} tasks</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 mr-2 ml-5 progresscontainer rounded">
                        <div class="p-3 me-2 fontsize">Pending Tasks</div>
                        <div class="container progressbar3">
                            <div class="circular-progress3">
                                <span class="progress-value3"></span>
                                <input type="hidden" id="pendingTasks" value="{{ $pending_task }}">
                                <input type="hidden" id="totalTasks" value="{{ $total_task }}">
                            </div>
                            <div class="p-3 px-2 font-weight-bold text-black" id="pending">
                                <h6>{{ $pending_task }} tasks</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>

        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
 <!-- jQuery -->
 <script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dashboardNav').addClass('active');
    });

</script>

    @endsection



