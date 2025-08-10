<div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Grades_trans.edit_Grade') }}
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
                            <label for="Name" class="mr-sm-2">{{ trans('grades.grade_name_ar') }}:</label>
                            <input id="Name_ar" type="text" name="name_ar" class="form-control"
                                   value="{{ old('name_ar', $grade->getTranslation('name', 'ar')) }}" required>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('grades.grade_name_en') }}
                                :</label>
                            <input type="text" class="form-control"
                                   value="{{ old('name_en', $grade->getTranslation('name', 'en')) }}" id="Name_en"
                                   name="name_en" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="mr-sm-2">{{ trans('grades.grade_status') }}:</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="active" @selected(old('status', $grade->status) == 'active' )>
                                {{ trans('grades.active') }}</option>
                            <option value="inactive" @selected(old('status', $grade->status) =='inactive' )>
                                {{ trans('grades.inactive') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('grades.grade_notes') }}:</label>
                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->notes }}</textarea>
                    </div>
                    <br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
