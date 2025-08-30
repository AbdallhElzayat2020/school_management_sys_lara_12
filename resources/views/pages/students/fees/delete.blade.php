<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Fee{{ $fee->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('sections.Delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('student-fees.destroy', $fee->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $fee->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">Are you sure you want to delete this fee?</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('sections.Close') }}</button>
                        <button class="btn btn-danger">{{ trans('tables.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
