<div class="modal fade" id="createClassroomModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
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
                <form class="row" action="{{ route('classrooms.store') }}" method="POST">
                    @csrf
                    <div class="repeater w-100">
                        <div data-repeater-list="List_Classes">
                            <div data-repeater-item>
                                <div class="container">
                                    <div class="row d-flex align-items-center justify-content-between">

                                        <!-- Class Name AR -->
                                        <div class="col-md-3">
                                            <label for="class_name_ar" style="font-family: Cairo, sans-serif"
                                                   class="form-label fw-bold">{{ trans('classrooms.class_name_ar') }}:</label>
                                            <input class="form-control form-control-lg" id="class_name_ar"
                                                   type="text" value="{{ old('class_name.ar') }}"
                                                   name="class_name[ar]"/>
                                        </div>

                                        <!-- Class Name EN -->
                                        <div class="col-md-3">
                                            <label for="class_name_en" style="font-family: Cairo, sans-serif"
                                                   class="form-label fw-bold">{{ trans('classrooms.class_name_en') }}:</label>
                                            <input class="form-control form-control-lg" type="text"
                                                   value="{{ old('class_name.en') }}" name="class_name[en]"/>
                                        </div>

                                        <!-- Grade Select -->
                                        <div class="col-md-4">
                                            <label for="grade_id" style="font-family: Cairo, sans-serif"
                                                   class="form-label font-weight-bold">{{ trans('grades.grade_name') }}:</label>
                                            <select class="form-control form-control-lg" name="grade_id" id="grade_id"
                                                    style="min-width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <option value="">{{ trans('grades.grade_name') }}</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}"
                                                            {{ old('grade_id') == $grade->id ? 'selected' : '' }}
                                                            title="{{ $grade->getTranslation('name', app()->getLocale()) }}">
                                                        {{ $grade->getTranslation('name', app()->getLocale()) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Delete Button -->
                                        <div class="col-md-1 d-flex justify-content-center">
                                            <button class="btn btn-danger btn-sm" data-repeater-delete type="button">
                                                {{ trans('tables.delete') }}
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <!-- Add New Row Button -->
                            <div class="row mt-4">
                                <div class="col-lg-3">
                                    <button class="btn btn-success btn-lg w-100" data-repeater-create type="button">
                                        {{ trans('tables.add') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">
                                {{ trans('tables.cancel') }}
                            </button>
                            <button type="submit" class="btn btn-success btn-lg">
                                {{ trans('tables.save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
