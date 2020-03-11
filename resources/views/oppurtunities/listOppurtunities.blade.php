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
                        <h1>List Opportunity</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List Opportunities</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of current openings.</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="opportunityTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Opening</th>
                                    <th>Position</th>
                                    <th>Seat</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($opportunities as $opportunity)
                                    <tr>
                                        <td>{{$opportunity->opening}}</td>
                                        <td>{{$opportunity->position}}</td>
                                        <td>{{$opportunity->seat}}</td>
                                        <td style="text-align:center">
                                            <div>
                                                <a href="{{route('delete.oppurtunity',['id'=>$opportunity->id])}}">
                                                    <i class="fas fa-user-times ml-3" data-toggle="tooltip" data-placement="top" title="Delete opening" style="color:#dc3545">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Opening</th>
                                    <th>Position</th>
                                    <th>Seat</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection

@section('footer')
    @include('layouts.backend.footer')
@endsection

@section('script')
    <script>
        $(document).ready(()=>{
            $("#opportunityTable").DataTable();
            $('[data-toggle="tooltip"]').tooltip();
        });
        $('#search').on('keyup',function(){

            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                    $('tbody').html(data);
                }
            });
        })
    </script>
@endsection
