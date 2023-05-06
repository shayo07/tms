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
                                    <p><b>Lesson Evaluations</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('lesson_evaluation.create')}}">
                                        <span class="badge bg-primary p-2">Add New Lesson Evaluation</span>
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
                                    <th>Student_evaluation</th>
                                    <th>Teachers Evaluation</th>
                                    <th>Remarks</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lesson_development->lesson_evaluation as $development)
                                    <tr>
                                        <td>{{$lesson_development->name}}</td>
                                        <td>
                                            <text-area id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>
                                                {{$development->student_evaluation}}
                                            </text-area>
                                        </td>
                                        <td>
                                            <text-area id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>
                                                {{$development->teachers_evaluation}}
                                            </text-area>
                                        </td>
                                        <td>
                                            <text-area id="main_topic" class="  border-0 bg-white" rows="3" disabled>
                                                {{$development->remarks}}
                                            </text-area>
                                        </td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('lesson_evaluation.edit', $development->slug)}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                            <form action="{{ route('lesson_evaluation.destroy', $development->slug)}}" method="post" >
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