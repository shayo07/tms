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
                                    <p><b>All Logbooks</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('schoollogbook.create')}}">
                                        <span class="badge bg-primary p-2">Add New Logbook</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Logbook Name</th>
                                    <th>Teacher</th>
                                    <th>Term</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>View</th>
                                    @can('edit-delete', auth()->user()->is_super)
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $log)
                                    @can('view-logbook', $log)
                                    <tr>
                                        <td>{{$log->log_name}}</td>
                                        <td>{{$log->user->name }}</td>
                                        <td>{{$log->term->term_name}}</td>
                                        <td>{{$log->year}}</td>
                                        <td>{{$log->darasa->class_name}}</td>
                                        <td>
                                            <div class="">
                                                <a href="/mylogbooks/{{$log->slug}}">
                                                    <button class="btn btn-primary">View</button>
                                                </a>
                                            </div>
                                        </td>
                                        @can('edit-delete', auth()->user()->is_super)

                                        <td>
                                            <div class="">
                                                <a href="{{ route('schoollogbook.edit', $log->slug)}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                            <form action="{{ route('schoollogbook.destroy', $log->slug)}}" method="post" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                        </td>
                                            @endcan
                                    </tr>
                                    @endcan
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