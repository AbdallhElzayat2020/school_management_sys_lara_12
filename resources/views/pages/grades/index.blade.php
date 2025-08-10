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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#createGradeModal">
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
                                        <td>{{ $grade->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>
                                            @if ($grade->status == 'active')
                                                <span class="badge badge-success">{{ trans('grades.active') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ trans('grades.inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $grade->getTranslation('notes', app()->getLocale()) }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-info mx-1" data-toggle="modal"
                                                data-target="#edit{{ $grade->id }}"
                                                title="{{ trans('grades.edit_grade') }}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger mx-1" data-toggle="modal"
                                                data-target="#delete_grade{{ $grade->id }}"
                                                title="{{ trans('grades.delete_grade') }}">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <button type="button" class="btn btn-info mx-1" data-toggle="modal"
                                                data-target="#change_status_{{ $grade->id }}">
                                                @if ($grade->status == 'active')
                                                    <span class="badge badge-success p-1"
                                                        style="font-size: 18px!important;">
                                                        <i class="fas fa-ban"></i>
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger p-1" style="font-size: 18px!important;">
                                                        <i class="fas fa-play"></i>
                                                    </span>
                                                @endif
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Models Popups  -->
                                    @include('pages.grades.edit')
                                    @include('pages.grades.delete')
                                    @include('pages.grades.change_status')
                                    <!-- Models Popups  -->

                                @empty
                                    <tr>
                                        <td colspan="5">{{ __('tables.no_found') }}</td>
                                    </tr>
                                @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Initialize Bootstrap modals
            $('[data-toggle="modal"]').on('click', function() {
                var target = $(this).data('target');
                $(target).modal('show');
            });

            // Handle modal close buttons
            $('[data-dismiss="modal"]').on('click', function() {
                $(this).closest('.modal').modal('hide');
            });

            // Handle modal backdrop click
            $('.modal').on('click', function(e) {
                if (e.target === this) {
                    $(this).modal('hide');
                }
            });

            // Handle escape key
            $(document).on('keydown', function(e) {
                if (e.keyCode === 27) { // ESC key
                    $('.modal.show').modal('hide');
                }
            });
        });
    </script>
@endsection
