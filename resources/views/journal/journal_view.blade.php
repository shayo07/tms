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
                                    <p><b>All Journals</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('journal.create')}}">
                                        <span class="badge bg-primary p-2">Add New Journal</span>
                                    </a>
                                </div>
                                <div class="padding-2 ml-4">
                                    <a href="{{route('journal_report.index', ['journalID' => $school_journal->slug] )}}">
                                        <span class="badge bg-primary p-2">Journal Report </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>School Journal</th>
                                    <th>Session</th>
                                    <th>Subject</th>
                                    <th>Concept Covered</th>
                                    <th>Teachers Comment</th>

                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($journals as $journal)
                                    <tr>
                                        <td>{{$journal->school_journal->journal_name}}</td>
                                        <td>{{$journal->session }}</td>
                                        <td>{{$journal->subject->subject_name}}</td>
                                        <td>{{$journal->concept_covered}}</td>
                                        <td>{{$journal->teachers_comment}}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('journal.edit', $journal->slug)}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                            <form action="{{ route('journal.destroy', $journal->slug)}}" method="post" >
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