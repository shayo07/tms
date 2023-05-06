@extends('layouts.base')
@section('content')

    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add Journal</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('journal.store')}}" method="post">
                @csrf

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="status">School Journal</label>
                        <select class="form-control" id="school_journal_id" name="school_journal_id" >
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
                    <div class="form-group">
                        <label for="status">Subject</label>
                        <select class="form-control" id="subject_id" name="subject_id" >
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
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
                    <div class="form-group">
                        <label for="status">Session</label>
                        <select class="form-control" id="session" name="session" >
                            <option value="session 1">session 1</option>
                            <option value="session 2">session 2</option>
                            <option value="session 3">session 3</option>
                            <option value="session 4">session 4</option>
                            <option value="session 5">session 5</option>
                            <option value="session 6">session 6</option>
                            <option value="session 7">session 7</option>

                        </select>
                        @error('session')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Concept Covered</label>
                        <textarea id="concept_covered" class="form-control @error('concept_covered') is-invalid @enderror" rows="3" value="" name="concept_covered" placeholder="Enter ...">{{ old('concept_covered')}}</textarea>
                    </div>
                    @error('concept_covered')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Teachers Comment</label>
                        <textarea id="teachers_comment" class="form-control @error('teachers_comment') is-invalid @enderror" rows="3" value="" name="teachers_comment" placeholder="Enter ...">{{ old('teachers_comment')}}</textarea>
                    </div>
                    @error('teachers_comment')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Add Journal</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection