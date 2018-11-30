@extends('Main.viewMain')

@section('mdb')
    @include('components.mdb')
@endsection

@section('header')
    @include('components.header')
@endsection

@section('viewContent')
    @include('components.community.view.viewContent')
@endsection

@section('viewNav')
    @include('components.community.view.viewNav')
@endsection

@section('marketPop')
    @include('components.community.board.market.marketPop')
@endsection

@section('comment_form')
    @include('components.community.comment.comment_form')
@endsection

@section('footer')
    @include('components.footer')
@endsection