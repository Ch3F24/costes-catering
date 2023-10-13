<div @class([
    'md:flex mt-24',
    'content_with_image-right flex-row-reverse' => $block->input('position') == 'right',
    'content_with_image-left' => $block->input('position') == 'left'
    ])
     data-block="contentWithImage" @if($block->input('id')) id="{{ $block->input('id') }}" @endif>
    <div class="w-full md:w-3/5">
        @if($block->hasImage('cover','desktop'))
            <picture>
                <source media="(max-width: 768px)" srcset="{{ $block->image('cover', 'mobile',['w' => 768]) }}" />
                <source media="(max-width: 1024px)" srcset="{{ $block->image('cover', 'tablet',['w' => 1280]) }}" />
                <img src="{{ $block->image('cover', 'desktop',['w' => 1920]) }}"
                     class="rounded-lg shadow-xl"
                     loading="lazy"
                     alt="Chris standing up holding his daughter Elva" />
            </picture>
        @endif
    </div>
    <div class="w-full md:w-3/5 lg:w-2/5 mt-10 md:mt-0 content_with_image-content">
        {!! $block->translatedinput('content') !!}
    </div>
</div>
