@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ __('sections.title_page') }}
@stop
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('tables.add') }}</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($grades as $grade)
                                <div class="acd-group">
                                    <a href="#"
                                        class="acd-heading">{{ $grade->getTranslation('name', app()->getLocale()) }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                    <tr class="text-dark">
                                                                        <th>#</th>
                                                                        <th>{{ trans('sections.Name_Section') }}</th>
                                                                        <th>{{ trans('sections.Name_Class') }}</th>
                                                                        <th>{{ trans('sections.Status') }}</th>
                                                                        <th>{{ trans('tables.actions') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($grade->sections as $section)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $section->section_name }}</td>
                                                                            <td>{{ $section->classroom->class_name }}
                                                                            </td>
                                                                            <td>
                                                                                @if ($section->status === 'active')
                                                                                    <label
                                                                                        class="badge badge-success">{{ trans('grades.active') }}</label>
                                                                                @else
                                                                                    <label
                                                                                        class="badge badge-danger">{{ trans('grades.inactive') }}</label>
                                                                                @endif

                                                                            </td>
                                                                            <td>

                                                                                <a href="#"
                                                                                    class="btn btn-outline-info btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#edit{{ $section->id }}">
                                                                                    {{ trans('tables.edit') }}
                                                                                </a>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-danger btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete{{ $section->id }}">
                                                                                    {{ trans('tables.delete') }}
                                                                                </a>
                                                                                <button type="button"
                                                                                    class="btn btn-info mx-1"
                                                                                    data-toggle="modal"
                                                                                    data-target="#change_status_{{ $section->id }}">
                                                                                    @if ($section->status == 'active')
                                                                                        <span
                                                                                            style="font-size: 18px!important;">
                                                                                            <i class="fas fa-ban"></i>
                                                                                        </span>
                                                                                    @else
                                                                                        <span
                                                                                            style="font-size: 18px!important;">
                                                                                            <i class="fas fa-play"></i>
                                                                                        </span>
                                                                                    @endif
                                                                                </button>
                                                                            </td>
                                                                        </tr>


                                                                        {{--  edit Modal  --}}
                                                                        {{-- @include('pages.sections.edit')


                                                                        <!-- delete_modal_Grade -->
                                                                        @include('pages.sections.delete')
                                                                        @include('pages.sections.change_status') --}}
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- create Model --}}
                @include('pages.sections.create')

            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="grade_id"]').on('change', function() {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('get-classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="classroom_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="classroom_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
