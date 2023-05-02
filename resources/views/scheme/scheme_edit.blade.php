@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit scheme Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('scheme.update', $scheme->slug)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="term">Edit School Scheme</label>
                            <select class="form-control" id="schoolscheme_id" name="schoolscheme_id" >
                                <option value="{{$scheme->schoolscheme->id}}">{{$scheme->schoolscheme->scheme_name}}</option>
                                @foreach($schoolscheme as $scheme)
                                    <option value="{{$scheme->id}}">{{$scheme->scheme_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Month</label>
                            <input id="month" type="text"  class="form-control @error('month') is-invalid @enderror" name="month" value="{{ $scheme->month}}" >
                            @error('month')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Week</label>
                            <input id="week" type="text"  class="form-control @error('week') is-invalid @enderror" name="week" value="{{$scheme->week}}" >
                            @error('week')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">competence</label>
                            <input id="competence" type="text"  class="form-control @error('competence') is-invalid @enderror" name="competence" value="{{$scheme->competence }}" >
                            @error('competence')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Objectives</label>
                            <textarea id="objectives" class="form-control @error('objectives') is-invalid @enderror" rows="3" value="" name="objectives" placeholder="Enter ...">{{ $scheme->objectives }}</textarea>
                        </div>
                        @error('objectives')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Main Topic</label>
                            <textarea id="main_topic" class="form-control @error('main_topic') is-invalid @enderror" rows="3" value="" name="main_topic" placeholder="Enter ...">{{ $scheme->main_topic}}</textarea>
                        </div>
                        @error('main_topic')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Sub Topic</label>
                            <textarea id="sub_topic" class="form-control @error('sub_topic') is-invalid @enderror" rows="3" value="" name="sub_topic" placeholder="Enter ...">{{ $scheme->sub_topic}}</textarea>
                        </div>
                        @error('sub_topic')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Periods</label>
                            <input id="periods" type="text"  class="form-control @error('periods') is-invalid @enderror" name="periods" value="{{ $scheme->periods}}" >
                            @error('periods')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>


                </div>
                <div class="row">

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Teaching Activities</label>
                            <textarea id="teaching_activities" class="form-control @error('teaching_activities') is-invalid @enderror" rows="3" value="" name="teaching_activities" placeholder="Enter ...">{{ $scheme->teaching_activities}}</textarea>
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
                            <textarea id="learning_activities" class="form-control @error('learning_activities') is-invalid @enderror" rows="3" value="" name="learning_activities" placeholder="Enter ...">{{ $scheme->learning_activities}}</textarea>
                        </div>
                        @error('learning_activities')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>References</label>
                            <textarea id="references" class="form-control @error('references') is-invalid @enderror" rows="3" value="" name="references" placeholder="Enter ...">{{ $scheme->references}}</textarea>
                        </div>
                        @error('references')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Teaching Aids</label>
                            <textarea id="teaching_aids" class="form-control @error('teaching_aids') is-invalid @enderror" rows="3" value="" name="teaching_aids" placeholder="Enter ...">{{ $scheme->teaching_aids}}</textarea>
                        </div>
                        @error('teaching_aids')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Remarks</label>
                            <input id="assesments" type="text"  class="form-control @error('assesments') is-invalid @enderror" name="assesments" value="{{ $scheme->assesments}}" >
                            @error('assesments')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">remarks</label>
                            <input id="remarks" type="text"  class="form-control @error('remarks') is-invalid @enderror" name="remarks" value="{{ $scheme->remarks}}" >
                            @error('remarks')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row col-7">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Edit scheme</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->

    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

    </script>

@endsection

