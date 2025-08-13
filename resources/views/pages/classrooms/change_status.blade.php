<div class="modal fade" id="change_status_{{ $classroom->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('classroom.change-status', $classroom->id) }}" method="post">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ __('tables.change_status_warning') }}
                        <span class="text-danger">{{ $classroom->getTranslation('class_name', app()->getLocale()) }}</span>
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="button"
                            data-dismiss="modal">{{ __('tables.cancel') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('tables.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
