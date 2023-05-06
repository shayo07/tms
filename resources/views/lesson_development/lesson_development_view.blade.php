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
                                    <p><b>All School Lesson Plans</b></p>
                                </div>
                                @can( 'edit-delete', auth()->user()->id)
                                <div class="padding-2 ml-2">
                                    <a href="{{route('lesson_development.create')}}">
                                        <span class="badge bg-primary p-2">Add New LessonPlan</span>
                                    </a>
                                </div>
                                @endcan
                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Lessonpla Name</th>
                                    <th>Teacher</th>
                                    <th>Term</th>
                                    <th>class</th>
                                    <th>View</th>
                                    @can( 'edit-delete', auth()->user()->id)
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lesson_developments as $lesson_development)
                                        <tr>
                                            <td>{{$lesson_development->name}}</td>
                                            <td>{{$lesson_development->user->name }}</td>
                                            <td>{{$lesson_development->term->term_name}}</td>
                                            <td>{{$lesson_development->darasa->class_name}}</td>
                                            <td>
                                                <div class="">
                                                    <a href="{{route('lesson_development.show', $lesson_development->slug)}}">
                                                        <button class="btn btn-primary">View</button>
                                                    </a>
                                                </div>
                                            </td>
                                            @can('edit-delete', auth()->user()->id)
                                                <td>
                                                    <div class="">
                                                        <a href="{{ route('lesson_development.edit', $lesson_development->slug)}}">
                                                            <button class="btn btn-primary">Edit</button>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>

                                                    <form action="{{ route('lesson_development.destroy', $lesson_development->slug)}}" method="post" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>

                                                </td>
                                                @endcan
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