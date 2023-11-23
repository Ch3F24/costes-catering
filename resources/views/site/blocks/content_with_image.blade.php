<div data-block="{{'contentWithImage-' . $block->id}}"
     @class([
        'md:flex mt-24',
        'content_with_image-right flex-row-reverse' => $block->input('position') == 'right',
        'content_with_image-left' => $block->input('position') == 'left'
    ])
     @if($block->input('id')) id="{{ $block->input('id') }}" @endif>

    <div class="w-full md:w-3/5 relative">
        @if($block->hasImage('cover','desktop'))
            <picture>
                @if($block->input('is_vertical'))
                    <source media="(max-width: 768px)" srcset="{{ $block->image('cover', 'default', ['h' => 768]) }}" />
                    <source media="(max-width: 1024px)" srcset="{{ $block->image('cover', 'default', ['h' => 1280]) }}" />
                    <img src="{{ $block->image('cover', 'default',['h' => 1280]) }}"
                         class="rounded-lg shadow-xl mx-auto md:max-h-96 lg:max-h-[600px]"
                         loading="lazy"
                         alt="Chris standing up holding his daughter Elva" />
                @else
                    <source media="(max-width: 768px)" srcset="{{ $block->image('cover', 'mobile',['w' => 768]) }}" />
                    <source media="(max-width: 1024px)" srcset="{{ $block->image('cover', 'tablet',['w' => 1280]) }}" />
                    <img src="{{ $block->image('cover', 'desktop',['w' => 1920]) }}"
                         class="rounded-lg shadow-xl"
                         loading="lazy"
                         alt="Chris standing up holding his daughter Elva" />
                @endif
            </picture>
            @if($block->hasImage('gallery','default'))
                <Gallery
                    photo-number="{{ count($block->images('gallery','default')) }}"
                    photo-props="{{ json_encode(getImages($block,'gallery')) }}">
                </Gallery>
            @endif
        @endif
    </div>
    <div class="w-full md:w-3/5 lg:w-2/5 mt-10 md:mt-0 content_with_image-content">
        {!! $block->translatedinput('content') !!}
    </div>
</div>

@if($block->hasImage('gallery','default'))
    @pushOnce('scripts')
        @vite('resources/js/gallery.js')
    @endPushOnce
@endif
