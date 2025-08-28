@extends('layouts.master')

@section('title', __('dashboard.student_promotion'))
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('error_promotions') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <h6 style="color: red;font-family: Cairo">المرحلة الدراسية القديمة</h6><br>

                    <form method="post" action="{{ route('student-promotion.store') }}">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col">
                                <label for="grade_id">{{ trans('students.Grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="classroom_id">{{ trans('students.classrooms') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id"></select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{ trans('students.section') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id"></select>
                            </div>

                        </div>




                        <br>
                        <h6 style="color: red;font-family: Cairo">المرحلة الدراسية الجديدة</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('students.Grade') }}</label>
                                <select class="custom-select mr-sm-2" name="grade_id_new">
                                    <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="classroom_id">{{ trans('students.classrooms') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id_new">

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">{{ trans('students.section') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id_new">

                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">تاكيد</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
