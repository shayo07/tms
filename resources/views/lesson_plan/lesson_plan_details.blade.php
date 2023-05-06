@extends('layouts.base')
@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lesson Plan Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 250px;">attributes</th>
                    <th>value</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1.</td>
                    <td>School Lesson Plan</td>
                    <td><b>
                            {{$lesson_plan->lessondevelopment->name}}
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>2.</td>
                    <td>Periods</td>
                    <td>
                        <b>
                            {{$lesson_plan->periods}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Time</td>
                    <td>
                        <b>
                            {{$lesson_plan->time}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Boys Registered</td>
                    <td>
                        <b>
                            {{$lesson_plan->boys_registered}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Girls Registered</td>
                    <td>
                        <b>
                            {{$lesson_plan->girls_registered}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Boys Present</td>
                    <td>
                        <b>
                            {{$lesson_plan->boys_present}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Girls Present</td>
                    <td>
                        <b>
                            {{$lesson_plan->girls_present}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Main Topic</td>
                    <td>
                        <div class="form-group">
                            <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $lesson_plan->competence}}</textarea>
                            </b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Main Topic</td>
                    <td>
                        <div class="form-group">
                            <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $lesson_plan->topic}}</textarea>
                            </b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Sub topic</td>
                    <td>

                        <div class="form-group">
                            <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $lesson_plan->sub_topic}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>

                <tr>
                    <td>8.</td>
                    <td>General Objectives</td>
                    <td>

                        <div class="form-group">
                            <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $lesson_plan->general_objectives}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>

                <tr>
                    <td>9.</td>
                    <td>Specific Objectives</td>
                    <td>

                        <div class="form-group">
                            <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $lesson_plan->specific_objectives}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td>Learning Material</td>
                    <td>

                        <div class="form-group">
                            <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $lesson_plan->teachers_learning_material}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td>references</td>
                    <td>

                        <div class="form-group">
                            <b>
                                <textarea id="main_topic" class=" form-control border-0 bg-white" rows="3" disabled>{{ $lesson_plan->reference}}</textarea>
                            </b>
                        </div>

                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="row">
                <div class="padding-2">
                    <a href="{{route('lesson_plan.edit', $lesson_plan->slug) }}">
                        <button class="btn btn-primary">edit</button>
                    </a>
                </div>

                <div class="padding-2 ml-1">
                    <form action="{{ route('lesson_plan.destroy', $lesson_plan->slug) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>

        <div class="row py-2">
            <div class="padding-2">
                <a href="{{route('lesson_dev.index', ['lesson_plan' => $lesson_plan->lessondevelopment->slug ]) }}">
                    <button class="btn btn-primary">Lesson Development</button>
                </a>
            </div>

            <div class="padding-2 ml-1">
                <a href="{{route('lesson_evaluation.index', ['lesson_development' => $lesson_plan->lessondevelopment->slug]) }}">
                    <button class="btn btn-primary">Lesson Evaluation</button>
                </a>
            </div>
        </div>
    </div>
    <!-- /.card -->




@endsection