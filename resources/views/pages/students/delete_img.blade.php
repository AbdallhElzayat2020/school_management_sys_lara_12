<!-- Delete Image Modal -->
<div class="modal fade" id="Delete_img{{ $attachment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('students.Delete_attachment') ?? 'حذف المرفق' }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('students.delete_attachment') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $attachment->id }}">
                    <input type="hidden" name="student_name" value="{{ $student->name }}">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">

                    <div class="text-center mb-3">
                        @php
                            $imagePath = public_path($attachment->url);
                        @endphp
                        @if (file_exists($imagePath))
                            <img src="{{ asset($attachment->url) }}" class="img-thumbnail" style="max-height: 150px;">
                        @endif
                    </div>

                    <h5 style="font-family: 'Cairo', sans-serif;">
                        {{ trans('students.Delete_attachment_tilte') ?? 'هل أنت متأكد من حذف هذا المرفق؟' }}
                    </h5>
                    <input type="text" name="filename" readonly value="{{ basename($attachment->url) }}"
                        class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ trans('students.Close') ?? 'إلغاء' }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> {{ trans('students.submit') ?? 'حذف' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
