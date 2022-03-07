<div class="grid grid-cols-7 gap-5 items-center px-5 py-6 min-w-[720px]" wire:key='{{ $asset->id }}'>
    <div class="col-span-3">
        <div class="flex items-center space-x-3">
            <div class="w-14">
                <x-icon name="{{ 'coins.' . strtolower($asset->cryptoCurrency->short_name) }}" class="w-10 h-10"/>
            </div>
            <div>                                                    
                <p class="font-semibold truncate">{{$asset->cryptoCurrency->getName()}} Wallet</p>
                <p class="text-gray-400">{{ 11 }} {{__('Transactions')}}</p>
            </div>
        </div>
    </div>
    <div class="col-span-2 text-right">
        <p class="font-semibold">${{ moneyFormat($asset->convertTo(), 2) }}</p>
        <p class="text-gray-400">{{ moneyFormat($asset->balance, 10) }} {{$asset->cryptoCurrency->short_name}}</p>
    </div>
    <div class="col-span-2 flex justify-end">
        <x-button tag="a" href="{{route('customer.transactions', ['asset' => $asset->cryptoCurrency->short_name])}}" variant="white" class="justify-center text-center border-primary">{{ __('View Transaction') }}</x-button>
    </div>
</div>