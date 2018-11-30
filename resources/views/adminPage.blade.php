@extends('Main.adminPageMain')

@section('mdb')
    @include('components.mdb')
@endsection

@section('header')
    @include('components.header')
@endsection

@section('adminPage')
    @include('components.adminPage.adminPage')
@endsection

@section('adminPage_Calendar')
    @include('components.adminPage.adminPage_Calendar')
@endsection

@section('footer')
    @include('components.footer')
@endsection