@php
$overview_data = [
    [
        'type' => 'Deposit',
        'search_string' => 'R',
        'amount' => $deposits_num,
        'icon' => 'fluentui-building-retail-money-24-o',
    ],
    [
        'type' => 'Withdrawal',
        'search_string' => 'G',
        'amount' => $withdrawal_num,
        'icon' => 'uni-money-withdrawal-o',
    ],
    [
        'type' => 'Trades',
        'search_string' => 'T',
        'amount' => $trades_num,
        'icon' => 'polaris-major-exchange',
    ],
    [
        'type' => 'Needs Review',
        'search_string' => 'T',
        'amount' => $reviews_num,
        'icon' => 'gmdi-rate-review-o',
    ],
    [
        'type' => 'Exchanges',
        'search_string' => 'E',
        'amount' => $exchange_num,
        'icon' => 'ri-exchange-funds-line',
    ],
]    
@endphp

<div>
    <div>
        <x-customers.customer-header-bar icon="grommet-transaction" name="Transactions">
            <x-button variant="white" class="my-2 border-primary" wire:click='fileExport'>{{ __('Download CSV') }}</x-button>
            <x-button variant="white" class="border-primary">{{ __('Add transaction') }}</x-button>
            <x-button tag="a" href="{{ route('customer.account.new') }}">
                <x-icon name="bx-add-to-queue" class="w-5 h-5 mr-2"/>
                {{ __('Add Account') }}
            </x-button>
        </x-customers.customer-header-bar>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-0 sm:gap-x-4 gap-y-4 sm:gap-y-0 my-9">
            @foreach ($overview_data as $item)
                <div class="flex items-start justify-between w-full p-8 border rounded-lg cursor-pointer" wire:click="searchByItem(`{{$item['search_string']}}`)">
                    <div>
                        <p> {{ $item['type'] }}</p>
                        <p class="mt-1 text-3xl font-bold">{{ $item['amount'] }}</p>
                    </div>
                    <x-icon name="{{ $item['icon'] }}" class="w-14 h-14" />
                </div>
            @endforeach
        </div>
    </div>
    <div class="p-4 bg-gray-100 border rounded-sm">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-x-0 md:gap-x-2 gap-y-2 md:gap-y-0">
            <div class="col-span-1 px-6 py-4 bg-white rounded-md md:col-span-4">
                <div class="relative w-full">
                    <input class="w-full border-0 outline-none" placeholder="Filter transactions" wire:model.lazy="search">
                    <div class="absolute right-0 pl-4 border-l-2 top-1">
                        <button>
                            <x-icon name="fas-search" class="w-4 h-4"></x-icon>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-2">
                <div class="grid h-full grid-cols-6 gap-x-3">
                    <div class="col-span-2">
                        <button class="w-full h-full text-white rounded-md bg-primary hover:bg-secondary-400" wire:click="refresh_filter">
                            {{ __('All') }}
                        </button>
                    </div>
                    <div class="w-full h-full col-span-4">
                        <select class="w-full h-full bg-white rounded-md" wire:model.lazy="order">
                            <option :value="" disabled selected hidden>{{ __('Order By') }}</option>
                            @foreach ($filter['order'] as $item)                                
                                <option value="{{ $item['value'] }}">{{ __($item['label']) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <select class="h-full col-span-1 bg-white rounded-md md:col-span-2" wire:model.lazy="type">
                <option value="0" selected>{{ __('All types') }}</option>
                @foreach ($filter['type'] as $item)                                
                    <option value="{{ $item['value'] }}">{{ __($item['label']) }}</option>
                @endforeach
            </select>
            <div class="col-span-1 md:col-span-3">
                <div class="grid h-full grid-cols-6 gap-x-3">
                    <select class="w-full h-full col-span-3 bg-white rounded-md" wire:model.lazy="wallet">
                        <option value="0" selected>{{ __('All accounts') }}</option>
                        @foreach ($filter['category'] as $item)                                
                            <option value="{{ $item['id'] }}">{{ __($item['name']) }}</option>
                        @endforeach
                    </select>
                    <select class="w-full h-full col-span-3 bg-white rounded-md">
                        <option value="0" selected>{{ __('All categories') }}</option>
                        @foreach ($filter['tag'] as $item)                                
                            <option value="{{ $item['value'] }}">{{ __($item['label']) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10 overflow-auto rounded-sm scrollbar">
        <div class="min-w-[1024px] border divide-y">    
            @foreach ($transactions as $transaction)
                <div class="flex items-center justify-between px-5">                    
                    <x-transaction-list-item :transaction="$transaction"/>
                    <div x-data="{open:false}" class="relative py-2">
                        <button class="flex items-center justify-center w-6 h-6 bg-gray-100 border rounded-full" @click="open = true">
                            <svg class="w-4 transform trnstsn " fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="{'rotate-180': open}">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="absolute right-0 z-50 w-40 py-4 origin-top-right bg-white rounded-md shadow-lg top-10 text-primary ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            x-show="open" @click.away="open=false" x-cloak
                            x-transition:enter-start="transition ease-in duration-3000"
                        >
                            <button class="w-full px-5 py-2 text-left bg-white hover:bg-gray-100">{{ __('Edit') }}</button>
                            @if ($transaction->ignored)
                                <button class="w-full px-5 py-2 text-left bg-white hover:bg-gray-100" wire:click='mark_active({{ $transaction->id }})'>{{ __('Active') }}</button>
                            @else                                
                                <button class="w-full px-5 py-2 text-left bg-white hover:bg-gray-100" wire:click='mark_ignore({{ $transaction->id }})'>{{ __('Ignor') }}</button>
                            @endif
                            <button class="w-full px-5 py-2 text-left bg-white hover:bg-gray-100">{{ __('View') }}</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-16 mb-8">
        {{$transactions->links()}}
    </div>
</div>

