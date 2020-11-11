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
                        Edit member {{$data->name}}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$data->name}}</li>
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
                        <form action="{{ route('update.team',$data['id']) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div>
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control mb-4 " value="{{$data['name']}}" name="name" required autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control mb-4" value="{{$data['designation']}}" name="designation" required>
                                    @error('designation')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control mb-4" value="{{$data['phone']}}" name="phone" required>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control mb-4" value="{{$data['email']}}" name="email" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="representation">Representation</label>
                                    <input type="text" class="form-control mb-4" value="{{$data['representation']}}" name="representation" required>
                                    @error('representation')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="facebook">Facebook Link</label>
                                    <input type="text" class="form-control mb-4" value="{{$data['facebook']}}" placeholder="Facebook link" name="facebook">
                                    @error('facebook')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="gmail">Gmail</label>
                                    <input type="text" class="form-control mb-4" value="{{$data['gmail']}}" placeholder="Gmail link" name="gmail">
                                    @error('gmail')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="image">Profile Picture</label>
                                    <input type="file" name="image" class="form-control mb-4">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a type="button" href="{{route('show.teamForm')}}" class="btn btn-outline-danger">Cancel</a>
                                <button class="btn btn-info float-right" type="submit">
                                    Save Changes
                                </button>
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

        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection