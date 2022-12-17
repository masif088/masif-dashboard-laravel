@props(['chart'])
@switch($chart['type'])
    @case('line')
    @case('area')
    @case('bar')
    <x-chart-component.time-series :chart="$chart"/>
        @break
    @case('pie')
    @case('donut')
    <x-chart-component.non-time-series :chart="$chart"/>
    @break
    @default

        <h4>There was an input error on the chart type</h4>


@endswitch
