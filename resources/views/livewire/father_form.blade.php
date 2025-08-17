<div>
    @if ($currentStep == 1)
        <div class="row setup-content" id="step-1">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ trans('parents.Email') }}</label>
                            <input type="email" wire:model.live="email" class="form-control">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ trans('parents.Password') }}</label>
                            <input type="password" wire:model.live="password" class="form-control">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ trans('parents.Name_Father') }}</label>
                            <input type="text" wire:model.live="name_father" class="form-control">
                            @error('name_father')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ trans('parents.Name_Father_en') }}</label>
                            <input type="text" wire:model.live="name_father_en" class="form-control">
                            @error('name_father_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="title">{{ trans('parents.Job_Father') }}</label>
                            <input type="text" wire:model.live="job_father" class="form-control">
                            @error('job_father')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="title">{{ trans('parents.Job_Father_en') }}</label>
                            <input type="text" wire:model.live="job_father_en" class="form-control">
                            @error('job_father_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="title">{{ trans('parents.National_ID_Father') }}</label>
                            <input type="text" wire:model.live="national_id_father" class="form-control">
                            @error('national_id_father')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ trans('parents.Passport_ID_Father') }}</label>
                            <input type="text" wire:model.live="passport_id_father" class="form-control">
                            @error('passport_id_father')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="title">{{ trans('parents.Phone_Father') }}</label>
                            <input type="text" wire:model.live="phone_father" class="form-control">
                            @error('phone_father')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">{{ trans('parents.Nationality_Father_id') }}</label>
                            <select class="custom-select my-1 mr-sm-2" wire:model.live="nationality_father_id">
                                <option selected>{{ trans('parents.Choose') }}...</option>
                                @foreach ($Nationalities as $National)
                                    <option value="{{ $National->id }}">{{ $National->name }}</option>
                                @endforeach
                            </select>
                            @error('nationality_father_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputState">{{ trans('parents.Blood_Type_Father_id') }}</label>
                            <select class="custom-select my-1 mr-sm-2" wire:model.live="blood_type_father_id">
                                <option selected>{{ trans('parents.Choose') }}...</option>
                                @foreach ($Type_Bloods as $Type_Blood)
                                    <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->name }}</option>
                                @endforeach
                            </select>
                            @error('blood_type_father_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">{{ trans('parents.Religion_Father_id') }}</label>
                            <select class="custom-select my-1 mr-sm-2" wire:model.live="religion_father_id">
                                <option selected>{{ trans('parents.Choose') }}...</option>
                                @foreach ($Religions as $Religion)
                                    <option value="{{ $Religion->id }}">{{ $Religion->name }}</option>
                                @endforeach
                            </select>
                            @error('religion_father_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('parents.Address_Father') }}</label>
                        <textarea class="form-control" wire:model.live="address_father" id="exampleFormControlTextarea1" rows="4"></textarea>
                        @error('address_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-success btn-sm mx-1 nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                        type="button">{{ trans('parents.Next') }}
                    </button>

                </div>
            </div>
        </div>
    @endif
</div>
