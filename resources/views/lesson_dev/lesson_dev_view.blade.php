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
                                    <p><b>Lesson Development</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('lesson_dev.create')}}">
                                        <span class="badge bg-primary p-2">Add New Lesson Development</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Lessonplan Name</th>
                                    <th>Stage</th>
                                    <th>Time</th>
                                    <th>Teaching Activities</th>
                                    <th>Learning Activities</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lesson_development->lesson_dev as $development)
                                    <tr>
                                        <td>{{$lesson_development->name}}</td>
                                        <td>{{$development->stage }}</td>
                                        <td>{{$development->time}}</td>
                                        <td>
                                            <text-area id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>
                                                {{$development->teaching_activities}}
                                            </text-area>
                                        </td>
                                        <td>
                                            <text-area id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>
                                                {{$development->learning_activities}}
                                            </text-area>
                                        </td>
                                        <td>
                                            <text-area id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>
                                                {{$development->assessment}}
                                            </text-area>
                                        </td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('lesson_dev.edit', $development->slug)}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                            <form action="{{ route('lesson_dev.destroy', $development->slug)}}" method="post" >
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