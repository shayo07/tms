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
                                    <p><b> Logbooks</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('logbook.create')}}">
                                        <span class="badge bg-primary p-2">Add new logbook</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>School Logbook</th>
                                    <th>Week</th>
                                    <th>Month</th>
                                    <th>Main Topic</th>
                                    <th>Details</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schoollogbook->logbooks as $logbook)
                                    <tr>
                                        <td>{{$schoollogbook->log_name}}</td>
                                        <td>{{$logbook->week_number}}</td>
                                        <td>{{$logbook->month_number}}</td>
                                        <td>{!!$logbook->main_topic  !!}</td>
                                        <td><a href="{{ route('logbook.show', $logbook->slug)}}"><span class="badge bg-primary p-2">Details</span></a></td>
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