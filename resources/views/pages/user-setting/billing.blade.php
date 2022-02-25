<x-app-layout>
    <x-container class="my-7 bg-white p-8 border rounded-sm">
        <x-customers.customer-header-bar icon="bill" name="Billings">
        </x-customers.customer-header-bar>
        <div class="mt-8">
            <div class="flex items-center justify-between">
                <div class="">
                    <p class="text-lg font-semibold">{{ __('Billing History and Invoicing') }}</p>
                    <p class="text-gray-400">{{ __("Pick an account plan that's fits your workflow") }}</p>
                </div>
                <x-button>
                    <x-heroicon-o-document-download class="w-6 h-6" />
                    <p class="ml-3">{{ __('Download all') }}</p>
                </x-button>
            </div>
            <div class="mt-18 overflow-auto">
                <div class="divide-y min-w-[720px]">
                    <div class="grid grid-cols-12 pb-4">
                        <div class="col-span-4 ml-12">
                            <p class="font-semibold">{{ __('Description') }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="font-semibold">{{ __('Status') }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="font-semibold">{{ __('Amount') }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="font-semibold">{{ __('Plane') }}</p>
                        </div>
                    </div>
                    @php
                        $items = [
                            [], [], [], [], []
                        ]
                    @endphp
                    @foreach ($items as $item)                        
                        <div class="grid grid-cols-12 py-8 items-center">
                            <div class="col-span-4">
                                <div class="flex items-center space-x-6 pl-2">
                                    <input type="checkbox"/>
                                    <div class="">
                                        <p class="font-base">{{ __('100 Credits for 100 $') }}</p>
                                        <p class="text-gray-400 text-sm">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit,') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <x-badge variant="transparent" type="square" class="text-success-600">
                                    <x-icon name="success" class="w-4 h-4 mr-2"/>
                                    {{__("Paid")}}
                                </x-badge>
                            </div>
                            <div class="col-span-2">
                                <p class="font-base">{{ __('USD $ 100.0') }}</p>
                            </div>
                            <div class="col-span-2">
                                <p class="font-base">{{ __('PRO') }}</p>
                            </div>
                            <div class="download text-right col-span-2 pr-8">
                                <button class="font-base hover:text-secondary">{{ __('Download') }}</button>
                            </div>
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
        </div>
    </x-container>
</x-app-layout>