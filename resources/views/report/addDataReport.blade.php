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
                        <h1>Report Entry</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Report Entry</li>
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
                                <h3 class="card-title">Add report to database.</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST" action="{{ route('add.report') }}">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="client_name" class="col-sm-2 col-form-label">Client Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="client_name" placeholder="Client Name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="client_email" class="col-sm-2 col-form-label">Client Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="client_name" placeholder="Client Email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deposit" class="col-sm-2 col-form-label">Deposited Amount</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="deposit" placeholder="Deposited Amount" name="deposit">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="collector" class="col-sm-2 col-form-label">Collected By</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="collector" placeholder="Collector's Name" name="cName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label">Collected Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="date" name="cName">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-plus mr-2"></i>
                                        Add</button>
                                    <button type="reset" class="btn btn-danger float-right">
                                        <i class="fas fa-times mr-2"></i>
                                        Cancel</button>
                                </div>
                                <!-- /.card-footer -->
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
