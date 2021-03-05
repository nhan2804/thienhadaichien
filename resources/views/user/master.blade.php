@extends('landing')
@section('content')
<link rel=stylesheet href="{{asset('UI/home.css')}}">
<div class="u-home">
    <div class="row mr-0">
      <div class="col-lg-2">
        <div class="u-nav">
          <div class="u-avatar text-center p-1">
            <img src="https://lthumb.lisimg.com/741/20711741.jpg?width=411&sharpen=true" alt="">
            <p>{{Auth::user()->fullname}}</p>
          </div>
          <h6 class="m-0 text-center">ĐIỀU HƯỚNG</h6>
          <ul class="u-list-nav">
              <li class="u-item-nav">
                <a class="u-link-nav nav-active" href="{{URL::to('dashboard/user')}}">Thông tin cá nhân</a>
              </li>
              <li class="u-item-nav">
                <a class="u-link-nav" href="{{URL::to('dashboard/user/create')}}">Tạo tài khoản</a>
              </li>
              <li class="u-item-nav">
                <a class="u-link-nav" href="{{URL::to('dashboard/video')}}">Video cho bạn</a>
              </li>
              <li class="u-item-nav">
                <a class="u-link-nav" href="{{URL::to('dashboard/user/export-test')}}">Xuất sách PDF</a>
              </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-10">
        <div class="u-infor">
        @yield('home')
        <div class="u-infor">
        <div class="u-nav-top">
          <ul class="u-list-top">
              <li class="u-item-top">
                <a href="#" class="u-link-top"></a>
              </li>
          </ul>
        {{-- </div> --}}
      </div>
    </div>
</div>
@endsection