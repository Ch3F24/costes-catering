@if($page->youtube)
    <header class="w-screen">
        <x-navigation transparent="{{ $page->transparent_nav }}" :slider="true" />
        <div @class([
        'mt-[82px]',
        'md:mt-[124px]' => !$page->transparent_nav,
        'md:mt-0' => $page->transparent_nav
        ])>
            <x-embed url="{{ $page->youtube }}"/>
        </div>
    </header>
@elseif($page->hasImage('slider','desktop'))
    <header class="h-screen w-screen">
        <x-navigation transparent="{{ $page->transparent_nav }}" :slider="true" />
        @include('site.partials.slider', ['images' => $page->imagesAsArraysWithCrops('slider')])
    </header>
@else
    <x-navigation transparent="{{ $page->transparent_nav }}" :slider="false" />
@endif
