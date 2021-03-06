@extends('Main.marketBoardMain')

@section('mdb')
    @include('components.mdb')
@endsection

@section('header')
    @include('components.header')
@endsection

@section('marketCard')
    @include('components.community.board.market.marketCard')
@endsection

@section('footer')
    @include('components.footer')
@endsection