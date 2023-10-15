{{--border-b border-b-white--}}
<nav @class([
        'relative' => $relative,
        'absolute top-0' => !$relative ,
        'px-4 z-50 w-full grid grid-cols-5 md:block items-center transition-all duration-[175ms] ease-in-out pb-2'
    ])
     x-data="{ show: false}"
     x-bind:class="{ 'bg-white md:bg-transparent': show  }">

    <div class="mobil_menu-triggers md:hidden">
        <svg x-show="!show" id="menu-show" class="text-white"  data-name="Outlined/UI/menu" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" @click="show = true">
            <path class="fill-current" d="M0,13.125V11.25H24.375v1.876ZM0,7.5V5.625H20.625V7.5ZM0,1.875V0H24.375V1.875Z" transform="translate(2.813 8.438)"></path>
        </svg>
        <svg x-show="show" id="menu-hide" class="text-black" data-name="Outlined/UI/close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" @click="show = false">
            <path class="fill-current" d="M19.859,1.109,18.75,0,9.93,8.828,1.109,0,0,1.109,8.828,9.93,0,18.75l1.109,1.109,8.82-8.828,8.82,8.828,1.109-1.109L11.031,9.93l8.828-8.82Z" transform="translate(2.57 2.57)"></path>
        </svg>
    </div>

    <div class="nav-brand w-52 mx-auto md:mb-4 col-span-3">
        <a href="{{ route('frontend.home') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Costes catering logo">
        </a>
    </div>

    {{--Mobile menu--}}
    <ul class="bg-white w-full absolute top-full left-0 md:hidden md:flex md:flex-row md:flex-nowrap md:justify-center md:px-0"
        x-show="show"
        @click.outside="show = false"
        x-transition
        x-transition:enter.duration.150ms
        x-transition:leave.duration.150ms>
        @include('components.partials.links',[
            'linkColor' => $relative ? 'text-black' : 'text-black md:text-white',
            'relative' => $relative
        ])
    </ul>

    {{--Desktop menu--}}
    <div class="flex items-center justify-center">
        <ul class="hidden px-5 md:flex md:flex-row md:flex-nowrap md:justify-center md:px-0">
            @include('components.partials.links',[
                'linkColor' => $relative ? 'text-black' : 'text-black md:text-white',
                'relative' => $relative
            ])
        </ul>
    </div>
</nav>
