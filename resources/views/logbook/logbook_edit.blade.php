@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Logbook Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('logbook.update', $logbook->slug)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="term"> School Logbook</label>
                            <select class="form-control" id="school_logbook_id" name="school_logbook_id" >
                                <option value="{{$logbook->id}}">{{$logbook->school_logbook->log_name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Week Number</label>
                            <input id="week_number" type="text"  class="form-control @error('week_number') is-invalid @enderror" name="week_number" value="{{ $logbook->week_number}}" >
                            @error('week_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Month Number</label>
                            <input id="month_number" type="text"  class="form-control @error('month_number') is-invalid @enderror" name="month_number" value="{{ $logbook->month_number}}" >
                            @error('month_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Main Topic</label>
                            <textarea id="main_topic" class="form-control @error('main_topic') is-invalid @enderror" rows="3" value="" name="main_topic" placeholder="Enter ...">{{ $logbook->main_topic}}</textarea>
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
                            <textarea id="sub_topic" class="form-control @error('sub_topic') is-invalid @enderror" rows="3" value="" name="sub_topic" placeholder="Enter ...">{{ $logbook->sub_topic}}</textarea>
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
                            <label>Concept Covered</label>
                            <textarea id="concept_covered" class="form-control @error('concept_covered') is-invalid @enderror" rows="3"  name="concept_covered" placeholder="Enter ...">{{ $logbook->concept_covered}}</textarea>
                        </div>
                        @error('concept_covered')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Time Start</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input id="time_start" type="text"  class="form-control @error('time_start') is-invalid @enderror" name="time_start" value="{{ $logbook->time_start}}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>                            @error('time_start')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Time finish</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input id="time_finish" type="text"  class="form-control @error('time_finish') is-invalid @enderror" name="time_finish" value="{{ $logbook->time_finish }}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                            <!-- /.input group -->
                            @error('time_finish')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Teachers Comment</label>
                            <input id="teachers_comment" type="text"  class="form-control @error('teachers_comment') is-invalid @enderror" name="teachers_comment" value="{{ $logbook->teachers_comment}}" >
                            @error('teachers_comment')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    @can('edit-delete', auth()->user()->is_admin)
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Head of Department Comment</label>
                            <input id="headofdepartment_comment" type="text"  class="form-control @error('headofdepartment_comment') is-invalid @enderror" name="headofdepartment_comment" value="{{ $logbook->headofdepartment_comment}}" >
                            @error('headofdepartment_comment')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Head Teachers Comment</label>
                            <input id="headteachers_comment" type="text"  class="form-control @error('headteachers_comment') is-invalid @enderror" name="headteachers_comment" value="{{ $logbook->headteachers_comment}}" >
                            @error('headteachers_comment')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                        @endcan

                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Add Logbook</button>
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

