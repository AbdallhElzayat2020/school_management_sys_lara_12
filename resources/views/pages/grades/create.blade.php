<div class="modal fade" id="createGradeModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="createModalLabel">
                    {{ trans('grades.add_grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('grades.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="grade_name_ar" class="mr-sm-2">{{ trans('grades.grade_name_ar') }}:</label>
                            <input id="grade_name_ar" value="{{ old('name.ar') }}" type="text" name="name[ar]"
                                class="form-control">
                        </div>
                        <div class="col">
                            <label for="grade_name_en" class="mr-sm-2">{{ trans('grades.grade_name_en') }}:</label>
                            <input type="text" value="{{ old('name.en') }}" class="form-control" name="name[en]"
                                id="grade_name_en">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="mr-sm-2">{{ trans('grades.grade_status') }}:</label>
                        <select class="form-control" name="status" id="status">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                {{ trans('grades.active') }}</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                {{ trans('grades.inactive') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="grade_notes_ar">{{ trans('grades.grade_notes_ar') }}:</label>
                        <textarea class="form-control" name="notes[ar]" id="grade_notes_ar" rows="3">{{ old('notes.ar') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="grade_notes_en">{{ trans('grades.grade_notes_en') }}:</label>
                        <textarea class="form-control" name="notes[en]" id="grade_notes_en" rows="3">{{ old('notes.en') }}</textarea>
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
