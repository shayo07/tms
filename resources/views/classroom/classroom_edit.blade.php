@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit student</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('classroom.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Student Name</label>
                            <select class="form-control" id="student_id" name="student_id">
                                @foreach($student as $student)
                                    <option value="{{$student->id}}">{{$student->firstname}}, {{$student->middlename}}, {{$student->lastname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Class</label>
                            <select class="form-control" id="darasa_id" name="darasa_id">
                                @foreach($darasa as $darasa)
                                    <option value="{{$darasa->id}}">{{$darasa->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Class</label>
                            <select class="form-control" id="term_id" name="term_id">
                                @foreach($term as $term)
                                    <option value="{{$term->id}}">{{$term->term_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>


                <div class="row">


                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Add Class</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection