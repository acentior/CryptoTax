 {{-- supported_country --}}
 <div class="w-full">
    <x-container>
        <div class="text-center py-14 relative">
            <img src="{{ asset('assets/img/subpage_images/map_logo_background.svg') }}" class="absolute top-8 left-1/2 -translate-x-1/2"/>
            <div class="relative">
                <p  class="text-2xl lg:text-3xl xl:text-4xl font-bold">{{ __('Supported Countries') }}</p>
                <div class="flex justify-center items-center space-x-2 sm:space-x-8 md:space-x-16 mt-12">
                    <div class="text-center">
                        <x-icon name="flag.usa" class="h-7 sm:h-10"/>
                        <p class="mt-1">USA</p>
                    </div>
                    <div class="text-center">
                        <x-icon name="flag.france" class="h-7 sm:h-10"/>
                        <p class="mt-1">France</p>
                    </div>
                    <div class="text-center">
                        <x-icon name="flag.germany" class="h-7 sm:h-10"/>
                        <p class="mt-1">Germany</p>
                    </div>
                    <div class="text-center">
                        <x-icon name="flag.sk" class="h-7 sm:h-10"/>
                        <p class="mt-1">Korea</p>
                    </div>
                    <div class="text-center">
                        <x-icon name="flag.japan" class="h-7 sm:h-10"/>
                        <p class="mt-1">Japan</p>
                    </div>
                </div>
                <img src="{{ asset('assets/img/subpage_images/landing_supported_country.svg') }}" class="p-5 md:p-16 w-full max-w-7xl m-auto h-auto"/>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-0 sm:gap-4 lg:gap-10 px-2 lg:px-10">
                    @php
                        $items = [
                            [ 'icon' => 'level-top', 'amount' => '20M +', 'term' => 'Happy Users' ],
                            [ 'icon' => 'transaction-1', 'amount' => '70M / Year', 'term' => 'Transactions' ],
                            [ 'icon' => 'solid_land', 'amount' => '15K +', 'term' => 'Recently Sold Lands' ],
                            [ 'icon' => 'chains', 'amount' => '8K +', 'term' => 'Supported Coins' ],
                        ]
                    @endphp
                    @foreach ($items as $item)                        
                        <div class="flex items-center justify-end space-x-4">
                            <div class="w-1/4 p-0 xl:p-3">
                                <x-icon name="{{ $item['icon'] }}" class="w-full h-full" />
                            </div>
                            <div class="text-left w-3/4">
                                <p class="text-xl sm:text-2xl xl:text-3xl font-bold">{{ __($item['amount']) }}</p>
                                <p class="text-gray-400 text-base">{{ __($item['term']) }}</p>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </x-container>
</div>
