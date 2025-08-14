<div class="modal fade" id="btn_delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('My_Classes_trans.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete-all') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    {{ trans('tables.warning_delete') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('tables.cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('tables.delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
