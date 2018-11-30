@extends('Main.goToUserBoardMain')

@section('mdb')
    @include('components.mdb')
@endsection

@section('header')
    @include('components.header')
@endsection

@section('userBoard')
    @include('components.adminPage.userBoard')
@endsection

@section('footer')
    @include('components.footer')
@endsection