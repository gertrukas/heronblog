<div class="grid grid-cols-12 gap-2">



    <div class="col-span-12 flex justify-end gap-2 mt-4">
        <div>
            <select class="form-select " wire:model='month'>
                @foreach ($this->months as $mo)
                    <option value="{{ $mo['num'] }}">{{ $mo['name'] }}</option>
                @endforeach

            </select>
        </div>
        <div>
            <select class="form-select " wire:model='year'>
                @foreach ($this->years as $ye)
                    <option value="{{ $ye }}">{{ $ye }} </option>
                @endforeach

            </select>
        </div>

    </div>

    <div class="col-span-12 xl:col-span-6 mt-2">
        <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5"> Contratos generados al dia por mes</h2>

        </div>


        <div class="intro-y box p-5 mt-2 sm:mt-5">
            <div class="flex flex-col md:flex-row md:items-center">
                <div class="flex">
                    <div>
                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium"> #
                            {{ $countContrast }}</div>
                        <div class="mt-0.5 text-slate-500">Mes Actual</div>
                    </div>
                    <div
                        class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                    </div>
                    <div>
                        <div class="text-slate-500 text-lg xl:text-xl font-medium"># {{ $countContrastLast }}</div>
                        <div class="mt-0.5 text-slate-500">Mes Pasado</div>
                    </div>
                </div>

            </div>
            <div class="report-chart">
                <canvas id="report-line-chart" height="150" data-data="{{ json_encode($this->reportChartOne) }}"
                    class="mt-6">
                </canvas>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-6 mt-2">
        <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Cantidad ingresada al dia por mes</h2>

        </div>

        {{-- @json($month) --}}
        <div class="intro-y box p-5 mt-2 sm:mt-5">
            <div class="flex flex-col md:flex-row md:items-center">
                <div class="flex">
                    <div>
                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                            {{ currency($amountContrast) }}</div>
                        <div class="mt-0.5 text-slate-500">Mes Actual</div>
                    </div>
                    <div
                        class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                    </div>
                    <div>
                        <div class="text-slate-500 text-lg xl:text-xl font-medium">{{ currency($amountContrastLast) }}
                        </div>
                        <div class="mt-0.5 text-slate-500">Mes Pasado</div>
                    </div>
                </div>

            </div>
            <div class="report-chart">
                <canvas id="report-line-chart_two" height="150" data-data="{{ json_encode($this->reportChartTwo) }}"
                    class="mt-6">
                </canvas>
            </div>
        </div>
    </div>

</div>
