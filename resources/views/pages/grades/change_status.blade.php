<div class="modal fade" id="change_status_{{ $grade->id }}" tabindex="-1" role="dialog"
    aria-labelledby="changeStatusModalLabel{{ $grade->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeStatusModalLabel{{ $grade->id }}">
                    {{ __('tables.change_status_warning') }}
                    <span class="text-danger">{{ $grade->getTranslation('name', app()->getLocale()) }}</span>
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('grade.change-status', $grade->id) }}" method="post">
                    @csrf
                    <p class="text-center">
                        @if ($grade->status == 'active')
                            {{ __('tables.change_to_inactive_warning') }}
                        @else
                            {{ __('tables.change_to_active_warning') }}
                        @endif
                    </p>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button"
                            data-dismiss="modal">{{ __('tables.cancel') }}</button>
                        <button type="submit" class="btn btn-warning">{{ __('tables.change_status') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
