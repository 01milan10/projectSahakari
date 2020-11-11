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
                    <h1>Edit Client {{$client->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$client->name}}</li>
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
                            <h3 class="card-title">{{$client->name}}</h3>
                        </div>
                        <form action="{{route('update.client',$client->id)}}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div>
                                    <label for="name">Client's Name</label>
                                    <input type="text" id="name" class="form-control mb-4 @error('name') is-invalid @enderror " value="{{$client->name}}" name="name" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="image">Client's Logo</label>
                                    <input type="file" id="image" class="form-control mb-4 @error('image') is-invalid @enderror" name="image" autofocus>
                                    @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="link">Client's Link</label>
                                    <input id="link" class="form-control mb-4 @error('link') is-invalid @enderror" name="link" value="{{$client->link}}" autofocus>
                                    @error('link')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a type="button" class="btn btn-outline-danger" href="/clients/create">Cancel</a>
                                <button class="btn btn-info float-right" type="submit">Save Changes</button>
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
@endsection