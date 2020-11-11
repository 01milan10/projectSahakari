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
                    <h1>{{$feature->title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('create.feature')}}">Features</a></li>
                        <li class="breadcrumb-item">{{$feature->title}}</li>
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
                            <h3 class="card-title">{{$feature->title}}</h3>
                        </div>
                        <form action="{{route('update.feature',['feature'=>$feature->id])}}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div>
                                    <label for="title">Feature's Title</label>
                                    <input type="text" id="title" class="form-control mb-4 @error('title') is-invalid @enderror" value="{{$feature->title}}" name="title" required autofocus>
                                    @error('title')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="image">Feature's Image</label>
                                    <input type="file" id="image" class="form-control mb-4 @error('image') is-invalid @enderror" placeholder="Feature's Image" name="image" autofocus>
                                    @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="description">Feature's Description</label>
                                    <textarea id="description" class="form-control mb-4" name="description" value="{{$feature->description}}" required autofocus></textarea>
                                    @error('description')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit">
                                    Save changes</button>
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

@section('script')
<script src="{{asset('js/summernote/summernote-bs4.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('#featuresTable').DataTable();
        $("[data-toggle='tooltip']").tooltip();
        $('#description').summernote({
            tabSize: 3,
            height: 350,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        $('#description').summernote('code', $('#description').attr('value'))
    })
</script>
@endsection