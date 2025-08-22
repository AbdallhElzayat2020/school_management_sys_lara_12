@extends('layouts.master')
@section('title', __('teachers.teachers'))
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('teachers.teachers') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('dashboard.dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('teachers.teacher_list') }}</li>
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
                                <a href="{{route('teachers.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('teachers.Add_Teacher') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('teachers.Name_Teacher')}}</th>
                                            <th>{{trans('teachers.Gender')}}</th>
                                            <th>{{trans('teachers.Joining_Date')}}</th>
                                            <th>{{trans('teachers.specialization')}}</th>
                                            <th>{{__('tables.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($teachers as $index=> $teacher)
                                            <tr>

                                                <td>{{ $index + 1 }}</td>
                                                <td>{{$teacher->getTranslation('name',app()->getLocale())}}</td>
                                                <td>{{$teacher->gender->name}}</td>
                                                <td>{{$teacher->join_date}}</td>
                                                <td>{{$teacher->specialization->name}}</td>
                                                <td>
                                                    <a href="{{route('teachers.edit',$teacher->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_{{ $teacher->id }}" title="{{ trans('tables.delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.teachers.delete')
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
