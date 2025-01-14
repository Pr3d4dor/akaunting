@php $chart = $class->getChart(); @endphp

<div class="card-body" id="report-chart">
    {!! $chart->container() !!}
</div>

@push('charts')
    <script>
        var cash_flow = new Vue({
            el: '#report-chart',
        });
    </script>
@endpush

@push('body_scripts')
    {!! $chart->script() !!}
@endpush
