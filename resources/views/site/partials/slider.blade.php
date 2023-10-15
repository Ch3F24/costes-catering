<div class="swiper">
    <div class="swiper-wrapper">
        @foreach($images as $image)
            <div class="swiper-slide bg-red-500">
                <picture class="h-full">
                    <source media="(max-width: 768px)" srcset="{{ addImageParams($image['mobile']['src'],['w' => 768]) }}" />
                    <source media="(max-width: 1024px)" srcset="{{ addImageParams($image['tablet']['src'],['w' => 1280]) }}" />
                    <img src="{{ addImageParams($image['desktop']['src'],['w' => 1650]) }}"
                         class="h-full"
                         loading="lazy"
                         alt="Chris standing up holding his daughter Elva" />
                </picture>
                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
            </div>
        @endforeach
    </div>
</div>
