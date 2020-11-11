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
          <h1>List of current users.</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Current Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Current Users:</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                  <th>Position</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    {{$user->password}}
                    @can('resetPassword',$user)
                    <a class="float-right" href="{{route('show.resetForm',['user'=>$user->id])}}">
                      <i class="fas fa-pen-alt mr-4" data-toggle="tooltip" data-placement="top" title="Change Password">
                      </i>
                    </a>
                    @endcan
                  </td>
                  <td>
                    <div>
                      @can('update',$user)
                      <a href="{{route('show.userUpdateForm',['id'=>$user->id])}}">
                        <i class="fas fa-user-edit mr-3" data-toggle="tooltip" data-placement="top" title="Edit user info">
                        </i>
                      </a>
                      <a href="{{route('delete.user',['user'=>$user->id])}}">
                        <i class="fas fa-user-times ml-3" data-toggle="tooltip" data-placement="top" title="Delete user info" style="color:#dc3545">
                        </i>
                      </a>
                      @endcan
                      @cannot('update',$user)
                      <p class='text-center'>not allowed</p>
                      @endcannot
                    </div>
                  </td>
                  <td>
                    <p class="text-center">---</p>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                  <th>Position</th>
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
<script>
  $(document).ready(() => {
    $("#userTable").DataTable();
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
@endsection