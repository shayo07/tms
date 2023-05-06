@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add  Lesson Evaluation </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('lesson_evaluation.update', $lesson_evaluation->slug)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status">School Lesson Plan</label>
                            <select class="form-control" id="lessondevelopment_id" name="lessondevelopment_id" >
                                <option value="{{$lesson_evaluation->lessondevelopment_id}}">{{$lesson_evaluation->lessondevelopment->name}}</option>
                            @foreach($lesson_development as $lesson_development)
                                    <option value="{{$lesson_development->id}}">{{$lesson_development->name}}</option>
                                @endforeach
                            </select>
                            @error('lessondevelopment_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>student_evaluation</label>
                            <textarea id="student_evaluation" class="form-control @error('student_evaluation') is-invalid @enderror" rows="3" value="" name="student_evaluation" placeholder="Enter ...">{{ $lesson_evaluation->student_evaluation}}</textarea>
                        </div>
                        @error('student_evaluation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>teachers_evaluation</label>
                            <textarea id="teachers_evaluation" class="form-control @error('teachers_evaluation') is-invalid @enderror" rows="3" value="" name="teachers_evaluation" placeholder="Enter ...">{{ $lesson_evaluation->teachers_evaluation}}</textarea>
                        </div>
                        @error('teachers_evaluation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Remarks</label>
                            <textarea id="remarks" class="form-control @error('remarks') is-invalid @enderror" rows="3" value="" name="remarks" placeholder="Enter ...">{{ $lesson_evaluation->remarks }}</textarea>
                        </div>
                        @error('remarks')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Edit Lesson Evaluation</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection