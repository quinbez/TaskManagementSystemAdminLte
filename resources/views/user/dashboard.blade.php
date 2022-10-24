@extends('user.index')

@section('content')
<form action="{{ route('userdashboard') }}" method="post">
{{ csrf_field()}}
<div class="textcolor">
    <div class="container overflow-hidden px-4">
        @if(\Session::has('success'))
        <div class="alert alert-<?php echo 'success'; ?>" role= "alert" id="artMsg">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden='true'>&times;</span>
            <span class ="sr-only">Close</span>
        </button>
        {!!\Session::get('success')!!}
    </div>
    @endif
    @if(\Session::has('error'))
        <div class="alert alert-<?php echo 'danger'; ?>" role= 'alert' id='artMsg'>
        <button type='button' class='close' data-bs-dismiss='alert'>
            <span aria-hidden='true'>&times;</span>
            <span class ='sr-only'>Close</span>
        </button>{!! \Session::get('error') !!}
    </div>
    @endif

        <div class="container row gy-5 usercolstyle colpadding">
            <div class="col-4 usercontainerstyle bg-light rounded">
                <div class="col-4 bgcolor"><span class="fas fa-user icons px-3 py-3" id="icon1"></span></div>
                <div class="col-9"> Total Projects</div>
                <div class="p-3 px-2 font-weight-bold text-black">
                    <h6>{{$total_project}} added</h6>
                </div>
            </div>
        {{-- flex-wrap --}}
            <div class="col-4 usercontainerstyle bg-light rounded">
                <div class="col-4 bgcolor"><span class="fas fa-tasks icons px-3 py-3" id="icon3"></span></div>
                <div class="col-9">Total Tasks</div>
                <div class="p-3 px-2 font-weight-bold text-black">
                    <h6>{{$total_tasks}} added</h6>
                </div>
            </div>

        
        {{-- <div class="container row gy-5 usercolstyle colpadding"> --}}
            <div class="col-4 usercontainerstyle bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-battery-half icons px-3 py-3" id="icon7"></span></div>
                <div class="col-9">Pending Tasks</div>
                <div class="p-3 px-2 font-weight-bold text-black" id="pending_task">
                    <h6>{{$pending_task}} tasks</h6>
                </div>
            </div>
            <div class="col-4 usercontainerstyle2 bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-battery-empty icons px-3 py-3" id="icon6"></span></div>
                <div class="col-9">Task on progress</div>
                <div class="p-3 px-2 font-weight-bold text-black" id="task_on_progress">

                    <h6>{{$on_progress}} tasks</h6>


                </div>
            </div>
            <div class="col-4 usercontainerstyle2 me-2 bg-light rounded">
                <div class="col-3 bgcolor"><span class="fas fa-battery-full icons px-3 py-3" id="icon8"></span></div>
                <div class="col-9">Completed Tasks</div>
                <div class="p-3 px-2 font-weight-bold text-black" id="completed_task">

                    <h6>{{$completed}} tasks</h6>


                </div>
            </div>
        {{-- </div> --}}
    </div>
    <div class="container overflow-hidden px-4 py-3">
        <div class="container row gy-5 colespace colpadding">
            <div class="col-3 progresscontainer bg-light rounded">
                <div class="p-3 me-2 fontsize">Completed Tasks</div>
                <div class="container progressbar1">
                    <div class="circular-progress1">
                        <span class="progress-value1"></span>
                        <input type="hidden" id="comletedTasks" value="{{$completed}}">
                        <input type="hidden" id="totalTasks" value="{{$total_tasks}}">
                    </div>
                    <div class="p-3 px-2 font-weight-bold text-black" id="completed">

                        <h6>{{$completed}} tasks</h6>

                    </div>
                </div>
            </div>
            <div class="col-3 progresscontainer bg-light rounded">
                <div class="p-3 me-2 fontsize">Task on progress</div>
                <div class="container progressbar2">
                    <div class="circular-progress2">
                        <span class="progress-value2"></span>
                        <input type="hidden" id="onProgress" value="{{$on_progress}}">
                        <input type="hidden" id="totalTasks" value="{{$total_tasks}}">
                    </div>
                    <div class="p-3 px-2 font-weight-bold text-black" id="on_progress">


                    <h6>{{$on_progress}} tasks</h6>

                    </div>
                </div>
            </div>
            <div class="col-3 progresscontainer bg-light rounded">
                <div class="p-3 me-2 fontsize">Pending Tasks</div>
                <div class="container progressbar3">
                    <div class="circular-progress3">
                        <span class="progress-value3"></span>
                        <input type="hidden" id="pendingTasks" value="{{$pending_task}}">
                        <input type="hidden" id="totalTasks" value="{{$total_tasks}}">
                    </div>
                    <div class="p-3 px-2 font-weight-bold text-black" id="pending">

                        <h6>{{$pending_task}} tasks</h6>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/userScript.js') }}"></script>
@endsection
