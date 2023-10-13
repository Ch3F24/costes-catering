@extends('site.layouts.app')

@section('slider')
    @if($page->hasImage('slider','desktop'))
        @include('site.partials.slider', ['images' => $page->imagesAsArraysWithCrops('slider')])
    @endif
@endsection
