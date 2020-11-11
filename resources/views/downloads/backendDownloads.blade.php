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
                    <h1>Downloadables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Downloadables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class='col-md-10'>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Add Downloadables</h3>
                        </div>
                        <form action="{{route('upload.downloadables')}}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div>
                                    <label for="title">Title</label>
                                    <input type="text" id="title" class="form-control mb-4 @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{old('title')}}" required autocomplete="title" autofocus>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="file">Select File</label>
                                    <input type="file" id="file" name="file" class="form-control mb-4 @error('file') is-invalid @enderror" placeholder="Select a file to upload." required autocomplete="file">
                                    @error('file')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-upload mr-2"></i>
                                    Upload</button>
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
                        <h3 class="card-title">List of downloadables.</h3>
                    </div>
                    <div class="card-body">
                        <table id="downloadablesTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>File Name</th>
                                    <th>Action</th>
                                    <th>Posted Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($downloads as $download)
                                <tr>
                                    <td>{{$download->id}}</td>
                                    <td>{{$download->title}}</td>
                                    <td>{{$download->file}}</td>
                                    <td style="text-align:center">
                                        <div>
                                            <a href="{{route('download.downloadables',['id'=>$download->id])}}">
                                                <i class="fas fa-download mr-3" data-toggle="tooltip" data-placement="top" title="Download">
                                                </i>
                                            </a>
                                            <a href="{{route('delete.downloadables',['id'=>$download->id])}}">
                                                <i class="fas fa-trash ml-3" data-toggle="tooltip" data-placement="top" title="Delete" style="color:#dc3545">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$download->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>File Name</th>
                                    <th>Action</th>
                                    <th>Posted Date</th>
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
<script>
    jQuery(document).ready(() => {
        jQuery("#downloadablesTable").DataTable();
        jQuery('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection