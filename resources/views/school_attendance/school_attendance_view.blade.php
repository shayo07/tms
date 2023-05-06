@extends('layouts.base')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="padding-2">
                                    <p><b>All School Attendance</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('school_attendance.create')}}">
                                        <span class="badge bg-primary p-2">Add attendance</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Attendance Name</th>
                                    <th>Teacher</th>
                                    <th>Term</th>
                                    <th>Class</th>
                                    <th>View</th>

                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($school_attendances as $school_attendance)
                                    <tr>
                                        <td>{{$school_attendance->attendance_name}}</td>
                                        <td>{{$school_attendance->user->name }}</td>
                                        <td>{{$school_attendance->term->term_name}}</td>
                                        <td>{{$school_attendance->darasa->class_name}}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{route('attendance.index', ['schoolattendanceID' => $school_attendance->slug ])}}">
                                                    <button class="btn btn-primary">View</button>
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="">
                                                <a href="{{ route('school_attendance.edit', $school_attendance->slug)}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                            <form action="{{ route('school_attendance.destroy', $school_attendance->slug)}}" method="post" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->




@endsection