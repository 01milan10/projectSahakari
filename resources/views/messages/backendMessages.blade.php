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
                            <div class="card-body pad">
                                <div>
                                    <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" placeholder="Title" name="title" required autocomplete="title" autofocus>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4 @error('category') is-invalid @enderror" placeholder="Author Name" name="author" required autocomplete="category">
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4 @error('category') is-invalid @enderror" placeholder="Author Position" name="position" required autocomplete="category">
                                </div>
                                <div class="mb-3">
                                    <textarea class="textarea" name="message"></textarea>
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
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('.textarea').summernote({
            placeholder: 'Please write your messages here.',
            tabSize: 3,
            height: 350,
        })
    })
</script>
@endsection