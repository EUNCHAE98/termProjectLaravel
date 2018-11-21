
@extends('write_formMain')

@section('mdb')
    @include('components.mdb')
@endsection

@section('header')
    @include('components.header')
@endsection

@section('write_form')
	@if($category == 'market')
	    @include('components.write_formMarket')
	@else
	    @include('components.write_form')	
	@endif
@endsection
		
@section('footer')
    @include('components.footer')
@endsection