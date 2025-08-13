<div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="createModalLabel">
                    {{ trans('classrooms.classrooms') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('classrooms.update',$classroom->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="class_name_ar"
                                   class="mr-sm-2">{{ trans('classrooms.class_name_ar') }}
                                :</label>
                            <input id="class_name_ar" type="text" name="class_name[ar]"
                                   class="form-control"
                                   value="{{ $classroom->getTranslation('class_name', 'ar') }}"
                                   required>
                        </div>
                        <div class="col">
                            <label for="class_name_en" class="mr-sm-2">
                                {{ trans('classrooms.class_name_en') }}:
                            </label>
                            <input type="text" class="form-control"
                                   value="{{ $classroom->getTranslation('class_name', 'en') }}"
                                   name="class_name[en]" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('classrooms.grade_name') }}:</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="grade_id">
                            @foreach ($grades as $geade)
                                <option @selected(old('grade_id', $classroom->grade_id) == $geade->id) value="{{ $geade->id }}">
                                    {{ $geade->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ trans('tables.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-success">
                            {{ trans('tables.save') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
