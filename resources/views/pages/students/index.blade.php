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
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('tables.actions')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('students.show',$student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; عرض بيانات الطالب</a>
                                                            <a class="dropdown-item" href="{{route('students.edit',$student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; تعديل بيانات الطالب</a>
                                                            <a class="dropdown-item" href="{{ route('fees-invoices.show',$student->id) }}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;اضافة فاتورة رسوم&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('recept-students.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند قبض</a>
                                                            <a class="dropdown-item" data-target="#delete_{{ $student->id }}" data-toggle="modal" href="#delete_{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp; حذف بيانات الطالب</a>
                                                        </div>
                                                    </div>
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
