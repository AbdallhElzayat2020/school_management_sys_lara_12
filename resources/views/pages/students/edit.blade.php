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

                    <form method="post" action="{{ route('students.update', $student->id) }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('students.personal_information') }}
                        </h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('students.name_ar') }} : <span class="text-danger">*</span></label>
                                    <input type="text" name="name[ar]"
                                        value="{{ old('name.ar', $student->getTranslation('name', 'ar')) }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('students.name_en') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name[en]"
                                        value="{{ old('name.en', $student->getTranslation('name', 'en')) }}" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('students.email') }} : </label>
                                    <input type="email" name="email" value="{{ old('email', $student->email) }}"
                                        class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('students.password') }} :</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="اتركه فارغاً إذا لم تريد تغييره">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تأكيد كلمة المرور :</label>
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
                                            <option value="{{ $gender->id }}"
                                                {{ old('gender_id', $student->gender_id) == $gender->id ? 'selected' : '' }}>
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
                                            <option value="{{ $nationality->id }}"
                                                {{ old('nationality_id', $student->nationality_id) == $nationality->id ? 'selected' : '' }}>
                                                {{ $nationality->name }}</option>
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
                                            <option value="{{ $blood->id }}"
                                                {{ old('blood_type_id', $student->blood_type_id) == $blood->id ? 'selected' : '' }}>
                                                {{ $blood->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('students.Date_of_Birth') }} :</label>
                                    <input class="form-control" type="text" id="datepicker-action" name="date_birth"
                                        value="{{ old('date_birth', $student->date_birth) }}"
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
                                            <option value="{{ $grade->id }}"
                                                {{ old('grade_id', $student->grade_id) == $grade->id ? 'selected' : '' }}>
                                                {{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="classroom_id">{{ trans('students.classrooms') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">
                                        @if ($student->classroom_id)
                                            <option value="{{ $student->classroom_id }}" selected>
                                                {{ $student->classroom->class_name ?? '' }}</option>
                                        @else
                                            <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('students.section') }} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        @if ($student->section_id)
                                            <option value="{{ $student->section_id }}" selected>
                                                {{ $student->section->section_name ?? '' }}</option>
                                        @else
                                            <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{ trans('students.parent') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}"
                                                {{ old('parent_id', $student->parent_id) == $parent->id ? 'selected' : '' }}>
                                                {{ $parent->name_father }}</option>
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
                                            <option value="{{ $year }}"
                                                {{ old('academic_year', $student->academic_year) == $year ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Photos section -->
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                            {{ trans('parents.Attachments') ?? 'الصور' }}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photos">{{ trans('parents.Attachments') }} :</label>
                                    <input type="file" accept="image/*" name="photos[]" id="photos" multiple
                                        class="form-control">
                                    <small class="text-muted">يمكنك اختيار صور متعددة</small>
                                </div>
                            </div>

                            @if ($student->images && $student->images->count() > 0)
                                <div class="col-md-6">
                                    <label>Images</label>
                                    <div class="row">
                                        @foreach ($student->images as $image)
                                            <div class="col-md-3 mb-2">
                                                @php
                                                    $imagePath = public_path($image->url);
                                                @endphp
                                                @if (file_exists($imagePath))
                                                    <img src="{{ asset($image->url) }}" class="img-thumbnail"
                                                        style="max-height: 100px;">
                                                @else
                                                    <div class="text-danger">صورة مفقودة</div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('students.edit') ?? 'تحديث' }}</button>
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
            // Load classrooms for selected grade on page load
            var selectedGradeId = $('select[name="grade_id"]').val();
            if (selectedGradeId) {
                loadClassrooms(selectedGradeId, {{ $student->classroom_id ?? 'null' }});
            }

            // Load sections for selected classroom on page load
            var selectedClassroomId = $('select[name="classroom_id"]').val();
            if (selectedClassroomId) {
                loadSections(selectedClassroomId, {{ $student->section_id ?? 'null' }});
            }

            $('select[name="grade_id"]').on('change', function() {
                var grade_id = $(this).val();
                if (grade_id) {
                    loadClassrooms(grade_id);
                    $('select[name="section_id"]').empty();
                } else {
                    console.log('error ajax')
                }
            });

            function loadClassrooms(gradeId, selectedClassroomId = null) {
                $.ajax({
                    url: "{{ URL::to('get-classes') }}/" + gradeId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classroom_id"]').empty();
                        $('select[name="classroom_id"]').append(
                            '<option selected disabled >{{ trans('parents.Choose') }}...</option>'
                        );
                        $.each(data, function(key, value) {
                            var selected = selectedClassroomId == key ? 'selected' : '';
                            $('select[name="classroom_id"]').append(
                                '<option value="' + key + '" ' + selected + '>' + value +
                                '</option>'
                            );
                        });

                        // If there's a selected classroom, load its sections
                        if (selectedClassroomId) {
                            loadSections(selectedClassroomId, {{ $student->section_id ?? 'null' }});
                        }
                    },
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="classroom_id"]').on('change', function() {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    loadSections(classroom_id);
                } else {
                    console.log('error ajax')
                }
            });

            function loadSections(classroomId, selectedSectionId = null) {
                $.ajax({
                    url: "{{ URL::to('get-sections') }}/" + classroomId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="section_id"]').empty();
                        $.each(data, function(key, value) {
                            var selected = selectedSectionId == key ? 'selected' : '';
                            $('select[name="section_id"]').append(
                                '<option value="' + key + '" ' + selected + '>' + value +
                                '</option>'
                            );
                        });
                    },
                });
            }

            // Make loadSections available globally
            window.loadSections = loadSections;
        });
    </script>
@endsection
