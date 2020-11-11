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
                    <h1>Oppurtunities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Oppurtunities</li>
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
                                Open Position For:
                            </h3>
                        </div>
                        <form method="get" action="{{route('add.oppurtunities')}}">
                            {{csrf_field()}}
                            <div class="card-body pad">
                                <div>
                                    <label for="title">Job type</label>
                                    <select id="title" name="opening" class="form-control mb-2">
                                        <option value="Job Vacancy">Job Vacancy</option>
                                        <option value="Internship">Internship</option>
                                    </select>

                                </div>
                                <div>
                                    <label for="position">Position</label>
                                    <input type="text" id="position" class="form-control mb-2 @error('category') is-invalid @enderror" value="{{old('position')}}" placeholder="Position" name="position" required autocomplete="category">
                                    @error('category')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="seat">Available seats</label>
                                    <input id="seat" type="number" class="form-control mb-2 @error('seat') is-invalid @enderror" value="{{old('seat')}}" placeholder="Seats Available" name="seat" required>
                                    @error('seat')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="requirement">Requirements</label>
                                    <textarea id="requirement" class="textarea" name="requirement"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a type="button" href="{{route('list.oppurtunities')}}" class="btn btn-outline-danger">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </a>
                                <button class="btn btn-info float-right" type="submit">
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
<script src="{{asset('js/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('.textarea').summernote({
            placeholder: 'Please write requirements for the position messages here.',
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