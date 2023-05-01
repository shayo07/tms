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
                                    <p><b>All Student</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('students.create')}}">
                                        <span class="badge bg-primary p-2">Add new student</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->firstname}}</td>
                                    <td>{{$student->middlename}}</td>
                                    <td>{{$student->lastname}}</td>
                                    <td>{{$student->gender}}</td>
                                    <td><a href="{{ route('students.show' ,$student->slug)}}"><span class="badge bg-primary p-2">Details</span></a></td>
                                </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->




    @endsection