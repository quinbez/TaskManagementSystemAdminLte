@extends('layouts.indexAdminlte')
    @section('content')

    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h5 class="mb-2">Dashboard</h5>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
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

                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
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
                        <div class="col-md-3 col-sm-6 col-12">
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
                        <div class="col-md-3 col-sm-6 col-12">
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
                        <div class="col-md-3 col-sm-6 col-12">
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
            </section>
        </div>
    </div>
    @endsection



