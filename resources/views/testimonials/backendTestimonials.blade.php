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
                    <h1>Client's Comment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonials</li>
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
                                Add Comments:
                            </h3>
                        </div>
                        <form method="Post" action="{{route('add.comment')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div>
                                    <input type="text" class="form-control mb-4 " placeholder="Name" name="name" required autofocus>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Designation" name="designation" required>
                                </div>
                                <div>
                                    <input type="email" class="form-control mb-4" placeholder="Email" name="email" required>
                                </div>
                                <div>
                                    <input type="file" name="image" class="form-control mb-4" required>
                                </div>
                                <div>
                                    <textarea class="form-control mb-4 textarea" name="comment" required></textarea>
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
                <!-- /.col-->
            </div>
        </div>
        <!-- ./row -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">List of comments.</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="commentTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->designation}}</td>
                                    <td>{{$comment->email}}</td>
                                    <td>{{$comment->image}}</td>
                                    <td style="text-align:center">
                                        <div>
                                            <a href="{{route('delete.comment',['id'=>$comment->id])}}">
                                                <i class="fas fa-trash  ml-3" data-toggle="tooltip" data-placement="top" title="Delete" style="color:#dc3545">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
@endsection

@section('footer')
@include('layouts.backend.footer')
@endsection
@section('script')
<script src="{{asset('js/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
    $('#commentTable').DataTable();
    $('[data-toggle=tooltip]').tooltip();
    $(function() {
        $('.textarea').summernote({
            placeholder: 'Please write comments here.',
            tabSize: 3,
            height: 340,
        })
    })
</script>
@endsection