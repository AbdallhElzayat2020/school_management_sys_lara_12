@extends('layouts.master')
@section('title', 'Parents Page')
@section('css')

    @livewireStyles
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Parents</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Parent Management</li>
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
                    <a class="btn btn-success btn-sm btn-lg pull-right" href="{{ route('parents.create') }}" type="button">
                        {{ trans('parents.add_parent') }}
                    </a>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr class="table-success">
                                    <th>#</th>
                                    <th>{{ trans('parents.Email') }}</th>
                                    <th>{{ trans('parents.Name_Father') }}</th>
                                    <th>{{ trans('parents.National_ID_Father') }}</th>
                                    <th>{{ trans('parents.Passport_ID_Father') }}</th>
                                    <th>{{ trans('parents.Phone_Father') }}</th>
                                    <th>{{ trans('parents.Job_Father') }}</th>
                                    <th>{{ trans('grades.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($my_parents as $index => $my_parent)
                                    <tr>

                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $my_parent->email }}</td>
                                        <td>{{ $my_parent->name_father }}</td>
                                        <td>{{ $my_parent->national_id_father }}</td>
                                        <td>{{ $my_parent->passport_id_father }}</td>
                                        <td>{{ $my_parent->phone_father }}</td>
                                        <td>{{ $my_parent->job_father }}</td>
                                        <td>
                                            <button wire:click="edit({{ $my_parent->id }})"
                                                title="{{ trans('tables.edit') }}" class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $my_parent->id }})"
                                                title="{{ trans('tables.delete') }}"><i class="fa fa-trash"></i>
                                            </button>
                                            <a href="{{ route('parents.show', $my_parent->id) }}"
                                                class="btn btn-info btn-sm" title="{{ trans('tables.show') }}"><i
                                                    class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @livewireScripts
@endsection
