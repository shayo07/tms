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
                                    <p><b>All School Class Journals</b></p>
                                </div>
                                <div class="padding-2 ml-2">
                                    <a href="{{route('school_journal.create')}}">
                                        <span class="badge bg-primary p-2">Add New Journal</span>
                                    </a>

                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Journal Name</th>
                                    <th>Teacher</th>
                                    <th>Term</th>
                                    <th>Class</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>View</th>

                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($school_journals as $school_journal)
                                    <tr>
                                        <td>{{$school_journal->journal_name}}</td>
                                        <td>{{$school_journal->user->name }}</td>
                                        <td>{{$school_journal->term->term_name}}</td>
                                        <td>{{$school_journal->darasa->class_name}}</td>
                                        <td>{{$school_journal->date}}</td>
                                        <td>{{$school_journal->day}}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{route('journal.index', ['school_journal' => $school_journal->slug ])}}">
                                                    <button class="btn btn-primary">View</button>
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="">
                                                <a href="{{ route('school_journal.edit', $school_journal->slug)}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                            <form action="{{ route('school_journal.destroy', $school_journal->slug)}}" method="post" >
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