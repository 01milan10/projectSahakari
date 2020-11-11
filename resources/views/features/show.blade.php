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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('create.feature')}}">Features</a></li>
                        <li class="breadcrumb-item active">{{$feature->title}}</li>
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
                                {{$feature->title}}
                            </h3>
                        </div>
                        <img class="card-img-top" src="/uploaded_images/services_images/{{$feature->image}}" alt="featureImage" style="max-height:400px;object-fit:cover">
                        <div class="card-body">
                            <div class="card-text">
                                <span>
                                    {{$feature->description}}
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="{{route('delete.feature',['feature'=>$feature->id])}}" class="btn btn-outline-danger">
                                Delete
                            </a>
                            <a type="button" href="{{route('edit.feature',['feature'=>$feature->id])}}" class="btn btn-info float-right">
                                Edit
                            </a>
                        </div>
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
        })
    })
</script>
@endsection