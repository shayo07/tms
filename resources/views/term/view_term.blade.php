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
                                    <p><b>All Terms</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('term.create')}}">
                                        <span class="badge bg-primary p-2">Add New term</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Term Name</th>
                                    <th>year</th>
                                    <th>Term status</th>
                                    <th>Active</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($term as $term)
                                    <tr>

                                        <td>{{$term->term_name}}</td>
                                        <td>{{$term->year}}</td>
                                        <td>{{$term->status}}</td>
                                        <td>{{$term->is_active}}</td>

                                        <td>
                                            <div class="">
                                                <a href="{{ route('term.edit', $term->slug)}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                            <form action="{{ route('term.destroy', $term->slug)}}" method="post" >
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