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
                    <h1>Features</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Features</li>
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
                                Add Features</h3>
                        </div>
                        <form action="/features" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div>
                                    <label for="title">Feature's Title</label>
                                    <input type="text" id="title" class="form-control mb-4 @error('title') is-invalid @enderror " value="{{old('title')}}" placeholder="Feature's Title" name="title" required autofocus>
                                    @error('title')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="image">Feature's Image</label>
                                    <input type="file" id="image" class="form-control mb-4 @error('image') is-invalid @enderror" placeholder="Feature's Image" name="image" required autofocus>
                                    @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="description">Feature's Description</label>
                                    <textarea id="description" class="form-control mb-4 @error('description') is-invalid @enderror" name="description" required autofocus></textarea>
                                    @error('description')
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
                        <h3 class="card-title">List of features.</h3>
                    </div>
                    <div class="card-body">
                        <table id="featuresTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($features as $feature)
                                <tr>
                                    <td>{{$feature->title}}</td>
                                    <td>
                                        <span>{{Str::limit($feature->description,130)}}</span>
                                        <a href="{{route('show.feature',['feature'=>$feature->id])}}">
                                            <i class="far fa-eye mr-3 float-right" data-toggle="tooltip" data-placement="top" title="view feature">
                                            </i>
                                        </a>
                                    </td>
                                    <td>{{$feature->image}}</td>
                                    <td style=" text-align:center">
                                        <div>
                                            <a href="{{route('edit.feature',['feature'=>$feature->id])}}">
                                                <i class="fas fa-pen-alt mr-3" data-toggle="tooltip" data-placement="top" title="edit">
                                                </i>
                                            </a>
                                            <a href="{{route('delete.feature',['feature'=>$feature->id])}}">
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
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
        $('#featuresTable').DataTable();
        $("[data-toggle='tooltip']").tooltip();
        $('#description').summernote({
            placeholder: "Please write feature's description.",
            tabSize: 3,
            height: 120,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        })
    })
</script>
@endsection