@extends('layouts.master')
@section('title', __('students.students_management'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('students.student') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('dashboard.dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('students.student') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('students.add_student') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('students.name') }}</th>
                                            <th>{{ trans('students.email') }}</th>
                                            <th>{{ trans('students.gender') }}</th>
                                            <th>{{ trans('students.Grade') }}</th>
                                            <th>{{ trans('students.classrooms') }}</th>
                                            <th>{{ trans('students.section') }}</th>
                                            <th>{{ trans('students.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->getTranslation('name', app()->getLocale()) }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->gender->name }}</td>
                                                <td>{{ $student->grade->name }}</td>
                                                <td>{{ $student->classroom->class_name }}</td>
                                                <td>{{ $student->section->section_name }}</td>
                                                <td>
                                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_{{ $student->id }}" title="{{ trans('tables.delete') }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <a href="{{ route('students.show',$student->id) }}" class="btn btn-warning btn-sm mx-1" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @include('pages.students.delete')
                                        @endforeach
                                    </table>
                                </div>
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
