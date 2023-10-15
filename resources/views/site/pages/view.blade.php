@extends('site.layouts.app')

@section('meta')
    @include('site.partials.meta',['meta' => $page])
@endsection

@section('header')

    @include('site.partials.header')

@endsection


@section('content')
    @if(count($page->blocks))
        <main class="container lg:mb-8">
            {!! $page->renderBlocks() !!}
        </main>
    @endif
@endsection
