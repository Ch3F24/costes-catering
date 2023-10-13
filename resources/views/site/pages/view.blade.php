@extends('site.layouts.app')

@section('meta')
    @include('site.partials.meta',['meta' => $page])
@endsection

@section('slider')
    @if($page->hasImage('slider','desktop'))
        @include('site.partials.slider', ['images' => $page->imagesAsArraysWithCrops('slider')])
    @endif
@endsection

@section('content')
    <main class="container lg:mb-8">
        {!! $page->renderBlocks() !!}
    </main>
@endsection
