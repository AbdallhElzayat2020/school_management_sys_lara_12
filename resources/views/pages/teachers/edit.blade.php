@extends('layouts.master')
@section('title', __('teachers.teachers'))
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('teachers.update', $teacher->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('teachers.Email') }}</label>
                                        <input type="email" name="email" value="{{ old('email', $teacher->email) }}"
                                               class="form-control">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{ trans('teachers.Password') }}</label>
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{ trans('teachers.password_confirmation') }}</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                        @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>


                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('teachers.Name_ar') }}</label>
                                        <input type="text" name="name[ar]"
                                               value="{{ old('name.ar', $teacher->getTranslation('name','ar')) }}" class="form-control">
                                        @error('name.ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{ trans('teachers.Name_en') }}</label>
                                        <input type="text" name="name[en]"
                                               value="{{ old('name.en',$teacher->getTranslation('name','en')) }}" class="form-control">
                                        @error('name.en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputCity">{{ trans('teachers.specialization') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                            <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $specialization->id }}"
                                                    {{ $specialization->id == old('specialization_id', $teacher->specialization_id) ? 'selected' : '' }}>
                                                    {{ $specialization->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('specialization_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputState">{{ trans('teachers.Gender') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                            <option selected disabled>{{ trans('parents.Choose') }}...</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}"
                                                    {{ $gender->id == old('gender_id', $teacher->gender_id) ? 'selected' : '' }}>
                                                    {{ $gender->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('teachers.Joining_Date') }}</label>
                                        <div class='input-group date'>
                                            <input class="form-control" type="text" id="datepicker-action"
                                                   name="join_date" value="{{ old('join_date', $teacher->join_date) }}"
                                                   data-date-format="yyyy-mm-dd">
                                        </div>
                                        @error('join_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ trans('teachers.Address') }}</label>
                                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="4">{{ old('address', $teacher->address) }}</textarea>
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{ trans('tables.save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
