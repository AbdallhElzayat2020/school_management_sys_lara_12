@extends('layouts.master')
@section('title', 'Parent Details')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-lg-12">
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('parents.Email') }}</label>
                                <input type="email" disabled value="{{ $parent->email }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('parents.Name_Father') }}</label>
                                <input type="text" disabled value="{{ $parent->name_father }}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('parents.Name_Father_en') }}</label>
                                <input type="text" disabled value="{{ $parent->name_father_en }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="title">{{ trans('parents.Job_Father') }}</label>
                                <input type="text" disabled value="{{ $parent->job_father }}" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="title">{{ trans('parents.Job_Father_en') }}</label>
                                <input type="text" disabled value="{{ $parent->job_father_en }}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('parents.National_ID_Father') }}</label>
                                <input type="text" disabled value="{{ $parent->national_id_father }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('parents.Passport_ID_Father') }}</label>
                                <input type="text" disabled value="{{ $parent->passport_id_father }}"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('parents.Phone_Father') }}</label>
                                <input type="text" disabled value="{{ $parent->phone_father }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">{{ trans('parents.Nationality_Father_id') }}</label>
                                <select disabled class="custom-select my-1 mr-sm-2">
                                    <option selected>{{ trans('parents.Choose') }}...</option>
                                    @foreach ($Nationalities as $National)
                                        <option @selected($parent->nationality_father_id == $National->id) value="{{ $National->id }}">
                                            {{ $National->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">{{ trans('parents.Blood_Type_Father_id') }}</label>
                                <select disabled class="custom-select my-1 mr-sm-2">
                                    <option selected>{{ trans('parents.Choose') }}...</option>
                                    @foreach ($Type_Bloods as $Type_Blood)
                                        <option @selected($parent->blood_type_father_id == $Type_Blood->id) value="{{ $Type_Blood->id }}">
                                            {{ $Type_Blood->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">{{ trans('parents.Religion_Father_id') }}</label>
                                <select disabled class="custom-select my-1 mr-sm-2">
                                    <option selected>{{ trans('parents.Choose') }}...</option>
                                    @foreach ($Religions as $Religion)
                                        <option @selected($parent->religion_father_id == $Religion->id) value="{{ $Religion->id }}">
                                            {{ $Religion->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('parents.Address_Father') }}</label>
                            <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="4">{{ $parent->address_father }}</textarea>
                        </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('parents.Name_Mother') }}</label>
                                <input type="text" disabled value="{{ $parent->name_mother }}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('parents.Name_Mother_en') }}</label>
                                <input type="text" disabled value="{{ $parent->name_mother_en }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="title">{{ trans('parents.Job_Mother') }}</label>
                                <input type="text" disabled value="{{ $parent->job_mother }}" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="title">{{ trans('parents.Job_Mother_en') }}</label>
                                <input type="text" disabled value="{{ $parent->job_mother_en }}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('parents.National_ID_Mother') }}</label>
                                <input type="text" disabled value="{{ $parent->national_id_mother }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('parents.Passport_ID_Mother') }}</label>
                                <input type="text" disabled value="{{ $parent->passport_id_mother }}"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('parents.Phone_Mother') }}</label>
                                <input type="text" disabled value="{{ $parent->phone_mother }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">{{ trans('parents.Nationality_Mother_id') }}</label>
                                <select disabled class="custom-select my-1 mr-sm-2">
                                    <option selected>{{ trans('parents.Choose') }}...</option>
                                    @foreach ($Nationalities as $National)
                                        <option @selected($parent->nationality_mother_id == $National->id)>{{ $National->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">{{ trans('parents.Blood_Type_Mother_id') }}</label>
                                <select disabled class="custom-select my-1 mr-sm-2">
                                    <option selected>{{ trans('parents.Choose') }}...</option>
                                    @foreach ($Type_Bloods as $Type_Blood)
                                        <option @selected($parent->blood_type_mother_id == $Type_Blood->id)>{{ $Type_Blood->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">{{ trans('parents.Religion_Mother_id') }}</label>
                                <select disabled class="custom-select my-1 mr-sm-2">
                                    <option selected>{{ trans('parents.Choose') }}...</option>
                                    @foreach ($Religions as $Religion)
                                        <option @selected($parent->religion_mother_id == $Religion->id)>{{ $Religion->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea2">{{ trans('parents.Address_Mother') }}</label>
                            <textarea disabled class="form-control" id="exampleFormControlTextarea2" rows="4">{{ $parent->address_mother }}</textarea>
                        </div>
                    </div>

                    <hr>

                    <div class="col-lg-12 mt-3">
                        <h5>{{ __('parents.Attachments') }}</h5>
                        <div class="row">
                            @forelse ($parent->images as $image)
                                <div class="col-md-2 mb-2 text-center">
                                    <a href="{{ asset('parentAttachments/' . $image->url) }}" target="_blank">
                                        <img src="{{ asset('parentAttachments/' . $image->url) }}" alt="image"
                                            class="img-fluid img-thumbnail" style="max-height:120px;">
                                    </a>
                                </div>
                            @empty
                                <p>{{ __('tables.no_found') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
