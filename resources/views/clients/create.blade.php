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
                    <h1>Clients</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Client</li>
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
                                Add Client</h3>
                        </div>
                        <form action="{{route('store.client')}}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div>
                                    <label for="name">Client's Name</label>
                                    <input type="text" id="name" class="form-control mb-4 @error('name') is-invalid @enderror " value="{{old('name')}}" placeholder="Feature's Title" name="name" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="logo">Client's Logo</label>
                                    <input type="file" id="logo" class="form-control mb-4 @error('logo') is-invalid @enderror" value="{{old('logo')}}" placeholder="Client's Logo" name="logo" required autofocus>
                                    @error('logo')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="link">Client's Link</label>
                                    <input id="link" class="form-control mb-4 @error('link') is-invalid @enderror" value="{{old('link')}}" name="link" autofocus>
                                    @error('link')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
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
                        <h3 class="card-title">List of clients.</h3>
                    </div>
                    <div class="card-body">
                        <table id="clientsTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Client's Name</th>
                                    <th>Logo</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->logo}}</td>
                                    <td>{{$client->link}}</td>
                                    <td style=" text-align:center">
                                        <div>
                                            <a href="{{route('edit.client',['client'=>$client->id])}}">
                                                <i class="fas fa-pen-alt mr-3" data-toggle="tooltip" data-placement="top" title="edit">
                                                </i>
                                            </a>
                                            <a href="{{route('delete.client',['client'=>$client->id])}}">
                                                <i class="fas fa-trash ml-3" data-toggle="tooltip" data-placement="top" title="delete" style="color:#dc3545">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Client's Name</th>
                                    <th>Logo</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
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
<script src="{{asset('js/summernote/summernote-bs4.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('#clientsTable').DataTable();
        $("[data-toggle='tooltip']").tooltip();
    })
</script>
@endsection