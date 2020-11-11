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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Our Mission</h3>
                        </div>
                        <form action="{{ route('add.vision') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            @csrf()
                            <div class="card-body" id="card-body">
                                <div class="mb-2">
                                    <label for="coreVision">Our Core Vision</label>
                                    <input type="text" class="form-control" placeholder="Our Vision" name="coreVision" value="{{old('coreVision')}}" required autofocus>
                                </div>
                                <div class="mb-2">
                                    <label for="coreMission">Our Core Mission</label>
                                    <input type="text" class="form-control" placeholder="Core Mission" name="coreMission" value="{{old('coreMission')}}" required>
                                </div>
                                <div id="mission">
                                    <div class="mb-2">
                                        <label for="missionHead">Mission Heading</label>
                                        <input type="text" class="form-control" id="mission" placeholder="Mission Heading" name="missionHead" value="{{old('missionHead')}}" required>
                                    </div>

                                    <div class="form-group row" id="subMission">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="sub-mission" placeholder="Sub-mission" name="subMission[]" required>
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
    $(document).ready(function() {
        $("#imageTable").dataTable();
    });
    $(function() {
        let counter = 1;
        $("#add-new-obj").click(function() {
            if (counter < 5) {
                console.log(counter)
                $("#subMission").clone(true).appendTo($("#mission")).addClass(`newSubmission${counter}`);
                $(`.newSubmission${counter} #sub-mission`).val('')
                counter++;
            }
        });
        $("#remove-new-obj").click(function() {
            if (counter != 1) {
                counter--;
                $(this).closest("#subMission").remove();
            }
            if (counter == 1) {
                $('#subMission').removeClass('newSubmission1 newSubmission2 newSubmission3 newSubmission4');
            }
        });
    })
</script>
@endsection