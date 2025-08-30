@extends('layouts.master')
@section('title', 'Student Fees')

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{ route('student-fees.create') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة رسوم جديدة</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>المبلغ</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>الصف الدراسي</th>
                                            <th>السنة الدراسية</th>
                                            <th>ملاحظات</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($fees as $fee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $fee->title }}</td>
                                                <td>{{ number_format($fee->amount, 2) }}</td>
                                                <td>{{ $fee->grade->name }}</td>
                                                <td>{{ $fee->classroom->class_name }}</td>
                                                <td>{{ $fee->academic_year }}</td>
                                                <td>{{ $fee->notes }}</td>
                                                <td>
                                                    <a href="{{ route('student-fees.edit', $fee->id) }}"
                                                       class="btn btn-info btn-sm" role="button"
                                                       aria-pressed="true"><i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @include('pages.students.fees.delete')
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
