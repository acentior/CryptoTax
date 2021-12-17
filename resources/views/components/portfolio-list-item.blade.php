<div class="mt-2">
    <div class="grid grid-cols-11 min-w-clg py-6 border rounded-md bg-white hover:bg-gray-100">
        <div class="col-span-1 flex justify-center items-center">
            <button class="w-8 h-8 bg-white shadow-md rounded-full flex justify-center items-center" @click="selected !== {{ $selectedId }} ? selected = {{ $selectedId }} : selected = null">
                <x-icon name="fas-chevron-down" class="text-secondary w-12 h-5"/>
            </button>
        </div>
        <div class="col-span-2 flex justify-start items-center space-x-2 px-5">
            <div class="w-14 h-14 flex justify-center items-center bg-warning rounded-lg">
                <x-icon name="{{ $icon }}" class="w-10 h-10 text-white"></x-icon>
            </div>
            <div>
                <p class="text-xl font-semibold ">{{ $name }}</p>
                <p class="text-gray-400">{{ $type }}</p>
            </div>
        </div>
        <div class="col-span-1 flex justify-end items-center space-x-2">
            <p class="text-xl font-semibold ">$ 69,729.64</p>
        </div>
        <div class="col-span-3 flex justify-center items-center space-x-2">
            <div id="{{ $id }}" class="-my-5"></div>
        </div>
        <div class="col-span-1 flex justify-start items-center space-x-2">
            <div>
                <p class="text-basic font-semibold text-primary">0.1002365 BTC</p>
                <p class="text-primary">$ 4,886.64</p>
            </div>
        </div>
        <div class="col-span-1 flex justify-end items-center space-x-2">
            <p class="text-xl font-bold">56 %</p>
        </div>
        <div class="col-span-2 flex justify-center items-center space-x-2">
            <div>
                <p>$ 9,402.19</p>
                <x-badge >{{ __("+2.5%") }}</x-badge>
            </div>
        </div>
    </div>

    <div x-show="selected == {{ $selectedId }}">
        <div class="grid grid-cols-11 min-w-clg py-6 border bg-white rounded-md">
            <div class="col-span-1 flex justify-center items-center"> </div>
            <div class="col-span-2 flex justify-start items-center space-x-2 px-5">
                <div class="w-12 h-12 flex justify-center items-center bg-secondary rounded-lg">
                    <x-icon name="bitcoin" class="w-10 h-10 text-white"></x-icon>
                </div>
                <div>
                    <p class="text-xl font-semibold ">Bitcoin</p>
                    <p class="text-gray-400">BIT</p>
                </div>
            </div>
            <div class="col-span-1 flex justify-end items-center space-x-2">
                <p class="text-xl font-semibold ">$ 69,729.64</p>
            </div>
            <div class="col-span-3 flex justify-center items-center space-x-2">
              
            </div>
            <div class="col-span-1 flex justify-start items-center space-x-2">
                <div>
                    <p class="text-basic font-semibold text-primary">0.1002365 BTC</p>
                    <p class="text-primary">$ 4,886.64</p>
                </div>
            </div>
            <div class="col-span-1 flex justify-end items-center space-x-2">
                <p class="text-xl font-bold">56 %</p>
            </div>
            <div class="col-span-2 flex justify-center items-center space-x-2">
                <div>
                    <p>$ 9,402.19</p>
                    <x-badge >{{ __("+2.5%") }}</x-badge>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-11 min-w-clg py-6 border bg-white rounded-md">
            <div class="col-span-1 flex justify-center items-center"> </div>
            <div class="col-span-2 flex justify-start items-center space-x-2 px-5">
                <div class="w-12 h-12 flex justify-center items-center bg-danger rounded-lg">
                    <x-icon name="bitcoin" class="w-10 h-10 text-white"></x-icon>
                </div>
                <div>
                    <p class="text-xl font-semibold ">Bitcoin</p>
                    <p class="text-gray-400">BIT</p>
                </div>
            </div>
            <div class="col-span-1 flex justify-end items-center space-x-2">
                <p class="text-xl font-semibold ">$ 69,729.64</p>
            </div>
            <div class="col-span-3 flex justify-center items-center space-x-2">
              
            </div>
            <div class="col-span-1 flex justify-start items-center space-x-2">
                <div>
                    <p class="text-basic font-semibold text-primary">0.1002365 BTC</p>
                    <p class="text-primary">$ 4,886.64</p>
                </div>
            </div>
            <div class="col-span-1 flex justify-end items-center space-x-2">
                <p class="text-xl font-bold">56 %</p>
            </div>
            <div class="col-span-2 flex justify-center items-center space-x-2">
                <div>
                    <p>$ 9,402.19</p>
                    <x-badge >{{ __("+2.5%") }}</x-badge>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
 <script>
        (function () {
            var options = {
                chart: {
                    type: 'line',
                    toolbar: {
                        show: false,
                    },
                    height: 80,
                    dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 2,
                        color: '#000',
                        opacity: 0.75
                    }
                },
                series: [{
                    name: 'sales',
                    data: [30,50,35,50,49,20,70,30,50,90,89,70,120,110,50]
                }],
                grid: {
                    show: false,
                    padding: {
                        left: 40,
                        right: 40,
                    },
                },
                xaxis: {
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    tooltip: {
                        enabled: false
                    }
                },
                yaxis: {
                    show: false
                },
                legend: {
                    show: false
                },
                stroke: {
                    curve: 'straight',
                    width: 2
                },
                colors: ["{{ $lingColor }}"],              
            }
            const chart = new ApexCharts(document.getElementById(`{{ $id }}`), options);
            chart.render();
        }());
    </script>
@endpush