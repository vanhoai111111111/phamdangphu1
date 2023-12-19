@extends('layouts.admin')
@section('title')
   Users

@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Người dùng đã đăng ký</h4>
        <hr/>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Điện thoại</th> 
                    <th>Hoạt động</th>    
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}} {{$user->lname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td><a href="{{url('view-user/'.$user->id)}}" class="btn btn-primary btn-sm">Xem</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection