<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Delete Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('graduated-student.destroy',$student->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <h5 style="font-family: 'Cairo', sans-serif;">Are you sure you want to delete</h5>
                    <input type="text" readonly value="{{$student->name}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button class="btn btn-danger">{{trans('tables.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
