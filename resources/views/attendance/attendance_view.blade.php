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
                                    <p><b>All Class Attendance</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('attendance.create')}}">
                                        <span class="badge bg-primary p-2">Add class attendance</span>
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
                                    <th>Student</th>
                                    <th>status</th>
                                    <th>date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($school_attendance->attendances as $attendance)
                                    <tr>
                                        <td>{{$school_attendance->attendance_name}}</td>
                                        <td>{{$attendance->student->firstname }},
                                            {{$attendance->student->midllename }},
                                            {{$attendance->student->lastname }}</td>
                                        <td>{{$attendance->status}}</td>
                                        <td>{{$attendance->date}}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('attendance.edit', $attendance->slug)}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                            <form action="{{ route('attendance.destroy', $attendance->slug)}}" method="post" >
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