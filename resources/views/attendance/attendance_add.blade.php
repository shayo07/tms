@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Take Students Attendance</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('attendance.store')}}" method="post">
                @csrf
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Term</label>
                            <select class="form-control" id="school_attendance_id" name="school_attendance_id" >
                                @foreach($school_attendance as $school_attendance)
                                    <option value="{{$school_attendance->id}}">{{$school_attendance->attendance_name}}</option>
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
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Date</label>
                            <input id="date" type="date"  class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date')}}" >
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>


                    <div class="row">

                        @foreach( $classroom as $classroom)

                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="inputName">Student Name</label>
                                    <input  type="hidden"  class="form-control" name="student_id[]" value="{{ $classroom->student_id }}" readonly>
                                    <input  type="text"  class="form-control" name="student" value="{{ $classroom->students->name }}" readonly>
                                </div>
                            </div>

                            <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status[]" >
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Sick">Sick</option>
                            </select>
                        </div>
                    </div>

                        @endforeach

                    </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Add Attendance</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection