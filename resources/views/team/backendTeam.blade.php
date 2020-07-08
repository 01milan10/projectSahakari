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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Add Team Member</h3>
                        </div>
                        <form action="{{ route('add.team') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div>
                                    <input type="text" class="form-control mb-4 " placeholder="Name" name="name" required autofocus>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Designation" name="designation" required>
                                </div>
                                <div>
                                    <input type="number" class="form-control mb-4" placeholder="Phone Number" name="phone" required>
                                </div>
                                <div>
                                    <input type="email" class="form-control mb-4" placeholder="Email" name="email" required>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Representation" name="representation" required>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Facebook Link" name="facebook">
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Gmail Link" name="gmail">
                                </div>

                                <div>
                                    <input type="file" name="image" class="form-control mb-4" required>
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
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <div class="card-body">
                        <table id="imageTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Representation</th>
                                    <th>Profile Picture</th>
                                    <th>Facebook</th>
                                    <th>Gmail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $datum)
                                <tr>
                                    <td>{{$datum->name}}</td>
                                    <td>{{$datum->designation}}</td>
                                    <td>{{$datum->phone}}</td>
                                    <td>{{$datum->email}}</td>
                                    <td>{{$datum->representation}}</td>
                                    <td>{{$datum->image}}</td>
                                    <td>{{$datum->facebook}}</td>
                                    <td>{{$datum->gmail}}</td>
                                    <td align="center">
                                        <a href="{{route('show.updateForm',$datum->id)}}" data-toggle="tooltip" data-placement="top" title="Update">
                                            <i class="fa fa-redo-alt mr-3"></i>
                                        </a>
                                        <a href="{{route('delete.team',$datum->id)}}" data-toggle="tooltip" data-placement="top" title="Delete" style="color:#dc3545">
                                            <i class="fa fa-user-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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

        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection