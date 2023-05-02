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
                            {{$scheme->week}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>2.</td>
                    <td>Month Number</td>
                    <td>
                        <b>
                            {{$scheme->month}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Periods</td>
                    <td>
                        <b>
                            {{$scheme->periods}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Objectives</td>
                    <td>
                        <b>
                            {{$scheme->periods}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Competence</td>
                    <td>
                        <b>
                            {{$scheme->competence}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Main Topic</td>
                    <td>
                            <div class="form-group">
                                <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $scheme->main_topic}}</textarea>
                                </b>
                            </div>

                    </td>

                </tr>
                <tr>
                    <td>7.</td>
                    <td>Sub topic</td>
                    <td>

                            <div class="form-group">
                                <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $scheme->sub_topic}}</textarea>
                                </b>
                            </div>

                    </td>
                </tr>

                <tr>
                    <td>8.</td>
                    <td>Teaching Activities</td>
                    <td>

                        <div class="form-group">
                            <b>
                            <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $scheme->teaching_activities}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>

                <tr>
                    <td>9.</td>
                    <td>Learning Activities</td>
                    <td>

                        <div class="form-group">
                            <b>
                            <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $scheme->learning_activities}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td>references</td>
                    <td>

                        <div class="form-group">
                            <b>
                            <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $scheme->references}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>11.</td>
                    <td>Activities</td>
                    <td>

                        <div class="form-group">
                            <b>
                            <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $scheme->teaching_aids}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>12.</td>
                    <td>Assesments</td>
                    <td>

                        <div class="form-group">
                            <b>
                            <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $scheme->assesments}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>13.</td>
                    <td>remarks</td>
                    <td>

                        <div class="form-group">
                            <b>
                            <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $scheme->remarks}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="row">
                <div class="padding-2">
                    <a href="{{route('scheme.edit', $scheme->slug) }}">
                        <button class="btn btn-primary">edit</button>
                    </a>
                </div>

                <div class="padding-2 ml-1">
                    <form action="{{ route('scheme.destroy', $scheme->slug) }}" method="post" >
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