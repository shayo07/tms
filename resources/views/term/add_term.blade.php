@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add Term</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('term.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Term Name</label>
                            <input id="term_name" type="text" placeholder="term name" class="form-control @error('term_name') is-invalid @enderror" name="term_name" value="{{ old('term_name')}}" >
                            @error('term_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Year</label>
                            <input id="year" type="text" placeholder="year" class="form-control @error('year') is-invalid @enderror" name="year" value="{{old('year') }}" >
                            @error('year')
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
                            <label>Term Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="now">Now</option>
                                <option value="past">Past</option>
                                <option value="old">Old</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Add Term</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection