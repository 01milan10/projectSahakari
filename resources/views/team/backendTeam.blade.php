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
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{old('name')}}" required autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="name">Designation</label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation" name="designation" value="{{old('designation')}}" required>
                                    @error('designation')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="name">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" name="phone" value="{{old('phone')}}" required>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{old('email')}}" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="name">Representation</label>
                                    <input type="text" class="form-control @error('representation') is-invalid @enderror" placeholder="Representation" name="representation" value="{{old('representation')}}" required>
                                    @error('representation')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="name">Facebook Link</label>
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook Link" name="facebook" value="{{old('facebook')}}">
                                    @error('facebook')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="name">Gmail Link</label>
                                    <input type="text" class="form-control @error('gmail') is-invalid @enderror" placeholder="Gmail Link" name="gmail" value="{{old('gmail')}}">
                                    @error('gmail')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="name">Profile Picture</label>
                                    <input type="file" name="image" class="form-control @error('iamge') is-invalid @enderror" required>
                                    @error('image')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
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
                        <h3 class="card-title">Our team members</h3>
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
</script>
@endsection