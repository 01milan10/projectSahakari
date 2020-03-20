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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-keyboard"></i>
                                    Add report to database.
                                </h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="{{ route('add.report') }}">
                                    {{csrf_field()}}
                                    <div class="card-body">
                                        <table id="reportTable" class="table table-borderless">
                                            <thead>
                                            <th>Client Name</th>
                                            <th>Client Email</th>
                                            <th>Deposited Amount</th>
                                            <th>Withdraw Amount</th>
                                            <th>Collected By</th>
                                            <th>Collection Date</th>
                                            </thead>
                                            <tbody id="reportTabBody">
                                            <tr id="row">
                                                <td>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="client_name" required placeholder="Client Name" name="name[]">
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" id="client_email" required placeholder="Client Email" name="email[]">
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" id="deposit" required placeholder="Deposited Amount" name="deposit[]">
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" id="withdraw" required placeholder="Withdrawn Amount" name="withdraw[]">
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="collector" required placeholder="Collector's Name" name="cName[]">
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row" id="last_child">
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="date" required name="collected_date[]">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div id="add-new-row" class="btn btn-outline-primary">
                                                                <i class="fa fa-plus"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div id="remove-new-row" class="btn btn-outline-danger">
                                                                <i class="fa fa-minus"></i>
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
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-list-alt"></i>
                                    Today's Collection
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="collectorTable">
                                    <thead>
                                    <th>Collector Name</th>
                                    <th>Collected</th>
                                    <th>Client Name</th>
                                    <th>Collected Date</th>
                                    </thead>
                                    <tbody>
                                    @foreach($balances as $balance)
                                        <tr>
                                            <td>{{$balance["collected_by"]}}</td>
                                            <td>{{$balance["deposited_amount"]}}</td>
                                            <td>{{$balance["client_name"]}}</td>
                                            <td>{{$balance["collected_date"]}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="btn btn-outline-primary float-right ml-4" id="downloadCSV" data-toggle="tooltip" data-placement="top" title="Download report in .CSV">
                                    <i class="fas fa-file-csv"></i>
                                </div>
                                <div class="btn btn-outline-primary float-right" id="downloadPDF" data-toggle="tooltip" data-placement="top" title="Download report in .PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                            </div>
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
        $('#collectorTable').DataTable();
        $('[data-toggle="tooltip"]').tooltip();
        $("#downloadCSV").click(function () {
            let query = {
                'data':$('.dataTables_filter input').val(),
                'format':'.csv',
            };
            let url = "{{URL::to('/download')}}?" + $.param(query)
            window.location = url;
        });
        $("#downloadPDF").click(function () {
            let query = {
                'data':$('.dataTables_filter input').val(),
                'format':'.pdf',
            };
            let url = "{{URL::to('/download')}}?" + $.param(query)
            window.location = url;
        });
        $(function () {
            let counter=1;
            $("#add-new-row").click(function () {
                if(counter<12) {
                    $("#row").first().val('').clone(true).appendTo($("#reportTable"));
                    counter++;
                }
            });
            $("#remove-new-row").click(function () {
                if(counter!=1){
                    $(this).closest("#row").remove();
                    counter--
                }
            });
        })

    </script>
@endsection

