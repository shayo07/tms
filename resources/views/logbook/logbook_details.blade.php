@extends('layouts.base')
@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Logbook details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 250px;">attributes</th>
                    <th>value</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1.</td>
                    <td>Week Number</td>
                    <td><b>
                            {{$logbooks->week_number}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>2.</td>
                    <td>Month Number</td>
                    <td>
                        <b>
                            {{$logbooks->month_number}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>3.</td>
                    <td>Main Topic</td>
                    <td>

                               {!!  $logbooks->main_topic !!}

                    </td>

                </tr>
                <tr>
                    <td>4.</td>
                    <td>Sub topic</td>
                    <td>

                          {!! $logbooks->sub_topic !!}

                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Time Start</td>
                    <td>
                        <b>
                            {{$logbooks->time_start}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Time Finish</td>
                    <td>
                        <b>
                            {{$logbooks->time_finish}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Concept Covered</td>
                    <td>

                            {!! $logbooks->concept_covered!!}

                    </td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Teachers Comment</td>
                    <td>
                        <b>
                            {{$logbooks->teachers_comment}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>H.O.D Comment</td>
                    <td>
                        <b>
                            {{$logbooks->headofdepartment_comment}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>HeadTeachers Comment</td>
                    <td>
                        <b>
                            {{$logbooks->headteachers_comment}}
                        </b>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="row">
                <div class="padding-2">
                    <a href="{{route('logbook.edit', $logbooks->slug)}}">
                        <button class="btn btn-primary">edit</button>
                    </a>
                </div>
                <div class="padding-2 ml-1">
                    <form action="{{ route('logbook.destroy', $logbooks->slug) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /.card -->




@endsection