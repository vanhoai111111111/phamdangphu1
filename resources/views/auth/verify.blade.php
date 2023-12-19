@extends('layouts.front')

@section('title')
  Verify Your Email Address

@endsection

@section('content')
<section class="img js-fullheight" style="background-image: url('{{ asset('assets/uploads/images/fullbg.jpg')}}')">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
      <img src="{{asset('assets/uploads/images/bg.jpg')}}" class="img-fluid" alt="bg image" style="height: 18cm">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
      <div class="row mb-3"><h2 style="color:linen; font-weight: 900;">Xác minh địa chỉ email của bạn</h2></div><p></p>
      
    <form method="POST" action="{{ route('verification.resend') }}">
         @csrf

         <div class="card-body" style="color:white">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                        Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.
                        </div>
                    @endif

                    {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để lấy liên kết xác minh.') }}
                    {{ __('Nếu bạn không nhận được email') }},
         </div>            
         
        
          <!-- Submit button -->
          <button type="submit" class="btn btn-success btn-lg btn-block">bấm vào đây để yêu cầu khác</button>
             
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection


















