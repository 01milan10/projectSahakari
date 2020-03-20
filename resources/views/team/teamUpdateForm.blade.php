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
                            Our Team
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                            <li class="breadcrumb-item active">Our Team</li>
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
                            <form action="{{ route('update.team',$data['id']) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div>
                                        <input type="text" class="form-control mb-4 " value="{{$data['name']}}" name="name" required autofocus>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control mb-4" value="{{$data['designation']}}" name="designation" required>
                                    </div>
                                    <div>
                                        <div>
                                            <input type="number" class="form-control mb-4" value="{{$data['phone']}}" name="phone" required>
                                        </div>
                                        <div>
                                            <div>
                                                <input type="email" class="form-control mb-4" value="{{$data['email']}}" name="email" required>
                                            </div>
                                            <div>
                                                <input type="text" class="form-control mb-4" value="{{$data['representation']}}" name="representation" required>
                                            </div>
                                            <div>
                                                <input type="file" name="image" class="form-control mb-4" required>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-info" type="submit">
                                                <i class="fas fa-upload"></i>
                                                Update</button>
                                        </div>
                                    </div>
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

            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
    </script>
@endsection

