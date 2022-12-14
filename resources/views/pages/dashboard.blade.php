<x-app-layout title="Dashboard">
    @if(auth()->user()->isCustomerAccount())
        <div class="px-3 py-6 mx-auto xl:max-w-screen-2xl xs:px-4 lg:px-5">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-x-0 md:gap-x-6 gap-y-6 md:gap-y-0">
                <div class="h-full col-span-7">
                    @livewire('customer.dashboard.about')
                    @livewire('customer.dashboard.performance')
                </div>
                <div class="col-span-5">
                    @livewire('customer.dashboard.balance')
                    @livewire('customer.dashboard.taxes')
                </div>
            </div>
            <div class="my-6">
                @livewire('customer.dashboard.portfolio')
            </div>
            <div class="grid grid-cols-1 md:grid-cols-12 md:gap-x-5 gap-x-0 gap-y-5 md:gap-y-0">
                <div class="col-span-5">
                    @livewire('customer.dashboard.transaction')
                </div>
                <div class="col-span-7">
                    @livewire('customer.dashboard.news')
                </div>
            </div>
        </div>
    @elseif(auth()->user()->isAdminAccount())
        <x-page icon="fas-home" :title="__('Admin Dashboard')">
            <p class="block mb-8">This is the Admin Dashboard</p>
        </x-page>

        @php($gitInfo = getGitInfos())
        <div class="grid w-full grid-cols-2 gap-4 px-1 pt-8 mx-auto xs:px-4 xl:max-w-screen-2xl lg:px-5">
            <div class="px-2 bg-white border border-gray-200 xs:px-4 lg:px-8">
                <p class="block my-3 text-xl">Git Status</p>
                <code>{!! implode("<br>", $gitInfo["status"]) !!}</code>
            </div>
            <div class="px-2 bg-white border border-gray-200 xs:px-4 lg:px-8">
                <p class="block my-3 text-xl">Git Log</p>
                <code>{!! implode("<br>", $gitInfo["log"]) !!}</code>
            </div>
        </div>
    @elseif(auth()->user()->isTaxAdvisorAccount())
        <x-page icon="fas-home" :title="__('Tax Advisor Dashboard')">
            <p class="block mb-8">This is the Tax Advisor-Dashboard.</p>
        </x-page>
    @elseif(auth()->user()->isEditorAccount())
        <x-page icon="fas-home" :title="__('Editor Dashboard')">
            <p class="block mb-8">This is the Editor Dashboard</p>
        </x-page>
    @elseif(auth()->user()->isSupportAccount())
        <x-page icon="fas-home" :title="__('Support Dashboard')">
            <p class="block mb-8">This is the Support-Dashboard.</p>
        </x-page>
    @endif
</x-app-layout>
