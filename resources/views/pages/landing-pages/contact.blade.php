<x-guest-layout>
    <div class="bg-primary">
        <x-landing-nav for="customer" logo="white"/>
        <x-container class="mt-10 py-10 relative">
            <img src="{{asset('assets/img/contact/contact_bg_pattern.svg')}}" class="absolute right-0 -top-2"/>
            <div class="flex items-center space-x-8">
                <x-icon name="contact" class="w-12 text-white"/>
                <div>
                    <p class="text-white">{{ __("We're here to help you") }}</p>
                    <h4 class="text-white text-2xl font-semibold">{{ __("Contact Us") }}</h4>
                </div>
            </div>
        </x-container>
    </div>
    <div class="relative bg-white py-12">
        <x-container>
            <p>{{ __("The") }} <a href="{{ route('index') }}" class="font-semibold text-secondary">{{ __("myCrypto Tax") }}</a>  {{__("Help Center has answers to most questions. We’re happy to lend a hand,") }}</p>
            <p>{{ __("but response times may take longer than normal.") }}</p>
            <div class="grid grid-cols-1 md:grid-cols-3 py-12 gap-5 md:gap-8 lg:gap-10 xl:gap-18">
                @php
                    $items = [
                        [ 'id'=>1, 'name'=>'Live chat', 'icon'=>'live-chat', 'line_1'=>'Weekdays: 9 AM — 6 PM ET', 'line_2'=>'Weekends: 9 AM — 5 PM ET', 'button'=>'Chat Now' ],
                        [ 'id'=>1, 'name'=>'Email Contact', 'icon'=>'email-contact', 'line_1'=>'Can’t chat with us during those hours?', 'line_2'=>'We’ll respond to you via email within a day.', 'button'=>'Send Email' ],
                        [ 'id'=>1, 'name'=>'Help Center', 'icon'=>'help-center', 'line_1'=>'Our self-serve help center is open 24/7', 'line_2'=>'with 50+ articles to help.', 'button'=>'Visit Now' ]
                    ]
                @endphp
                @foreach ($items as $item)                    
                    <div class="border rounded-lg p-5 lg:p-9 text-center">
                        <div class="flex items-center justify-center space-x-5">
                            <x-icon name="{{$item['icon']}}" class="w-10"/>
                            <h5 class="text-lg font-bold">{{ __($item['name']) }}</h5>
                        </div>
                        <div class="py-4">
                            <p>{{__($item['line_1'])}}</p>
                            <p class="mt-3">{{__($item['line_2'])}}</p>
                        </div>
                        <x-button class="mt-5 font-semibold">{{ __($item['button']) }}</x-button>
                    </div>
                @endforeach
               
            </div>
        </x-container>
    </div>
</x-guest-layout>   