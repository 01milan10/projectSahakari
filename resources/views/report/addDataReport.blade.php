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
            <div class="container col-lg-12">
                <div class="row justify-content-center">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add report to database.</h3>
                        </div>
                        <div class="card-footer">
                            <form class="form-horizontal" method="POST" action="{{ route('add.report') }}">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <table id="reportTable" class="table talign-center">
                                        <thead>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Deposited Amount</th>
                                        <th>Withdraw Amount</th>
                                        <th>Collected By</th>
                                        <th>Collection Date</th>
                                        </thead>
                                        <tbody>
                                        <tr id="row">
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="client_name" placeholder="Client Name" name="name">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="email" class="form-control" id="client_email" placeholder="Client Email" name="email">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="deposit" placeholder="Deposited Amount" name="deposit">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="deposit" placeholder="Withdrawn Amount" name="withdraw">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="collector" placeholder="Collector's Name" name="cName">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="date" name="collected_date">
                                                    </div>
                                                    <div class="col-sm-2" data-toggle="tooltip" data-placement="top" title="Add new row">
                                                        <div id="add-new-row" class="btn btn-outline-primary">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add
                                </button>
                                <button type="reset" class="btn btn-danger float-right">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </button>
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
    <script>
        $('[data-toggle="tooltip"]').tooltip();

        $("#add-new-row").click(function () {
            $("#row").clone().val("").prependTo($("#reportTable"));
        })
    </script>
@endsection

