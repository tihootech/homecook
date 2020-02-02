@extends('layouts.acc')

@section('meta')
	<title> خونه پز - ایجاد حساب کاربری </title>
@endsection

@section('content')

	@include('includes.errors')
	@include('includes.register_form', ['in_cart'=>0])

@endsection
