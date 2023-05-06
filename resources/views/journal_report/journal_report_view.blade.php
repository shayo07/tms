@extends('layouts.base')
@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Journail Report</h3>
            <div class="padding-2 ml-4">
                <a href="{{route('journal_report.create')}}">
                    <button class="btn btn-primary">Add Report</button>
                </a>
            </div>
        </div>
    @foreach($journal as $journal )
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
                    <td>Journal Name</td>
                    <td><b>
                            {{$journal->school_journal->journal_name}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>2.</td>
                    <td>Periods Taught</td>
                    <td>
                        <b>
                            {{$journal->periods_taught}}
                        </b>
                    </td>

                </tr> <tr>
                    <td>2.</td>
                    <td>Periods Taught</td>
                    <td>
                        <b>
                            {{$journal->periods_not_taught}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>3.</td>
                    <td>Reason for not taught</td>
                    <td>
                        <b>
                            <div class="form-group">
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $journal->reason_for_not_taught}}</textarea>
                            </div>
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>4.</td>
                    <td>Class Teachers Comment</td>
                    <td>
                        <b>
                            <div class="form-group">
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $journal->class_teacher_comment}}</textarea>
                            </div>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>H.O.D Teachers Comment</td>
                    <td>
                        <b>
                            <div class="form-group">
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $journal->admin_teacher_comment}}</textarea>
                            </div>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>H.O.S Teachers Comment</td>
                    <td>
                        <b>
                            <div class="form-group">
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $journal->super_admin_teacher_comment}}</textarea>
                            </div>
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
                    <a href="{{route('journal_report.edit', $journal->slug)}}">
                        <button class="btn btn-primary">edit</button>
                    </a>
                </div>
                <div class="padding-2 ml-1">
                    <form action="{{ route('journal_report.destroy', $journal->slug) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /.card -->
    @endforeach



@endsection