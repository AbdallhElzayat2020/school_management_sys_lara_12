@extends('layouts.master')
@section('title', __('students.Student_details'))

@push('css')
    <style>
        .card-img-top {
            cursor: pointer;
            transition: transform 0.2s;
        }

        .card-img-top:hover {
            transform: scale(1.05);
        }

        .btn-group .btn {
            margin-right: 2px;
        }

        .modal-lg .modal-body img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endpush
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{ trans('students.Student_details') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">{{ trans('students.Attachments') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{ trans('students.name') }}</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">{{ trans('students.email') }}</th>
                                            <td>{{ $student->email }}</td>
                                            <th scope="row">{{ trans('students.gender') }}</th>
                                            <td>{{ $student->gender->name }}</td>
                                            <th scope="row">{{ trans('students.Nationality') }}</th>
                                            <td>{{ $student->nationality->name }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{ trans('students.Grade') }}</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">{{ trans('students.classrooms') }}</th>
                                            <td>{{ $student->classroom->class_name }}</td>
                                            <th scope="row">{{ trans('students.section') }}</th>
                                            <td>{{ $student->section->section_name }}</td>
                                            <th scope="row">{{ trans('students.Date_of_Birth') }}</th>
                                            <td>{{ $student->date_birth }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{ trans('students.parent') }}</th>
                                            <td>{{ $student->parent->name_father }}</td>
                                            <th scope="row">{{ trans('students.academic_year') }}</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('students.upload_attachment') }}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="academic_year">{{ trans('students.Attachments') }}:
                                                            <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple
                                                               required class="form-control">
                                                        <input type="hidden" name="student_name"
                                                               value="{{ $student->name }}">
                                                        <input type="hidden" name="student_id"
                                                               value="{{ $student->id }}">
                                                        <small class="text-muted">يمكنك اختيار صور متعددة</small>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    {{ trans('students.submit') }}
                                                </button>
                                            </form>
                                        </div>
                                        <br>

                                        @if ($student->images && $student->images->count() > 0)
                                            <!-- Gallery View -->
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <h5>{{ trans('students.image_gallery') ?? 'معرض الصور' }}</h5>
                                                    <div class="row">
                                                        @foreach ($student->images as $attachment)
                                                            <div class="col-md-3 mb-3">
                                                                <div class="card">
                                                                    @php
                                                                        $imagePath = public_path($attachment->url);
                                                                    @endphp
                                                                    @if (file_exists($imagePath))
                                                                        <img src="{{ asset($attachment->url) }}"
                                                                             class="card-img-top"
                                                                             style="height: 200px; object-fit: cover;"
                                                                             data-toggle="modal"
                                                                             data-target="#imageModal{{ $attachment->id }}"
                                                                             style="cursor: pointer;">
                                                                    @else
                                                                        <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                                                             style="height: 200px;">
                                                                            <span class="text-danger">صورة مفقودة</span>
                                                                        </div>
                                                                    @endif
                                                                    <div class="card-body p-2">
                                                                        <h6 class="card-title text-truncate">
                                                                            {{ basename($attachment->url) }}</h6>
                                                                        <small
                                                                            class="text-muted">{{ $attachment->created_at->diffForHumans() }}</small>
                                                                        <div class="btn-group w-100 mt-2">
                                                                            <a class="btn btn-primary btn-sm"
                                                                               href="{{ asset($attachment->url) }}"
                                                                               target="_blank">
                                                                                <i class="fas fa-eye"></i> معاينة
                                                                            </a>
                                                                            <a class="btn btn-success btn-sm"
                                                                               href="{{ asset($attachment->url) }}"
                                                                               download="{{ basename($attachment->url) }}">
                                                                                <i class="fas fa-download"></i> تحميل
                                                                            </a>
                                                                            <button type="button"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#Delete_img{{ $attachment->id }}">
                                                                                <i class="fas fa-trash"></i> حذف
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Image Modal -->
                                                            <div class="modal fade" id="imageModal{{ $attachment->id }}"
                                                                 tabindex="-1" role="dialog">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">
                                                                                {{ basename($attachment->url) }}</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal">
                                                                                <span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body text-center">
                                                                            @if (file_exists(public_path($attachment->url)))
                                                                                <img src="{{ asset($attachment->url) }}"
                                                                                     class="img-fluid">
                                                                            @else
                                                                                <p class="text-danger">الصورة غير موجودة
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-success"
                                                                               href="{{ asset($attachment->url) }}"
                                                                               download="{{ basename($attachment->url) }}">
                                                                                <i class="fas fa-download"></i> تحميل
                                                                            </a>
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">إغلاق
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Table View -->
                                            <table class="table center-aligned-table mb-0 table table-hover"
                                                   style="text-align:center">
                                                <thead>
                                                <tr class="table-secondary">
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ trans('students.filename') }}</th>
                                                    <th scope="col">{{ trans('students.created_at') }}</th>
                                                    <th scope="col">{{ trans('students.Processes') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($student->images as $attachment)
                                                    <tr style='text-align:center;vertical-align:middle'>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ basename($attachment->url) }}</td>
                                                        <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-outline-primary btn-sm"
                                                                   href="{{ asset($attachment->url) }}"
                                                                   target="_blank" title="معاينة">
                                                                    <i class="fas fa-eye"></i> معاينة
                                                                </a>
                                                                <a class="btn btn-outline-success btn-sm"
                                                                   href="{{ asset($attachment->url) }}"
                                                                   download="{{ basename($attachment->url) }}"
                                                                   title="تحميل">
                                                                    <i class="fas fa-download"></i> تحميل
                                                                </a>
                                                                <button type="button"
                                                                        class="btn btn-outline-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#Delete_img{{ $attachment->id }}"
                                                                        title="{{ trans('tables.delete') }}">
                                                                    <i class="fas fa-trash"></i>
                                                                    {{ trans('students.delete') }}
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('pages.students.delete_img')
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert alert-info text-center">
                                                <i class="fas fa-info-circle"></i>
                                                لا توجد صور مرفوعة لهذا الطالب
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- row closed -->
@endsection

@section('js')

@endsection
