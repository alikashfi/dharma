@extends('layouts.main'/*, ['header' => 'sticky']*/)

@section('title', $page->title)
@section('description', $page->description)

@section('content')
    {!! $page->body !!}
@endsection