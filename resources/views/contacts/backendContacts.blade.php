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
                    <h1>Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Contacts</li>
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
                                Add Contacts</h3>
                        </div>
                        <form action="{{route('add.contacts')}}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="mb-2">
                                    <label for="location">District</label>
                                    <input type="text" id="location" class="form-control @error('title') is-invalid @enderror" placeholder="District" name="location" value="{{old('location')}}" minlength="4" required autofocus>
                                    @error('location')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div class="mb-2">
                                <div>
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control @error('title') is-invalid @enderror" placeholder="Address" name="address" value="{{old('address')}}" minlength="4" required autofocus>
                                    @error('address')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone" class="form-control @error('title') is-invalid @enderror" placeholder="Telephone Number" name="phone" value="{{old('phone')}}" required autofocus>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="alt_phone">Alternate Phone</label>
                                    <input type="number" id="alt_phone" class="form-control" placeholder="Alternative Telephone" name="alt_phone" value="{{old('alt_phone')}}">
                                    @error('alt_phone')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="fax">Fax</label>
                                    <input type="number" id="fax" class="form-control" placeholder="Fax Number" name="fax" value="{{old('fax')}}">
                                    @error('fax')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control @error('title') is-invalid @enderror" placeholder="Email" name="email" required autocomplete="email" value="{{old('email')}}" autofocus>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        <span>{{$message}}</span>
                                    </div>
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
                        <h3 class="card-title">List of contacts.</h3>
                    </div>
                    <div class="card-body">
                        <table id="contactsTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>District</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Alternate Line</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->district}}</td>
                                    <td>{{$contact->address}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->alt_phone}}</td>
                                    <td>{{$contact->fax}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td style="text-align:center">
                                        <div>
                                            <a href="{{route('update.contacts',$contact->id)}}">
                                                <i class="fas fa-pen-alt mr-3" data-toggle="tooltip" data-placement="top" title="update">
                                                </i>
                                            </a>
                                            <a href="{{route('delete.contacts',$contact->id)}}">
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
                                    <th>District</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Alternate Line</th>
                                    <th>Fax</th>
                                    <th>Email</th>
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
<script>
    jQuery(document).ready(() => {
        $("#contactsTable").DataTable();
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection