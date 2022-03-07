<div>
    <div class="flex items-center justify-between">
        <div class="flex items-center justify-start col-span-3 py-5 space-x-6">
            <x-icon name="carbon-portfolio" class="w-10 h-8"/>
            <h4 class="text-xl font-bold md:text-2xl">{{ __('My Crypto Portfolio') }}</h4>
        </div>
        <x-button tag="a" href="{{ route('customer.asset') }}">{{ __('See all assets') }}</x-button>
    </div>
    <div class="overflow-auto">
        <table class="min-w-[720px] w-full border rounded">
            <thead class="bg-white border shadow-md">
                <tr class="py-5">
                    <th class="py-5 pl-5 text-left">{{ __('Name') }}</th>
                    <th class="py-5 text-right">{{ __('Holdings') }}</th>
                    <th class="py-5 text-right">{{ __('Price') }}</th>
                    <th class="py-5 text-center">{{ __('All time unrealized return') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $portfolios = [
                        [],
                        [],
                        [],
                        []
                    ]
                @endphp
                @foreach ($portfolios as $portfolio)                    
                    <tr class="px-5">
                        <td class="flex items-center px-3 py-5 space-x-4">
                            <x-icon name="coins.btc" class="w-16 h-16"/>
                            <div class="text-left">
                                <p class="font-semibold text-black ">Ethereum 2</p>
                                <p class="text-gray-400">ETH2</p>
                            </div>
                        </td>
                        <td class="py-5 text-right">
                            <p>$1663</p>
                            <p class="text-gray-400">0.2261929</p>
                            <p>ETH2</p>
                        </td>
                        <td class="py-5 text-right">
                            <p>$3156.85</p>
                        </td>
                        <td class="py-5 text-center">
                            <p>$699.12</p>
                        <x-badge variant="danger" type="square">-27.54%</x-badge>
                        </td>
                    </tr>             
                @endforeach
            </tbody>
        </table>
    </div>
</div>
