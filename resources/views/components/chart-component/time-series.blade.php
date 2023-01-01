@props(['chart'])
@php($random=rand())
<div class="">
    <div id="chart{{$random}}"></div>
    <script>
        document.addEventListener('livewire:load', function () {
            const cssColors = (color) => {
                return getComputedStyle(document.documentElement).getPropertyValue(color)
            }

            const getTheme = () => {
                if (window.localStorage.getItem('dark') === 'true') {
                    return 'dark'
                } else {
                    return 'light'
                }
            }
            const getColorChart = () => {
                return window.localStorage.getItem('color') ?? 'cyan'
            }
            const getForeColors = () => {
                if (window.localStorage.getItem('dark') === 'true') {
                    return getComputedStyle(document.documentElement).getPropertyValue('--light');
                } else {
                    return getComputedStyle(document.documentElement).getPropertyValue('--dark');
                }

            }

            const colors = {
                // light:cssColors('--light');
                primary: cssColors(`--color-${getColorChart()}`),
                primaryLight: cssColors(`--color-${getColorChart()}-light`),
                primaryLighter: cssColors(`--color-${getColorChart()}-lighter`),
                primaryDark: cssColors(`--color-${getColorChart()}-dark`),
                primaryDarker: cssColors(`--color-${getColorChart()}-darker`),
            }


            var options = {
                colors: [colors.primaryLight, colors.primaryLighter],
                chart: {
                    foreColor: getForeColors(),
                    type: '{{ $chart['type'] }}',
                    height: 300,

                },
                tooltip: {
                    enabled: true,
                    enabledOnSeries: undefined,
                    shared: true,
                    followCursor: true,
                    inverseOrder: true,
                    theme: getTheme(),
                    y: {
                        formatter: function (val) {
                            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }
                    },
                },
                series: [
                        @foreach($chart['data'] as $value)
                    {
                        name: '{{ $value['label'] }}',
                        data: [
                            @foreach($value['value'] as $v)
                                {{ $v }},
                            @endforeach
                        ]
                    },
                    @endforeach
                ],
                xaxis: {
                    categories: [
                        @foreach($chart['categories'] as $v)
                            '{{ $v }}',
                        @endforeach
                    ]
                }
            }
            var chart = new ApexCharts(document.querySelector("#chart{{$random}}"), options);
            chart.render();
        });
    </script>
</div>
