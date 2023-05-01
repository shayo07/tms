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
                                    <p><b>All Classes</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('darasa.create')}}">
                                        <span class="badge bg-primary p-2">Add New Class</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Class Name</th>
                                    <th>Class Capacity</th>
                                    <th>Class Teacher</th>
                                    <th>Class status</th>
                                    <th>Add Student</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($darasa as $darasa)
                                    <tr>
                                    <td>{{$darasa->id}}</td>
                                    <td>{{$darasa->class_name}}</td>
                                    <td>{{$darasa->class_capacity}}</td>
                                    <td>{{$darasa->user_id}}</td>
                                    <td>{{$darasa->is_active}}</td>
                                        <td>
                                            <div class="">
                                                <a href="/classes/{{$darasa->id}}">
                                                    <button class="btn btn-primary">Add</button>
                                                </a>
                                            </div>
                                        </td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('darasa.edit', $darasa->slug)}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>

                                        <form action="{{ route('darasa.destroy', $darasa->slug)}}" method="post" >
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