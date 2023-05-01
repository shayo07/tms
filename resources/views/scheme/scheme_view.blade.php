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
                                    <p><b> Scheme of Works</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('scheme.create')}}">
                                        <span class="badge bg-primary p-2">Add new scheme</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>School Scheme</th>
                                    <th>Week</th>
                                    <th>Month</th>
                                    <th>Main Topic</th>
                                    <th>Details</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schemes as $scheme)
                                    <tr>
                                        <td>{{$scheme->school_logbook->log_name}}</td>
                                        <td>{{$scheme->week_number}}</td>
                                        <td>{{$scheme->month_number}}</td>
                                        <td>{{$scheme->main_topic}}</td>
                                        <td><a href="{{ route('scheme.show', $scheme->slug)}}"><span class="badge bg-primary p-2">Details</span></a></td>
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