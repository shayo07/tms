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
                                    <p><b> Lesson Plan Introduction</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('lesson_plan.create')}}">
                                        <span class="badge bg-primary p-2">Add Lesson Plan</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>School Lesson Plan</th>
                                    <th>Topic</th>
                                    <th>periods</th>
                                    <th>Time</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lesson_development->lesson_plan as $ld)
                                    <tr>
                                        <td>{{$lesson_development->name}}</td>
                                        <td>{{$ld->topic}}</td>
                                        <td>{{$ld->periods}}</td>
                                        <td>{{$ld->time}}</td>
                                        <td><a href="{{ route('lesson_plan.show', $ld->slug)}}"><span class="badge bg-primary p-2">Details</span></a></td>
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