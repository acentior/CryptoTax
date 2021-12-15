<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Styles --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('mix/css/app.css') }}">
    @livewireStyles

    {{-- Scripts --}}
    <script src="{{ mix('mix/js/app.js') }}" defer></script>
{{--    --}}{{-- Push ApexCharts to the top of the scripts stack --}}
{{--    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>--}}
{{--    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">--}}
</head>
<body>
    <div class="relative min-h-screen md:flex" x-data="{ mobileSidebar: false }">
        {{-- Mobile menu bar --}}
        <div class="bg-primary text-gray-100 flex justify-between md:hidden">
            <a href="#" class="block p-4 text-white font-bold flex">
                <img src="{{ asset("assets/img/logo.jpg") }}" alt="Logo" class="rounded-2xl mr-2 h-8">
                <span class="mt-1">myCrypto Tax</span>
            </a>
            <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700" @click="mobileSidebar = !mobileSidebar">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Sidebar --}}
        <div class="sidebar bg-primary text-blue-100 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform md:relative md:translate-x-0 transition duration-200 ease-in-out z-40"
             x-bind:class="!mobileSidebar ? '-translate-x-full' : ''">
            {{-- Logo --}}
            <a href="#" class="text-white flex items-center space-x-2 px-4 text-lg font-bold">
                <img src="{{ asset("assets/img/logo.jpg") }}" alt="Logo" class="rounded-2xl mr-2 h-8"> myCrypto Tax
            </a>

            {{-- Nav --}}
            <ul class="space-y-4 px-6 py-4">
                @foreach(\App\Services\NavigationService::instance()->getItems() AS $item)
                    @if(!$loop->first)
                        <li>
                            <div class="border-t -mr-8 -ml-8 border-gray-700"></div>
                        </li>
                    @endif
{{debug($item)}}
                    @if(isset($item["children"]))
                        <li>
                            <p class="font-bold uppercase text-gray-500 text-sm tracking-wider mb-2">{{ $item["label"] }}</p>
                            <ul class="text-sm space-y-1 -mx-3 mt-2">
                                @foreach($item["children"] AS $row)
                                    <li>
                                        <a href="{{ route($row['route']) }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition hover:bg-gray-200/5 focus:bg-gray-500/5">
                                            <x-icon :name="$row['icon']" class="w-5" /> {{ $row["label"] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <ul class="text-sm space-y-1 -mx-3">
                                <li>
                                    <a href="{{ route($item["route"]) }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition hover:bg-gray-200/5 focus:bg-gray-500/5">
                                        <x-icon :name="$item['icon']" class="w-5" /> {{ $item["label"] }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>

            <form method="POST" action="{{ route('logout') }}" class="absolute bottom-0 left-0 p-4 w-full" href="{{ route("logout") }}">
                @csrf

                <button type="submit" title="{{ __("Log Out") }}">
                    <x-icon name="fas-user" class="w-4 mr-3 inline" />
                    <span class="text-sm">{{ auth()->user()->name }}</span>
                    <x-icon name="fas-sign-out-alt" class="w-4 ml-3 inline" />
                </button>
            </form>
        </div>

        {{-- Content --}}
        <div class="flex-1 p-10">
            @if(!empty($title))
                <h1 class="font-bold text-2xl text-gray-700 mb-4">{{ $title }}</h1>
            @endif

            {{ $slot }}
        </div>
    </div>
    @livewireScripts
    @livewire('livewire-toast')
    @stack('scripts')
</body>
</html>
