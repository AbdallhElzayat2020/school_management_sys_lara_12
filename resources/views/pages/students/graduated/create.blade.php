@extends('layouts.master')
@section('title','اضافة طالب متخرج')
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <form action="{{ route('graduated-student.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('students.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id" required>
                                    <option selected disabled>{{trans('parents.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="classroom_id">{{trans('students.classrooms')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('students.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">{{__('tables.save')}}</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')


@endsection
