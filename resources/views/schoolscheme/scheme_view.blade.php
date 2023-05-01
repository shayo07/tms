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
                                    <p><b>All Scheme Works</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('schoolscheme.create')}}">
                                        <span class="badge bg-primary p-2">Add New Scheme of work</span>
                                    </a>

                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Scheme Name</th>
                                    <th>Term</th>
                                    <th>Teacher</th>
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
                                @foreach($schemes as $scheme)
                                    @can('view-logbook', $scheme)
                                        <tr>
                                            <td>{{$scheme->scheme_name}}</td>
                                            <td>{{$scheme->term->term_name}}</td>
                                            <td>{{$scheme->user->name}}</td>
                                            <td>{{$scheme->year}}</td>
                                            <td>{{$scheme->darasa->class_name}}</td>
                                            <td>
                                                <div class="">
                                                    <a href=" {{route('scheme.index', ['schemeID' => $scheme->slug] )}}">
                                                        <button class="btn btn-primary">View</button>
                                                    </a>
                                                </div>
                                            </td>
                                            @can('edit-delete', auth()->user()->is_super)

                                                <td>
                                                    <div class="">
                                                        <a href="{{ route('schoolscheme.edit', $scheme->slug)}}">
                                                            <button class="btn btn-primary">Edit</button>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>

                                                    <form action="{{ route('schoolscheme.destroy', $scheme->slug)}}" method="post" >
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