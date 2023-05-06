@extends('layouts.base')
@section('content')

    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Journal Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('journal_report.update', $journal_report->slug)}}" method="post">
                @csrf
                @method('PUT')
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="status">School Journal</label>
                        <select class="form-control" id="school_journal_id" name="school_journal_id" >
                            <option value="{{$journal_report->school_journal_id}}">{{$journal_report->school_journal->journal_name}}</option>
                            @foreach($school_journals as $school_journal)
                                <option value="{{$school_journal->id}}">{{$school_journal->journal_name}}</option>
                            @endforeach
                        </select>
                        @error('school_journal_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="inputName">Periods Taught</label>
                        <input id="periods_taught" type="periods_taught"  class="form-control @error('periods_taught') is-invalid @enderror" name="periods_taught" value="{{ $journal_report->periods_taught}}" >
                        @error('periods_taught')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="inputName">Periods Not Taught</label>
                        <input id="periods_not_taught" type="text"  class="form-control @error('periods_not_taught') is-invalid @enderror" name="periods_not_taught" value="{{ $journal_report->periods_not_taught}}" >
                        @error('periods_not_taught')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Reason for not taught</label>
                        <textarea id="reason_for_not_taught" class="form-control @error('reason_for_not_taught') is-invalid @enderror" rows="3" value="" name="reason_for_not_taught" placeholder="Enter ...">{{ $journal_report->reason_for_not_taught}}</textarea>
                    </div>
                    @error('reason_for_not_taught')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Class Teachers Comment</label>
                        <textarea id="class_teacher_comment" class="form-control @error('class_teacher_comment') is-invalid @enderror" rows="3" value="" name="class_teacher_comment" placeholder="Enter ...">{{ $journal_report->class_teacher_comment}}</textarea>
                    </div>
                    @error('class_teacher_comment')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>H.O.D Teachers Comment</label>
                        <textarea id="admin_teacher_comment" class="form-control @error('admin_teacher_comment') is-invalid @enderror" rows="3" value="" name="admin_teacher_comment" placeholder="Enter ...">{{ $journal_report->admin_teacher_comment}}</textarea>
                    </div>
                    @error('admin_teacher_comment')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>H.O.S Teachers Comment</label>
                        <textarea id="super_admin_teacher_comment" class="form-control @error('super_admin_teacher_comment') is-invalid @enderror" rows="3" value="" name="super_admin_teacher_comment" placeholder="Enter ...">{{ $journal_report->super_admin_teacher_comment}}</textarea>
                    </div>
                    @error('super_admin_teacher_comment')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>



                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Edit Journal Report</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection