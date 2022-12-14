
<div class="p-5 mt-6 bg-white rounded-md shadow-md">
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <x-icon name="tabler-tax" class="w-8 h-7"/>
            <p class="mr-3 text-lg font-semibold">{{ __('Crypto Taxes') }}</p>
        </div>
        <div>
            <x-button variant="primary" tag="a" href="{{ route('customer.taxes') }}">{{__('See details')}}</x-button>
        </div>
    </div>
    <table class="w-full mt-5 text-base text-center text-primary">
        <thead class="bg-gray-100 border">
            <tr>
                <th class="py-5 font-bold">{{ __('Tax year') }}</th>
                <th class="py-5 font-bold">{{ __('Gains') }}</th>
                <th class="py-5 font-bold">{{ __('Income') }}</th>
            </tr>
        </thead>
        <tbody class="space-y-5 border">
            @foreach ($table as $item)                
                <tr class="border">
                    <td class="flex items-center justify-center py-5 space-x-2">
                        <p>{{ $item['year'] }}</p> 
                        <x-icon name="uni-comment-info-o" class="w-3 h-3 text-gray-400"/> 
                </td>
                    <td class="py-5">+ $ {{ $item['gains'] }}</td>
                    <td class="py-5">$ {{ $item['income'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>