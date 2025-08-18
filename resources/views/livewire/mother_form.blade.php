<div>
    @if ($currentStep == 2)
        <div class="row setup-content" id="step-2">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ trans('parents.Name_Mother') }}</label>
                            <input type="text" wire:model="name_mother" class="form-control">
                            @error('name_mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ trans('parents.Name_Mother_en') }}</label>
                            <input type="text" wire:model="name_mother_en" class="form-control">
                            @error('name_mother_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="title">{{ trans('parents.Job_Mother') }}</label>
                            <input type="text" wire:model="job_mother" class="form-control">
                            @error('job_mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="title">{{ trans('parents.Job_Mother_en') }}</label>
                            <input type="text" wire:model="job_mother_en" class="form-control">
                            @error('job_mother_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="title">{{ trans('parents.National_ID_Mother') }}</label>
                            <input type="text" wire:model="national_id_mother" class="form-control">
                            @error('national_id_mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ trans('parents.Passport_ID_Mother') }}</label>
                            <input type="text" wire:model="passport_id_mother" class="form-control">
                            @error('passport_id_mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="title">{{ trans('parents.Phone_Mother') }}</label>
                            <input type="text" wire:model="phone_mother" class="form-control">
                            @error('phone_mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">{{ trans('parents.Nationality_Mother_id') }}</label>
                            <select class="custom-select my-1 mr-sm-2" wire:model="nationality_mother_id">
                                <option selected>{{ trans('parents.Choose') }}...</option>
                                @foreach ($Nationalities as $National)
                                    <option value="{{ $National->id }}">{{ $National->name }}</option>
                                @endforeach
                            </select>
                            @error('nationality_mother_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputState">{{ trans('parents.Blood_Type_Mother_id') }}</label>
                            <select class="custom-select my-1 mr-sm-2" wire:model="blood_type_mother_id">
                                <option selected>{{ trans('parents.Choose') }}...</option>
                                @foreach ($Type_Bloods as $Type_Blood)
                                    <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->name }}</option>
                                @endforeach
                            </select>
                            @error('blood_type_mother_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">{{ trans('parents.Religion_Mother_id') }}</label>
                            <select class="custom-select my-1 mr-sm-2" wire:model="religion_mother_id">
                                <option selected>{{ trans('parents.Choose') }}...</option>
                                @foreach ($Religions as $Religion)
                                    <option value="{{ $Religion->id }}">{{ $Religion->name }}</option>
                                @endforeach
                            </select>
                            @error('religion_mother_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('parents.Address_Mother') }}</label>
                        <textarea class="form-control" wire:model="address_mother" id="exampleFormControlTextarea1" rows="4"></textarea>
                        @error('address_mother')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-danger btn-sm mx-1 nextBtn btn-lg pull-right" type="button"
                        wire:click="back(1)">
                        {{ trans('parents.Back') }}
                    </button>

                    <button class="btn btn-success btn-sm mx-1 nextBtn btn-lg pull-right" type="button"
                        wire:click="secondStepSubmit">{{ trans('parents.Next') }}</button>

                </div>
            </div>
        </div>
    @endif
</div>
