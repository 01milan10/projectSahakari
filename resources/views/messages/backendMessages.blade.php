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
                    <h1>Messages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Update Messages</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Add Messages
                            </h3>
                        </div>
                        <form method="post" action="">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="mb-2">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{old('title')}}" required autocomplete="title" autofocus>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror" placeholder="Author Name" name="author" value="{{old('author')}}" required autocomplete="category">
                                    @error('author')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror" placeholder="Author Position" name="position" value="{{old('position')}}" required autocomplete="category">
                                    @error('position')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="message">Message</label>
                                    <textarea class="textarea" name="message"></textarea>
                                    @error('message')
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
                <!-- /.col-->
            </div>
        </div>
        <!-- ./row -->
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
        $('.textarea').summernote({
            placeholder: 'Please write your messages here.',
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
        })
    })
</script>
@endsection