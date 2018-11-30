@extends('Main.reviewBoardMain')

@section('mdb')
    @include('components.mdb')
@endsection

@section('header')
    @include('components.header')
@endsection

@section('reviewImage')
    @include('components.community.board.review.reviewImage')
@endsection

@section('board')
    @include('components.community.board.board')
@endsection

@section('footer')
    @include('components.footer')
@endsection