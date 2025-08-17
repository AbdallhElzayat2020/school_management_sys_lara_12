<div>
    @if ($successMessage)
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    {{-- @if (session('successMessage'))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('successMessage') }}
        </div>
    @endif --}}

    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('parents.Step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('parents.Step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                    disabled="disabled">3</a>
                <p>{{ trans('parents.Step3') }}</p>
            </div>
        </div>
    </div>

    @include('livewire.father_form')

    @include('livewire.mother_form')


    @if ($currentStep == 3)
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حفظ البيانات ؟</h3><br>
                    <button class="btn btn-danger btn-sm mx-1 nextBtn btn-lg pull-right" type="button"
                        wire:click="back(2)">{{ trans('parents.Back') }}</button>
                    <button class="btn btn-success btn-sm mx-1 btn-lg pull-right" wire:click="submitForm"
                        type="button">{{ trans('parents.Finish') }}</button>
                </div>
            </div>
        </div>
    @endif


</div>
