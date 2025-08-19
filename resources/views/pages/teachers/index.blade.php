@extends('layouts.master')
@section('title', __('classrooms.page_title'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('classrooms.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('dashboard.dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('classrooms.classrooms') }}</li>
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#createClassroomModal">
                        {{ trans('tables.add') }}
                    </button>
                    <br><br>

                    {{-- Create Model --}}
                    @include('pages.classrooms.create')
                    {{-- Create Model --}}

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)"/></th>
                                <th>#</th>
                                <th>{{ trans('classrooms.class_name') }}</th>
                                <th>{{ trans('classrooms.status') }}</th>
                                <th>{{ trans('classrooms.grade_name') }}</th>
                                <th>{{ trans('tables.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($classrooms as $index=> $classroom)
                                <tr>
                                    <td><input type="checkbox" value="{{ $classroom->id }}" class="box1"></td>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $classroom->getTranslation('class_name', app()->getLocale()) }}</td>
                                    <td>
                                        @if ($classroom->status === 'active')
                                            <span class="badge badge-success">{{ trans('grades.active') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ trans('grades.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $classroom->grade->name }}</td>

                                    {{--  actions --}}
                                    <td class="d-flex justify-content-center align-items-center">

                                        <button type="button" class="btn btn-info mx-1" data-toggle="modal"
                                                data-target="#edit{{ $classroom->id }}"
                                                title="{{ trans('tables.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger mx-1" data-toggle="modal"
                                                data-target="#delete{{ $classroom->id }}"
                                                title="{{ trans('tables.delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <button type="button" class="btn btn-info mx-1" data-toggle="modal"
                                                data-target="#change_status_{{ $classroom->id }}">
                                            @if ($classroom->status == 'active')
                                                <span class="badge badge-success p-1" style="font-size: 18px!important;">
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
                                @include('pages.classrooms.edit')
                                @include('pages.classrooms.delete')
                                @include('pages.classrooms.change_status')
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
    {{--66779944--}}
@endsection
@section('js')
@endsection
