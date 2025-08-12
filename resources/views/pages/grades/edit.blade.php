<div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $grade->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="editModalLabel{{ $grade->id }}">
                    {{ trans('grades.edit_grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('grades.update', $grade->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name_ar{{ $grade->id }}"
                                class="mr-sm-2">{{ trans('grades.grade_name_ar') }}:</label>
                            <input id="Name_ar{{ $grade->id }}" type="text" name="name[ar]" class="form-control"
                                value="{{ old('name.ar', $grade->getTranslation('name', 'ar')) }}" required>
                        </div>
                        <div class="col">
                            <label for="Name_en{{ $grade->id }}"
                                class="mr-sm-2">{{ trans('grades.grade_name_en') }}:</label>
                            <input type="text" class="form-control"
                                value="{{ old('name.en', $grade->getTranslation('name', 'en')) }}"
                                id="Name_en{{ $grade->id }}" name="name[en]" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status{{ $grade->id }}"
                            class="mr-sm-2">{{ trans('grades.grade_status') }}:</label>
                        <select class="form-control" name="status" id="status{{ $grade->id }}" required>
                            <option value="active" @selected(old('status', $grade->status) == 'active')>
                                {{ trans('grades.active') }}</option>
                            <option value="inactive" @selected(old('status', $grade->status) == 'inactive')>
                                {{ trans('grades.inactive') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="grade_notes_ar{{ $grade->id }}">{{ trans('grades.grade_notes_ar') }}:</label>
                        <textarea class="form-control" name="notes[ar]" id="grade_notes_ar{{ $grade->id }}" rows="3">{{ old('notes.ar', $grade->getTranslation('notes', 'ar')) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="grade_notes_en{{ $grade->id }}">{{ trans('grades.grade_notes_en') }}:</label>
                        <textarea class="form-control" name="notes[en]" id="grade_notes_en{{ $grade->id }}" rows="3">{{ old('notes.en', $grade->getTranslation('notes', 'en')) }}</textarea>
                    </div>

                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('tables.cancel') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('tables.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
