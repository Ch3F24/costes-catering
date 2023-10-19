@if($page->hasImage('slider','desktop'))
    <header class="h-screen w-screen">
        <x-navigation transparent="{{ $page->transparent_nav }}" :slider="true" />
        @include('site.partials.slider', ['images' => $page->imagesAsArraysWithCrops('slider')])
    </header>
@else
    <x-navigation transparent="{{ $page->transparent_nav }}" :slider="false" />
@endif
