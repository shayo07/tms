@extends('layouts.base')
@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>attributes</th>
                    <th>value</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1.</td>
                    <td>First Name</td>
                    <td><b>
                            {{$student->firstname}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>2.</td>
                    <td>Middle Name</td>
                    <td>
                        <b>
                            {{$student->middlename}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>3.</td>
                    <td>Last Name</td>
                    <td>
                        <b>
                            {{$student->lastname}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>4.</td>
                    <td>Gender</td>
                    <td>
                        <b>
                            {{$student->gender}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Term</td>
                    <td>
                        <b>
                            {{$student->term_id}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Age</td>
                    <td>
                        <b>
                            {{$student->age}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Parent Email Address</td>
                    <td>
                        <b>
                            {{$student->parent_emailaddress}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Gender</td>
                    <td>
                        <b>
                            {{$student->home_address}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Student Status</td>
                    <td>
                        <b>
                            {{$student->is_active}}
                        </b>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
           <div class="row">
               <div class="padding-2">
                   <a href="{{route('students.edit', $student->slug)}}">
                       <button class="btn btn-primary">edit</button>
                   </a>
               </div>
               <div class="padding-2 ml-1">
                   <a href="">

                   </a>
                   <form action="/student/{{ route('students.destroy', $student->slug) }}" method="post" >
                    @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger">Delete</button>
                   </form>
               </div>

           </div>
        </div>
    </div>
    <!-- /.card -->





    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Students Results</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Result ID</th>
                            <th>term</th>
                            <th>year</th>
                            <th>Status</th>
                            <th>Evaluation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>183</td>
                            <td>term 1</td>
                            <td>2014</td>
                            <td><span class="tag tag-success">passed</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>184</td>
                            <td>term 2</td>
                            <td>2014</td>
                            <td><span class="tag tag-success">passed</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->


    @endsection