@extends('layouts.master')
@section('title', 'Students')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('students.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('students.personal_information') }}
                        </h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('students.name_ar') }} : <span class="text-danger">*</span></label>
                                    <input type="text" name="name[ar]" value="{{ old('name.ar') }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('students.name_en') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name[en]" value="{{ old('name.en') }}" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('students.email') }} : </label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('students.password') }} :</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('teachers.password_confirmation') }} :</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{ trans('students.gender') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">
                                                {{ $gender->getTranslation('name', app()->getLocale()) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{ trans('students.Nationality') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationality_id">
                                        <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @foreach ($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{ trans('students.blood_type') }} : </label>
                                    <select class="custom-select mr-sm-2" name="blood_type_id">
                                        <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @foreach ($bloods as $blood)
                                            <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('students.Date_of_Birth') }} :</label>
                                    <input class="form-control" type="text" id="datepicker-action" name="date_birth"
                                        data-date-format="yyyy-mm-dd">
                                </div>
                            </div>

                        </div>

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                            {{ trans('students.Student_information') }}</h6><br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="grade_id">{{ trans('students.Grade') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="classroom_id">{{ trans('students.classrooms') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id"></select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('students.section') }} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id"></select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{ trans('students.parent') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name_father }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{ trans('students.academic_year') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @php
                                            $current_year = date('Y');
                                        @endphp
                                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-3 mt-3">
                                <div class="form-group">
                                    <label for="photos">{{ trans('parents.Attachments') }} : <span
                                            class="text-danger">*</span></label>
                                    <input type="file" accept="image/*" name="photos[]" id="photos" multiple>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('students.submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="grade_id"]').on('change', function() {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('get-classes') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="classroom_id"]').empty();
                            $('select[name="classroom_id"]').append(
                                '<option selected disabled >{{ trans('parents.Choose') }}...</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="classroom_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    console.log('error ajax')
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('select[name="classroom_id"]').on('change', function() {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('get-sections') }}/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="section_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    console.log('error ajax')
                }
            });
        });
    </script>
@endsection
