@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Class</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('darasa.update', $darasa->slug)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Class Name</label>
                            <input id="class_name" type="text"  class="form-control @error('class_name') is-invalid @enderror" name="class_name" value="{{ $darasa->class_name}}" >
                            @error('class_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Class Capacity</label>
                            <input id="class_capacity" type="text"  class="form-control @error('class_capacity') is-invalid @enderror" name="class_capacity" value="{{$darasa->class_capacity }}" >
                            @error('class_capacity')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                </div>




                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Class Teacher</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Class Status</label>
                            <select class="form-control" id="is_active" name="is_active" >
                                <option value="{{$darasa->is_active}}">@if($darasa->is_active) Active @else Non Active @endif</option>
                                <option value="0">Active</option>
                                <option value="1">Non Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Edit Class</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection