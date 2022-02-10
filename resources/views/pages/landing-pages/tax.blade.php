<x-guest-layout>
    <div class="w-full bg-white relative">
        <div class="relative">
            <div class="w-3/4 h-full absolute right-0 top-0">
                <img src="{{ asset("assets/img/subpage_images/tax_banner.png") }}" class="w-full h-full lg:block hidden"/>
            </div>
            <x-landing-nav for="customer" class="relative"/>
            {{-- Hero --}}
            <x-container class="mt-8 xl:mt-14 pb-20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 xl:gap-20 relative">
                    <div class="relative  mt-0 xl:mt-12 2xl:mt-24">
                        <img src="{{ asset('assets/img/subpage_images/landing_logo_bg_pattern.svg') }}" class="h-auto max-w-lg absolute -mt-16 hidden xl:block"/>
                        <div class="relative">
                            <p class="text-md lg:text-lg text-secondary">{{ __('Duis consectetur feugiat aucto') }}</p>
                            <h2 class="text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mt-5 lg:mt-8">{{ __('Tax Services') }}</h2>
                            <p class="mt-5 lg:mt-10 text-lg leading-loose">{{ __('Use our cryptocurrency tax software to easily track your trades, see your profits, and never overpay on your crypto taxes again.') }}</p>
                            <x-button variant="secondary" class="font-bold mt-10 z-20" size="md">{{ __('Tax Report') }}</x-button>
                        </div>
                    </div>
                    <div class="md:block hidden">
                        <img src="{{ asset('assets/img/subpage_images/tax_hero.svg') }}" class="w-full"/>
                    </div>
                </div>
            </x-container>
        </div>
        <x-container class="relative">
            {{-- Content --}}
            <div class="text-center relative">
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5">
                    <div class="">
                        <img src="{{asset('assets/img/subpage_images/tax_capital_gain.svg')}}" class="w-full"/>
                    </div>
                    <div class="flex items-center">
                        <div class="my-auto">
                            <div class="flex items-center">
                                <img src={{asset('assets/img/subpage_images/capital_coin_icon.svg')}} class="w-14"/>
                                <h4 class=" sm:text-2xl text-xl font-bold ml-5">{{ __('Capital Gains') }}</h4>
                            </div>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Duis consectetur feugiat auctor. Morbi nec enim luctus, feugiat arcu id, ultricies ante. Duis vel massa eleifend, porta est non, feugiat metus. Cras ante massa, tincidunt nec lobortis quis ") }}</p>
                            <p class="sm:mt-3 mt-2 text-left leading-loose">{{ __("Design is everywhere. From the dress you’re wearing to the smartphone you’re holding, it’s design. If you think good design is expensive, you should look at the cost of bad design. ") }}</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5">
                    <div class="flex items-center order-2 md:order-1">
                        <div class="my-auto">
                            <div class="flex items-center">
                                <img src="{{asset('assets/img/subpage_images/tax_transaction_income_icon.svg')}}" class="w-14"/>
                                <h4 class=" sm:text-2xl text-xl font-bold ml-5">{{ __('Transaction Income') }}</h4>
                            </div>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Duis consectetur feugiat auctor. Morbi nec enim luctus, feugiat arcu id, ultricies ante. Duis vel massa eleifend, porta est non, feugiat metus. Cras ante massa, tincidunt nec lobortis quis ") }}</p>
                            <p class="sm:mt-3 mt-2 text-left leading-loose">{{ __("Design is everywhere. From the dress you’re wearing to the smartphone you’re holding, it’s design. If you think good design is expensive, you should look at the cost of bad design. ") }}</p>
                        </div>
                    </div>
                    <div class="order-1 md:order-2">
                        <img src="{{asset('assets/img/subpage_images/tax_transaction_income.svg')}}" class="w-full"/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 2xl:gap-42 xl:gap-30 lg:gap-24 md:gap-10 gap-5 py-5">
                    <div class="">
                        <img src="{{asset('assets/img/subpage_images/tax-checklist_report.svg')}}" class="w-full"/>
                    </div>
                    <div class="flex items-center">
                        <div class="my-auto">
                            <div class="flex items-center">
                                <img src="{{asset('assets/img/subpage_images/tax_checklist_icon.svg')}}" class="w-14"/> 
                                <h4 class=" sm:text-2xl text-xl font-bold ml-5">{{ __('Tax Checklist') }}</h4>
                            </div>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                            <div class="flex items-center mt-9">
                                <img src="{{ asset('assets/img/subpage_images/tax_report_icon.svg') }}" class="w-14"/>
                                <h4 class=" sm:text-2xl text-xl font-bold ml-5">{{ __('Tax Report') }}</h4>
                            </div>
                            <p class="sm:mt-9 mt-5 text-left leading-loose">{{ __("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
        <x-footer-get-start/>
    </div>
    <x-footer/>
</x-guest-layout>