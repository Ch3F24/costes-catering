@foreach($links as $link)

    <li class="py-5 px-5 md:py-0 md:border-l md:border-l-secondary md:first:border-l-0">

        @if(count($link->children))
            <div x-data="{ open: false}">

                <p class="text-black md:text-white flex justify-between items-center relative font-bold"
                   @click="open = !open"
                   x-bind:class="{'border-b border-b-black border-b-2': open}">

                    {{$link->title}}

                    <span class="toggler md:hidden"
                          x-bind:class="{ 'open': open, 'close': !open }">
                    </span>

                </p>

                <ul x-show="open"
                    class="ml-4 mt-4"
                    x-transition>

                    @foreach($link->children as $childLink)
                        <li>
                            <a href="{{route('page.index', [$childLink->getRelated('page')->first()->slug])}}" class="text-black md:text-white">

                                {{$childLink->title}}

                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <a href="{{route('page.index', [$link->getRelated('page')->first()->slug])}}" class="text-black md:text-white font-bold">

                {{$link->title}}

            </a>
        @endif

    </li>

@endforeach
