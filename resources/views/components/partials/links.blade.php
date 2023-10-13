@foreach($links as $link)

    <li class="py-5 px-5 md:py-0">

        @if(count($link->children))
            <div x-data="{ open: false}" class="relative">

                <p class="text-black md:text-white flex justify-between items-center relative font-bold"
                   @click="open = !open"
                   x-bind:class="{'border-b border-b-black border-b-2 md:border-b-0': open}">

                    {{ $link->title }}

                    <span class="toggler md:hidden"
                          x-bind:class="{ 'open': open, 'close': !open }">
                    </span>

                </p>

                <ul x-show="open"
                    class="ml-4 mt-4 md:ml-0 md:absolute top-full left-0 max-w-xs w-full min-w-[200px]"
                    x-transition>

                    @foreach($link->children as $childLink)
                        <li>
                            <a href="{{ pageLink($childLink) }}" class="text-black md:text-white">

                                {{ $childLink->title }}

                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <a href="{{ pageLink($link) }}" class="text-black md:text-white font-bold lg:font-normal">

                {{ $link->title }}

            </a>
        @endif

    </li>

@endforeach

    <li class="py-5 px-5 md:py-0">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

            @if($localeCode != LaravelLocalization::getCurrentLocale())
                    <a class="text-black md:text-white font-bold lg:font-normal"
                        rel="alternate"
                        hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                        {{ strtoupper($localeCode) }}

                    </a>
            @endif

        @endforeach

    </li>
