@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Take Students Attendance</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('attendance.update', $attendance->slug )}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> School Attendance</label>
                            <select class="form-control" id="school_attendance_id" name="school_attendance_id" >
                                <option value="{{$attendance->school_attendance_id}}">{{$attendance->school_attendance->attendance_name}}</option>
                            </select>
                            @error('term_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Date</label>
                            <input id="date" type="date"  class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $attendance->date}}" >
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">



                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="student_id" >
                                <option value="{{$attendance->student_id}}">{{ $attendance->student->name }}</option>
                            </select>
                        </div>
                    </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" >
                                    <option value="{{$attendance->status}}">{{$attendance->status}}</option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Sick">Sick</option>
                                </select>
                            </div>
                        </div>


                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">edit Attendance</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection