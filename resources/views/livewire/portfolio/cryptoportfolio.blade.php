<div>
    {{-- The whole world belongs to you. --}}
    <div class="flex justify-between items-center">
        <div class="flex items-center justify-start space-x-6 col-span-3 py-5">
            <img src="{{asset('assets/img/icon/portfolio.png')}}" class="w-10 h-8"/>
            <h4 class="text-2xl font-extrabold">My Crypto Portfolio</h4>
        </div>
        <button class="bg-color px-4 py-2 rounded-md text-white font-bold">See all assets</button>
    </div>
    <div class="overflow-auto">
        <table class="min-w-clg w-full border my-5 px-5" style="min-width: 500px">
            <thead class="shadow-md">
                <tr class="py-5">
                    <th class="py-5 text-left pl-5">Name</th>
                    <th class="py-5 text-right">Holdings</th>
                    <th class="py-5 text-right">Price</th>
                    <th class="py-5 text-center">All time unrealized return</th>
                </tr>
            </thead>
            <tbody>
                <tr class="px-5 bg-gray-100">
                    <td class="p-3 flex items-left space-x-4">
                        <img src="{{asset('assets/img/icon/eth2.png')}}" class="w-16 h-16"/>
                        <div class="text-left">
                            <p class=" font-extrabold text-black">Ethereum 2</p>
                            <p class="text-gray-300">ETH2</p>
                        </div>
                    </td>
                    <td class="py-5 text-right">
                        <p>$1663</p>
                        <p class="text-gray-300">0.2261929</p>
                        <p>ETH2</p>
                    </td>
                    <td class="py-5 text-right">
                        <p>$3156.85</p>
                    </td>
                    <td class="py-5 text-center">
                        <p>$699.12</p>
                        <span class="inline-flex items-center justify-center px-5 py-3 text-xs font-bold leading-none text-white bg-red-500 rounded">-27.54%</span>
                    </td>
                </tr>
                <tr class="px-5">
                    <td class="p-3 flex items-center space-x-4 text-left">
                        <img src="{{asset('assets/img/icon/kucoin.png')}}" class="w-16 h-16"/>
                        <div class="text-left">
                            <p class=" font-extrabold text-black">KuCoin Token</p>
                            <p class="text-gray-300">KCS</p>
                        </div>
                    </td>
                    <td class="py-5 text-right">
                        <p>$1663</p>
                        <p class="text-gray-300">0.2261929</p>
                        <p>KCS</p>
                    </td>
                    <td class="py-5 text-right">
                        <p>$3156.85</p>
                    </td>
                    <td class="py-5 text-center">
                        <p>$699.12</p>
                    </td>
                </tr>
                <tr class="px-5 bg-gray-100">
                    <td class="p-3 flex items-center space-x-4">
                        <img src="{{asset('assets/img/icon/dashcoin.png')}}" class="w-16 h-16"/>
                        <div class="text-left">
                            <p class=" font-extrabold text-black">Dash Coin</p>
                            <p class="text-gray-300">GZIL</p>
                        </div>
                    </td>
                    <td class="py-3 text-right">
                        <p>$1663</p>
                        <p class="text-gray-300">0.2261929</p>
                        <p>GZIL</p>
                    </td>
                    <td class="py-3 text-right">
                        <p>$3156.85</p>
                    </td>
                    <td class="py-5 text-center">
                        <p>$699.12</p>
                        <span class="inline-flex items-center justify-center px-5 py-3 text-xs font-bold leading-none text-white bg-green-500 rounded">+27.54%</span>
                    </td>
                </tr>
                <tr class="px-5">
                    <td class="p-3 flex items-center space-x-4">
                        <img src="{{asset('assets/img/icon/bitecoin.png')}}" class="w-16 h-16"/>
                        <div class="text-left">
                            <p class=" font-extrabold text-black">Bitecoin</p>
                            <p class="text-gray-300">ETH2</p>
                        </div>
                    </td>
                    <td class="py-5 text-right">
                        <p>$1663</p>
                        <p class="text-gray-300">0.2261929</p>
                        <p>ETH2</p>
                    </td>
                    <td class="py-5 text-right">
                        <p>$3156.85</p>
                    </td>
                    <td class="py-5 text-center">
                        <p>$699.12</p>
                    </td>
                </tr>                
            </tbody>
        </table>
    </div>
</div>