@extends('Main.QnABoardMain')

@section('mdb')
    @include('components.mdb')
@endsection

@section('header')
    @include('components.header')
@endsection

@section('QnAImage')
    @include('components.community.board.QnA.QnAImage')
@endsection

@section('board')
    @include('components.community.board.board')
@endsection

@section('footer')
    @include('components.footer')
@endsection