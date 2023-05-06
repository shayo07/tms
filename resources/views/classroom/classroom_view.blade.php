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
                                    <p><b>Class Students</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('classroom.create')}}">
                                        <span class="badge bg-primary p-2">Add Student</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Term</th>
                                    <th>Remove Student</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($myclasses as $myclass)
                                    <tr>
                                        <td>{{$myclass->student->name}}</td>
                                        <td>{{$myclass->darasa->class_name}}</td>
                                        <td>{{$myclass->term->term_name}}</td>
                                        <td>

                                            <form action="{{ route('classroom.destroy', $myclass->slug)}}" method="post" >
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