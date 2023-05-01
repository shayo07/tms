@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit School Logbook</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('schoollogbook.update', $log->slug)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Logbook Name</label>
                            <input id="log_name" type="text"  class="form-control @error('log_name') is-invalid @enderror" name="log_name" value="{{ $log->log_name }}" >
                            @error('log_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">year</label>
                            <input id="year" type="text"  class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $log->year}}" >
                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Class</label>
                            <select class="form-control" id="darasa_id" name="darasa_id" >
                                <option value="{{$log->darasa_id}}">{{$log->darasa->class_name}}</option>
                                @foreach($darasa as $dar)
                                    <option value="{{$dar->id}}">{{$dar->class_name}}</option>
                                @endforeach
                            </select>
                            @error('darasa_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Teachers Name</label>
                            <select class="form-control" id="user_id" name="user_id" >
                                    <option value="{{$log->user_id}}">{{$log->user->name}}</option>
                                @foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status"> Term</label>
                            <select class="form-control" id="term_id" name="term_id" >
                                <option value="{{$log->term_id}}">{{$log->term->term_name}}</option>
                                @foreach($term as $term)
                                    <option value="{{$term->id}}">{{$term->term_name}}</option>
                                @endforeach
                            </select>
                            @error('term_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Edit School Logbook</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection