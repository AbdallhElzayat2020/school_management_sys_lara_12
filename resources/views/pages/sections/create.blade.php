<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                    id="exampleModalLabel">
                    {{ trans('sections.add_section') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('sections.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="section_name[ar]" class="form-control" placeholder="{{ trans('sections.Section_name_ar') }}">
                        </div>

                        <div class="col">
                            <input type="text" name="section_name[en]" class="form-control" placeholder="{{ trans('sections.Section_name_en') }}">
                        </div>
                    </div>
                    <br>


                    <div class="col">
                        <label for="inputName"
                               class="control-label">{{ trans('sections.Name_Grade') }}</label>
                        <select name="grade_id" class="custom-select" onchange="console.log($(this).val())">
                            <!--placeholder-->
                            <option value="" selected disabled>{{ trans('sections.Select_Grade') }}</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}"> {{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName"
                               class="control-label">{{ trans('sections.Name_Class') }}</label>
                        <select name="classroom_id" class="custom-select"></select>
                    </div>

                    <div class="col">
                        <label for="inputName" class="control-label">{{ trans('teachers.Name_Teacher') }}</label>
                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->getTranslation('name',app()->getLocale())}}</option>
                            @endforeach
                        </select>
                    </div>

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
