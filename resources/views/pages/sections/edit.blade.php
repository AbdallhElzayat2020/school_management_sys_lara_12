<div class="modal fade"
     id="edit{{ $list_section->id }}"
     tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    style="font-family: 'Cairo', sans-serif;"
                    id="exampleModalLabel">
                    {{ trans('sections.edit_Section') }}
                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form
                    action="{{ route('sections.update',$list_section->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text"
                                   name="section_name[ar]"
                                   class="form-control"
                                   value="{{ $list_section->getTranslation('section_name', 'ar') }}">
                        </div>

                        <div class="col">
                            <input type="text"
                                   name="section_name[en]"
                                   class="form-control"
                                   value="{{ $list_section->getTranslation('section_name', 'en') }}">
                            <input id="id"
                                   type="hidden"
                                   name="id"
                                   class="form-control"
                                   value="{{ $list_section->id }}">
                        </div>
                    </div>
                    <br>


                    <div class="col">
                        <label for="inputName"
                               class="control-label">{{ trans('sections.Name_Grade') }}</label>
                        <select name="grade_id" class="custom-select" onclick="console.log($(this).val())">
                            @foreach ($list_grades as $list_grade)
                                <option @selected(old('grade_id', $list_section->grade_id) == $list_grade->id) value="{{ $list_grade->id }}">
                                    {{ $list_grade->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName" class="control-label">{{ trans('sections.Name_Class') }}</label>
                        <select name="classroom_id" class="custom-select">
                            <option value="{{ $list_section->classroom->id }}">
                                {{ $list_section->classroom->class_name }}
                            </option>
                        </select>
                    </div>
                    <br>

{{--                    <div class="col">--}}
{{--                        <div class="form-check">--}}

{{--                            @if ($list_section->status === 'active')--}}
{{--                                <input type="checkbox" checked class="form-check-input" name="Status" id="exampleCheck1">--}}
{{--                            @else--}}
{{--                                <input type="checkbox" class="form-check-input" name="Status" id="exampleCheck1">--}}
{{--                            @endif--}}
{{--                            <label class="form-check-label" for="exampleCheck1">{{ trans('classrooms.status') }}</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="status{{ $list_section->id }}"
                               class="mr-sm-2">{{ trans('grades.grade_status') }}:</label>
                        <select class="form-control" name="status" id="status{{ $list_section->id }}" required>
                            <option value="active" @selected(old('status', $list_section->status) == 'active')>
                                {{ trans('grades.active') }}
                            </option>
                            <option value="inactive" @selected(old('status', $list_section->status) == 'inactive')>
                                {{ trans('grades.inactive') }}
                            </option>
                        </select>
                    </div>

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
