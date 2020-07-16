@extends('layouts.backend.app')

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
                    <h1>Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Contacts</li>
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
                                Update {{$contact->location}}'s branch information</h3>
                        </div>
                        <form action="{{route('update.contacts',['id'=>$contact->id])}}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div>
                                    <label for="location"></label><input type="text" id="location" class="form-control mb-4 @error('title') is-invalid @enderror" value="{{$contact['district']}}" name="location" required autocomplete="location" autofocus>
                                </div>
                                <div>
                                    <label for="address"></label><input type="text" id="address" class="form-control mb-4 @error('title') is-invalid @enderror" value="{{$contact['address']}}" name="address" required autocomplete="address" autofocus>
                                </div>
                                <div>
                                    <label for="phone"></label><input type="number" id="phone" class="form-control mb-4 @error('title') is-invalid @enderror" value="{{$contact->phone}}" name="phone" required autocomplete="phone" autofocus>
                                </div>
                                <div>
                                    <label for="alt_phone"></label><input type="number" id="alt_phone" class="form-control mb-4" value="{{$contact->alt_phone}}" name="alt_phone">
                                </div>
                                <div>
                                    <label for="fax"></label><input type="number" id="fax" class="form-control mb-4" value="{{$contact->fax}}" name="fax">
                                </div>
                                <div>
                                    <label for="email"></label><input type="email" id="email" class="form-control mb-4 @error('title') is-invalid @enderror" value="{{$contact->email}}" name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-pen-alt mr-2"></i>
                                    Update</button>
                                <button class="btn btn-danger float-right" type="reset">
                                    <a class="btn-danger" href="{{route('show.contactForm')}}">
                                        <i class="fas fa-times mr-2"></i>
                                        Cancel
                                    </a>
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
@endsection