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
                    <h1>Edit User Credentials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Update User</li>
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
                            <h3 class="card-title">Edit {{$user->name}}'s' Credentials</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{route('reset.password',$user->id)}}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEmail3">Email</label>
                                    <div class="mb-2">
                                        <input type="email" class="form-control" id="inputEmail3" value="{{$user['email']}}" name="email" required readonly>
                                    </div>
                                    <label for="inputPassword">New Password</label>
                                    <div class="mb-2">
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" required>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            <span>{{$message}}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <label for="password_confirmation">confirm Password</label>
                                    <div class="mb-2">
                                        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a type="button" href="{{route('list.user')}}" class="btn btn-outline-danger">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-info float-right">
                                    <i class="fas fa-user-edit mr-2"></i>
                                    Update</button>
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