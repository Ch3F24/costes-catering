<div data-block="{{'contentWithImage-' . $block->id}}"
     @class([
        'md:flex mt-24',
        'content_with_image-right flex-row-reverse' => $block->input('position') == 'right',
        'content_with_image-left' => $block->input('position') == 'left'
    ])
     @if($block->input('id')) id="{{ $block->input('id') }}" @endif>

    <div class="w-full md:w-3/5 relative">
        @if($block->input('youtube_url'))
            <x-embed url="{{ $block->input('youtube_url') }}" />
        @endif
    </div>
    <div class="w-full md:w-3/5 lg:w-2/5 mt-10 md:mt-0 content_with_image-content">
        {!! $block->translatedinput('content') !!}
    </div>
</div>
