@extends('layouts.base')
@section('content')


    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Add Student Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('students.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">First Name</label>
                            <input id="firstname" type="text"  class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname')}}" >
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Middle Name</label>
                            <input id="middlename" type="text"  class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename')}}" >
                            @error('middlename')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Last Name</label>
                            <input id="lastname" type="text"  class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname')}}" >
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="term"> Student Learning Status</label>
                            <select class="form-control" id="term_id" name="term_id" >
                                @foreach($term as $term)
                                <option value="{{$term->id}}">{{$term->term_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <!-- input states -->
                <div class="form-group">
                    <label for="inputName">Parent Email Address</label>
                    <input id="parent_emailaddress" type="text"  class="form-control @error('parent_emailaddress') is-invalid @enderror" name="parent_emailaddress" value="{{old('parent_emailaddress') }}" >
                    @error('parent_emailaddress')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputName">Home Address</label>
                    <input id="home_address" type="text"  class="form-control @error('home_address') is-invalid @enderror" name="home_address" value="{{ old('home_address')}}" >
                    @error('home_address')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>




                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputName">Age</label>
                            <input id="age" type="text"  class="form-control @error('age') is-invalid @enderror" name="age" value="{{old('age')}}" >
                            @error('age')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status"> Student Learning Status</label>
                            <select class="form-control" id="is_active" name="is_active" >
                                <option value="0">completed</option>
                                <option value="1">learning</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Add Student</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->


@endsection