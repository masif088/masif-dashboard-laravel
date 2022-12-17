@props(['chart'])
@php($random=rand())
<div class="">
    <div id="chart{{$random}}"></div>
    <script>
        document.addEventListener('livewire:load', function () {
            const cssColors = (color) => {
                return getComputedStyle(document.documentElement).getPropertyValue(color)
            }

            const getColorChart = () => {
                return window.localStorage.getItem('color') ?? 'cyan'
            }
            const getForeColors = () => {
                console.log(window.localStorage.getItem('dark'));
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
                series: [
                    @foreach($chart['data'] as $v)
                        {{ $v }},
                    @endforeach
                ],
                    labels: [
                        @foreach($chart['categories'] as $v)
                            '{{ $v }}',
                        @endforeach
                    ],
                chart: {
                    foreColor: getForeColors(),
                    type: '{{ $chart['type'] }}',
                    height: 300,
                    toolbar: {
                        show: true,
                    },
                },

                legend: {
                    position: '{{ isset($chart['legend'])?$chart['legend']:'bottom' }}',
                    offsetX: 0,
                    showForSingleSeries: false,
                    showForNullSeries: true,
                    showForZeroSeries: true,
                },
            }
            var chart = new ApexCharts(document.querySelector("#chart{{$random}}"), options);
            chart.render();
        });
    </script>
</div>
