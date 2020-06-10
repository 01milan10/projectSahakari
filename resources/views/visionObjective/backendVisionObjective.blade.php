@extends("layouts.backend.app")

@section('header')
    @include('layouts.backend.header')
@endsection

@section('sidebar')
    @include('layouts.backend.sidebar')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <i class="fa fa-users"></i>
                            Our Vision and Objectives
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                            <li class="breadcrumb-item active">Our Vision and Objectives</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class='col-md-10'>
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add Team Member</h3>
                            </div>
                            <form action="{{ route('add.team') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body" id="card-body">
                                    <div>
                                        <input type="text" class="form-control mb-4 " placeholder="Our Vision" name="name" required autofocus>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control mb-4" placeholder="Core Mission" name="coreMission" required>
                                    </div>
                                    <div id="mission">
                                        <div class="form-group row" id="missionHead">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mb-1" placeholder="Mission Heading" name="missionHeading" required>
                                            </div>
                                            <div class="col-sm-1">
                                                <div id="add-new-head" class="btn btn-outline-primary">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div id="remove-new-head" class="btn btn-outline-danger">
                                                    <i class="fa fa-minus"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row" id="subMission">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mb-1" placeholder="Sub-mission" name="subMission[]" required>
                                            </div>
                                            <div class="col-sm-1">
                                                <div id="add-new-obj" class="btn btn-outline-primary">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div id="remove-new-obj" class="btn btn-outline-danger">
                                                    <i class="fa fa-minus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fas fa-plus mr-2"></i>
                                        Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('layouts.backend.footer')
@endsection

@section('script')
    <script type="text/javascript">
        $('[data-toggle="tooltip"]').tooltip();
        $(document).ready(function(){
            $("#imageTable").dataTable();
        });
        $(function () {
            let counter=1;
            $("#add-new-obj").click(function () {
                if(counter<12) {
                    $("#subMission").first().val('').clone(true).appendTo($("#mission"));
                    counter++;
                }
            });
            $("#remove-new-obj").click(function () {
                if(counter!=1){
                    $(this).closest("#subMission").remove();
                    counter--;
                }
            });
        })
        $(function () {
            let counter=1;
            $("#add-new-head").click(function () {
                if(counter<5) {
                    $("#mission").val('').clone(true).appendTo($("#card-body"));
                    counter++;
                }
            });
            $("#remove-new-head").click(function () {
                if(counter!=1){
                    $(this).closest("#mission").remove();
                    counter--;
                }
            });
        })
    </script>
@endsection
