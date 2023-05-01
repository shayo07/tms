@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('system-users.update', $user->slug) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Full Name</label>
                            <input id="name" type="text" placeholder="full name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Email Address</label>
                            <input id="email" type="email" placeholder="email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" >
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="{{ $user->role }}">{{ $user->role }}</option>
                                <option value="Super">Super</option>
                                <option value="Admin">Admin</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                    </div>
                </div>


                <!-- input states -->



                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>SuperUser Priviledge</label>
                            <select class="form-control" id="is_super" name="is_super">
                                <option value="{{$user->is_super}}">@if($user->is_super) Yes @else No @endif</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>AdminUser Priviledge</label>
                            <select class="form-control" id="is_admin" name="is_admin">
                                <option value="{{$user->is_admin}}">@if($user->is_admin) Yes @else No @endif</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>StaffUser Priviledge</label>
                            <select class="form-control" id="is_staff" name="is_staff">
                                <option value="{{$user->is_staff}}">@if($user->is_staff) Yes @else No @endif</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> User Status</label>
                            <select class="form-control" id="is_active" name="is_active" >
                                <option value="{{$user->is_active}}">@if($user->is_active) Active @else Non Active @endif</option>
                                <option value="1">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Edit User</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection