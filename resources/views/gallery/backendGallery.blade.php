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
                    <h1>Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
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
                                Add Image</h3>
                        </div>
                        <form action="{{ route('image.upload') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="mb-4">
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{old('title')}}" required autocomplete="title" autofocus>
                                    @error('title')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input type="text" id="category" class="form-control @error('category') is-invalid @enderror" placeholder="Category" name="category" value="{{old('category')}}" required autocomplete="category">
                                    @error('category')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input type="file" id="file" name="image[]" class="form-control @error('image') is-invalid @enderror" placeholder="Select an image to upload." required autocomplete="file" multiple>
                                    @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
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
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <div class="card-body">
                        <table id="imageTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>File Name</th>
                                    <th>Action</th>
                                    <th>Posted Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($images as $image)
                                <tr>
                                    <td>{{$image->id}}</td>
                                    <td>{{$image->title}}</td>
                                    <td>{{$image->category}}</td>
                                    <td>{{$image->image}}</td>
                                    <td style="text-align:center">
                                        <div>
                                            <a href="{{route('image.delete',['id'=>$image->id])}}" data-toggle="tooltip" data-title="Delete" data-placement="top">
                                                <i class="fas fa-trash ml-3" style="color:#dc3545">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$image->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Category</th>
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#imageTable").dataTable();
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
@endsection