@extends('layouts.master')
@section('title')
    اضافة فاتورة جديدة
@stop
@section('css')
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class=" row mb-30" action="{{ route('fees-invoices.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h3 style="margin-bottom: 30px"> اضافة فاتورة جديدة : {{$student->name}}</h3>
                            <div class="repeater">
                                <div data-repeater-list="List_Fees">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">اسم الطالب</label>
                                                <select class="fancyselect" name="student_id" required>
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">نوع الرسوم</label>
                                                <div class="box">
                                                    <select class="fancyselect" name="fee_id" required>
                                                        <option value="">-- اختار من القائمة --</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">المبلغ</label>
                                                <div class="box">
                                                    <select class="fancyselect" name="amount" required>
                                                        <option value="">-- اختار من القائمة --</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="description" class="mr-sm-2">البيان</label>
                                                <div class="box">
                                                    <input type="text" class="form-control" name="description" required>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{ trans('tables.actions') }}:</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="حذف"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="اضافة"/>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="grade_id" value="{{$student->grade_id}}">
                                <input type="hidden" name="classroom_id" value="{{$student->classroom_id}}">

                                <button type="submit" class="btn btn-primary">تاكيد البيانات</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
