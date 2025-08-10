@extends('layouts.master')
@section('title', __('grades.grades'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('grades.grades') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('dashboard.dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('grades.grades') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
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

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('grades.add_grade') }}
                    </button>
                    <br><br>

                    @include('pages.grades.create')

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('grades.grade_name') }}</th>
                                <th>{{ trans('grades.grade_status') }}</th>
                                <th>{{ trans('grades.grade_notes') }}</th>
                                <th>{{ trans('grades.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($grades as $index=> $grade)
                                <tr>

                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $grade->getTranslation('name',app()->getLocale()) }}</td>
                                    <td>
                                        @if ($grade->status === 'active')
                                            <span class="badge badge-success">{{ trans('grades.active') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ trans('grades.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $grade->notes }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $grade->id }}"
                                                title="{{ trans('grades.edit_grade') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $grade->id }}"
                                                title="{{ trans('grades.delete_grade') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                @include('pages.grades.edit')

                                <!-- delete_modal_Grade -->
                                @include('pages.grades.delete')

                            @empty
                                <tr>
                                    <td colspan="5">{{__('tables.no_found')}}</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_Grade -->
        @include('pages.grades.create')

    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
