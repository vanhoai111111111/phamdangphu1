@extends('layouts.admin')
@section('title')
    Add Category

@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thêm thể loại</h4>
        </div>
        <div class="card-body">
            <form action="{{url ('insert-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Miêu tả</label>
                    <textarea name="description" rows="3" class="form-control"></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Trạng thái(Hoạt động/Không hoạt động)</label>
                    <input type="checkbox" name="status">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Phổ biến</label>
                    <input type="checkbox" name="popular">
                </div>

                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div><br/><br/>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Nộp</button>
                </div>
            </div>
            </form>
        </div>
    </div>    
@endsection