@extends('layouts.front')

@section('title',"Write a Review")


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchase->count()>0)
                        <h5>Bạn đang viết đánh giá cho {{$product->brand_name}} {{$product->model_name}}</h5>
                        <form action="/add-review" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Biết đánh giá"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Gửi đánh giá</button>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            <h5>Bạn không thể viết đánh giá cho sản phẩm này</h5>
                            <p>
                                Vì chỉ dành cho khách hàng đã mua.
                            </p>
                            <a href="{{url('/')}}" class="btn btn-primary mt-3">Trở về</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection