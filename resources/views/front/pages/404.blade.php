@extends('front.layout')
@section('title', 'Không tìm thấy trang')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/404.css') }}">
@endsection

@section('content')
    <div class="section">
        <h1 class="error">404</h1>
        <div class="page">Không tìm thấy trang</div>
        <a class="back-home" href="{{ route('front.home') }}">Về trang chủ</a>
    </div>
@endsection
