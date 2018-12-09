@extends('Main.modify_formMain')

@section('mdb')
    @include('components.mdb')
@endsection

@section('header')
    @include('components.header')
@endsection

@section('modify_form')
	@include('components.community.form.modify_form')	
@endsection

@section('footer')
    @include('components.footer')
@endsection