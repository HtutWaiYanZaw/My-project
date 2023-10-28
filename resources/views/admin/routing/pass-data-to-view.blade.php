@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Pass Data To View')

@section('content')
    
    @foreach($buttons as $button)
        <button class="btn {{ $button['type'] }}">{{ $button['text'] }}</button>
    @endforeach

    <hr>

    @foreach($links as $link)
        <a href="{{ $link->href }}">{{ $link->text }}</a>
        <br>
    @endforeach

@endsection

@section('script')
@endsection
