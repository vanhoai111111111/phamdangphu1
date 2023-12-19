@extends('layouts.front')

@section('title',"Edit your Review")


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                  
                        <h5>Bạn đang viết đánh giá cho {{$review->product->brand_name}} {{$review->product->model_name}}</h5>
                        <form action="/update-review" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{$review->id}}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Write a Review">{{$review->user_review}}</textarea>
                            <button type="submit" class="btn btn-primary mt-3">Đánh giá cập nhật</button>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection