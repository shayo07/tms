@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add School Lesson Development</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('lesson_dev.store')}}" method="post">
                @csrf

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status">School Lesson Plan</label>
                            <select class="form-control" id="lessondevelopment_id" name="lessondevelopment_id" >
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
                    <div class="form-group">
                        <label for="status">Stage</label>
                        <select class="form-control" id="stage" name="stage" >
                                <option value="Introduction">Introduction</option>
                                <option value="Developing New Knowledge">Developing New Knowledge</option>
                                <option value="Reinforcement">Reinforcement</option>
                                <option value="Reflection">Reflection</option>
                                <option value="Consolidation">Consolidation</option>
                        </select>
                        @error('stage')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="inputName">Time</label>
                        <input id="time" type="text"  class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time')}}" >
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Teaching Activities</label>
                        <textarea id="teaching_activities" class="form-control @error('teaching_activities') is-invalid @enderror" rows="3" value="" name="teaching_activities" placeholder="Enter ...">{{ old('teaching_activities')}}</textarea>
                    </div>
                    @error('teaching_activities')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>



                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Learning Activities</label>
                        <textarea id="learning_activities" class="form-control @error('learning_activities') is-invalid @enderror" rows="3" value="" name="learning_activities" placeholder="Enter ...">{{ old('learning_activities')}}</textarea>
                    </div>
                    @error('learning_activities')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Assessments">Assesments</label>
                        <input id="assessment" type="text"  class="form-control @error('assessment') is-invalid @enderror" name="assessment" value="{{ old('assessment')}}" >
                        @error('assessment')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Add Lesson Development</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection