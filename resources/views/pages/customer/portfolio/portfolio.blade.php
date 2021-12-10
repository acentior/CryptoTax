<x-app-layout>
    @if(auth()->user()->isCustomerAccount())
    <div class="mx-auto my-5 px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5 py-5 bg-white rounded-sm shadow">
        @livewire('portfolio.header')
        @livewire('portfolio.situation')
        @livewire('portfolio.linechart')
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 md:gap-4 py-4">
            <div class="col-span-1 space-y-5 h-full">
                <div class="border rounded-lg p-5">
                    @livewire('portfolio.allocation')
                </div>
                <div class="border rounded-lg p-5 bg-gray-100 relative">
                    @livewire('portfolio.invite')
                    <img src="{{asset('assets/img/png/portfolio_invite.png')}}" class=" absolute bottom-0 right-0 w-40 h-22"/>
                </div>
            </div>
            <div class="col-span-2 border rounded-lg p-5">
                @livewire('portfolio.cryptoportfolio')
            </div>
        </div>
    </div>
    @endif
</x-app-layout>