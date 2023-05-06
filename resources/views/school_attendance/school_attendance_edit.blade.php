@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add School Attendance</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('school_attendance.update', $school_attendance->slug )}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Attendance name</label>
                            <input id="attendance_name" type="text"  class="form-control @error('attendance_name') is-invalid @enderror" name="attendance_name" value="{{ $school_attendance->attendance_name }}" >
                            @error('attendance_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Term</label>
                            <select class="form-control" id="term_id" name="term_id" >
                                <option value="{{$school_attendance->term_id}}">{{$school_attendance->term->term_name}}</option>
                                @foreach($term as $term)
                                    <option value="{{$term->id}}">{{$term->term_name}}</option>
                                @endforeach
                            </select>
                            @error('term_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>




                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Class</label>
                            <select class="form-control" id="darasa_id" name="darasa_id" >
                                <option value="{{$school_attendance->darasa_id}}">{{$school_attendance->darasa->class_name}}</option>
                                @foreach($darasa as $darasa)
                                    <option value="{{$darasa->id}}">{{$darasa->class_name}}</option>
                                @endforeach
                            </select>
                            @error('darasa_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Teachers Name</label>
                            <select class="form-control" id="user_id" name="user_id" >
                                <option value="{{$school_attendance->user_id}}">{{$school_attendance->user->name}}</option>
                                @foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                </div>


                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Edit School Attendance</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection