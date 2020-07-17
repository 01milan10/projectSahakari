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
                                    <select id="title" name="opening" class="form-control mb-2">
                                        <option value="Job Vacancy">Job Vacancy</option>
                                        <option value="Internship">Internship</option>
                                    </select>

                                </div>
                                <div>
                                    <input type="text" class="form-control mb-2 @error('category') is-invalid @enderror" placeholder="Position" name="position" required autocomplete="category">
                                </div>
                                <div>
                                    <input type="number" class="form-control mb-2 @error('category') is-invalid @enderror" placeholder="Seats Available" name="seat" required autocomplete="category">
                                </div>
                                <div class="mb-3">
                                    <textarea class="textarea" name="requirement"></textarea>
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
<script src="{{asset('js/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $('.textarea').summernote({
            placeholder: 'Please write requirements for the position messages here.',
            tabSize: 3,
            height: 350,
        })
    })
</script>
@endsection