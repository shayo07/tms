@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Lesson Plan Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('lesson_plan.update', $lesson_plan->slug)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="term"> School Lesson Plan</label>
                            <select class="form-control" id="lessondevelopment_id" name="lessondevelopment_id" >
                                <option value="{{$lesson_plan->lessondevelopment_id}}">{{$lesson_plan->lessondevelopment->name}}</option>
                                @foreach($lesson_development as $lesson_development)
                                    <option value="{{$lesson_development->id}}">{{$lesson_development->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Periods</label>
                            <input id="periods" type="text"  class="form-control @error('periods') is-invalid @enderror" name="periods" value="{{ $lesson_plan->periods}}" >
                            @error('periods')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Time</label>
                            <input id="time" type="text"  class="form-control @error('time') is-invalid @enderror" name="time" value="{{ $lesson_plan->time}}" >
                            @error('time')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Boys Registered</label>
                            <input id="boys_registered" type="text"  class="form-control @error('boys_registered') is-invalid @enderror" name="boys_registered" value="{{ $lesson_plan->boys_registered}}" >
                            @error('boys_registered')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Girls Registered</label>
                            <input id="boys_registered" type="text"  class="form-control @error('girls_registered') is-invalid @enderror" name="girls_registered" value="{{ $lesson_plan->girls_registered}}" >
                            @error('girls_registered')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Boys present</label>
                            <input id="boys_present" type="text"  class="form-control @error('boys_present') is-invalid @enderror" name="boys_present" value="{{ $lesson_plan->boys_present}}" >
                            @error('boys_present')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Girls present</label>
                            <input id="girls_present" type="text"  class="form-control @error('girls_present') is-invalid @enderror" name="girls_present" value="{{ $lesson_plan->girls_present}}" >
                            @error('girls_present')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>competence</label>
                            <textarea id="competence" class="form-control @error('competence') is-invalid @enderror" rows="3" value="" name="competence" placeholder="Enter ...">{{ $lesson_plan->competence}}</textarea>
                        </div>
                        @error('competence')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Topic</label>
                            <textarea id="topic" class="form-control @error('topic') is-invalid @enderror" rows="3" value="" name="topic" placeholder="Enter ...">{{ $lesson_plan->topic}}</textarea>
                        </div>
                        @error('topic')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Sub Topic</label>
                            <textarea id="sub_topic" class="form-control @error('sub_topic') is-invalid @enderror" rows="3" value="" name="sub_topic" placeholder="Enter ...">{{ $lesson_plan->sub_topic}}</textarea>
                        </div>
                        @error('sub_topic')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>general_objectives</label>
                            <textarea id="general_objectives" class="form-control @error('general_objectives') is-invalid @enderror" rows="3" value="" name="general_objectives" placeholder="Enter ...">{{ $lesson_plan->general_objectives}}</textarea>
                        </div>
                        @error('general_objectives')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>specific_objectives</label>
                            <textarea id="specific_objectives" class="form-control @error('specific_objectives') is-invalid @enderror" rows="3" value="" name="specific_objectives" placeholder="Enter ...">{{ $lesson_plan->specific_objectives}}</textarea>
                        </div>
                        @error('specific_objectives')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>



                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>teachers_learning_material</label>
                            <textarea id="teachers_learning_material" class="form-control @error('teachers_learning_material') is-invalid @enderror" rows="3" value="" name="teachers_learning_material" placeholder="Enter ...">{{ $lesson_plan->teachers_learning_material}}</textarea>
                        </div>
                        @error('teachers_learning_material')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>reference</label>
                            <textarea id="reference" class="form-control @error('reference') is-invalid @enderror" rows="3" value="" name="reference" placeholder="Enter ...">{{ $lesson_plan->reference}}</textarea>
                        </div>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                </div>


                <div class="row col-7">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Edit lesson plan</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->



@endsection

