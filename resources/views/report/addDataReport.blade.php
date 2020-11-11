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
                    <div class="card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-keyboard"></i>
                                Add report to database.
                            </h3>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('add.report') }}">
                            <div class="card-body">
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
                                                        <input type="text" class="form-control @error('name.*') is-invalid @enderror" id="client_name" value="{{old('name.*')}}" required placeholder="Client Name" name="name[]" minlength="3">
                                                        @error('name.*')
                                                        <div class="invalid-feedback">
                                                            {{ $message}}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <input type="email" class="form-control @error('email.*') is-invalid @enderror" id="client_email" value="{{old('email.*')}}" required placeholder="Client Email" name="email[]">
                                                        @error('email.*')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <input type="number" class="form-control @error('deposit.*') is-invalid @enderror" id="deposit" value="{{old('deposit.*')}}" required placeholder="Deposited Amount" name="deposit[]">
                                                        @error('deposit.*')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <input type="number" class="form-control @error('withdraw.*') is-invalid @enderror" id="withdraw" value="{{old('withdraw.*')}}" required placeholder="Withdrawn Amount" name="withdraw[]">
                                                        @error('withdraw.*')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <input type="text" class="form-control @error('cName.*') is-invalid @enderror" id="collector" value="{{old('cName.*')}}" required placeholder="Collector's Name" name="cName[]">
                                                        @error('cName.*')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control @error('collected_date') is-invalid @enderror" id="date" value="{{old('date.*')}}" required name="collected_date[]">
                                                            @error('collected_date')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
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


                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-outline-danger">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-info float-right">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <div class="col-12">
                <div class="card">
                    <div class="card-info">
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
    $("#downloadCSV").click(function() {
        let query = {
            'data': $('.dataTables_filter input').val(),
            'format': '.csv',
        };
        let url = "{{URL::to('/download')}}?" + $.param(query)
        console.log(url);
        window.location = url;
    });
    $("#downloadPDF").click(function() {
        let query = {
            'data': $('.dataTables_filter input').val(),
            'format': '.pdf',
        };
        let url = "{{URL::to('/download')}}?" + $.param(query)
        window.location = url;
    });
    $(function() {
        let counter = 1;
        $("#add-new-row").click(() => {
            if (counter < 10) {
                $("#row").first().clone(true).appendTo($("#reportTabBody")).addClass(`newRow${counter}`);
                const newClientName = $(`.newRow${counter} #client_name`).val('');
                const newClientEmail = $(`.newRow${counter} #client_email`).val('');
                const deposit = $(`.newRow${counter} #deposit`).val('');
                const withdraw = $(`.newRow${counter} #withdraw`).val('');
                const collector = $(`.newRow${counter} #collector`).val('');
                const date = $(`.newRow${counter} #date`).val('');
                counter++;
            }
        });
        $("#remove-new-row").click(function() {
            if (counter != 1) {
                $(this).closest("#row").remove();
                counter--;
            }
        });
    })
</script>
@endsection