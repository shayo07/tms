@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add School Journal</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('school_journal.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">School Journal</label>
                            <input id="journal_name" type="text"  class="form-control @error('journal_name') is-invalid @enderror" name="journal_name" value="{{ old('journal_name')}}" >
                            @error('journal_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Day</label>
                            <input id="day" type="text"  class="form-control @error('day') is-invalid @enderror" name="day" value="{{ old('day')}}" >
                            @error('day')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Date</label>
                            <input id="date" type="text"  class="form-control  @error('date') is-invalid @enderror" name="date" value="{{ old('date')}}" >
                            @error('date')
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
                                @foreach($darasa as $darasa)
                                    <option value="{{$darasa->id}}">{{$darasa->class_name}}</option>
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
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Term</label>
                            <select class="form-control" id="term_id" name="term_id" >
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
                    <button type="submit" class="btn btn-primary btn-block">Add School Journal</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection