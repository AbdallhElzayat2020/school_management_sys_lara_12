<div class="modal fade" id="delete_grade{{ $grade->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel{{ $grade->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="deleteModalLabel{{ $grade->id }}">
                    {{ trans('tables.warning_delete') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grades.destroy', $grade->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    {{ trans('tables.warning_delete') }} {{ $grade->getTranslation('name', app()->getLocale()) }} ?
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('tables.cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('tables.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
