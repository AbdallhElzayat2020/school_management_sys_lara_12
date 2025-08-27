<div class="modal fade" id="delete_{{ $student->id }}" tabindex="-1" role="dialog"
     aria-labelledby="deleteModalLabel{{ $student->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="deleteModalLabel{{ $student->id }}">
                    <b style="font-size: 22px!important;"> {{ trans('tables.warning_delete') }}</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    {{ trans('tables.warning_delete') }} {{ $student->getTranslation('name', app()->getLocale()) }} ?
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ trans('tables.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ trans('tables.delete') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
