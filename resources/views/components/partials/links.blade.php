@foreach($links as $link)

    <li class="py-3 px-5 md:py-0">

        @if(count($link->children))
            <div x-data="{ open: false}" class="relative dropdown-menu">

                <p @class([
                        'nav-link',
                        'flex justify-between items-center relative cursor-pointer',
                        'active' => isActive($link, true)
                    ])
                   @click="open = !open"
                   x-bind:class="{'border-b border-b-black border-b-2 md:border-b-white': open}">

                    {{ $link->title }}

                    <span class="toggler md:hidden"
                          x-bind:class="{ 'open': open, 'close': !open }">
                    </span>

                </p>

                <ul x-show="open"
                    @class([
                        'ml-4 mt-4 md:ml-0 md:absolute top-full left-0 max-w-xs w-full min-w-[300px] space-y-3 bg-white p-4 rounded-xl',
//                        'bg-white p-4 rounded-xl' => !$relative,
                    ])
                    @click.outside="open = false"
                    x-transition >

                    @foreach($link->children as $childLink)
                        <li>
                            <a href="{{ pageLink($childLink) }}"
                               @class([
                                    'nav-link',
                                    'active' => isActive($childLink)
                                ])>

                                {{ $childLink->title }}

                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <a href="{{ pageLink($link) }}"
               @class([
                    'nav-link',
                    'active' => isActive($link, true)
               ])>

                {{ $link->title }}

            </a>
        @endif

    </li>

@endforeach
@if(count($links))
    <li class="py-5 px-5 md:py-0">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

            @if($localeCode != LaravelLocalization::getCurrentLocale())
                    <a class="nav-link font-bold lg:font-normal"
                        rel="alternate"
                        hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                        {{ strtoupper($localeCode) }}

                    </a>
            @endif

        @endforeach

    </li>
@endif
