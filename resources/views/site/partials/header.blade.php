@if($page->hasImage('slider','desktop'))
    <header class="h-screen w-screen">
        <x-navigation :relative="false" />
        @include('site.partials.slider', ['images' => $page->imagesAsArraysWithCrops('slider')])
    </header>
@else
    <header>
        <x-navigation :relative="true" />
    </header>
@endif
