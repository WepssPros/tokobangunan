@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Total Shipments</h5>
                        <h2 class="card-title">Performance</h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Accounts</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Purchases</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sessions</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="py-20 px-20">

                    <div class="w-full h-full" id="container"></div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total Shipments</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>
                    Rp. {{number_format($transactions->sum('shipping_price'))}}</h3>
            </div>
            <div class="card-body">
                <div class="w-full h-full" id="container1"></div>

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Daily Sales</h5>
                <h3 class="card-title"><i
                        class="tim-icons icon-delivery-fast text-info"></i>Rp.{{number_format($transactions->sum('total_price'))}}
                </h3>
            </div>
            <div class="card-body">

                <div id="container2"></div>

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Completed Tasks</h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
            </div>
            <div class="card-body">

                <div id="container4"></div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-md-12">
        <div class="card card-tasks">
            <div class="card-header ">
                <h6 class="title d-inline">Product({{$products->count()}})</h6>
                <p class="card-category d-inline">today</p>
                <div class="dropdown">
                    <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                        <i class="tim-icons icon-settings-gear-63"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#pablo">Action</a>
                        <a class="dropdown-item" href="#pablo">Another action</a>
                        <a class="dropdown-item" href="#pablo">Something else</a>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-full-width table-responsive">
                    <table class="table">
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="text-center">
                                    <div class="photo">
                                        <img src="{{ $product->galleries()->exists() ? ($product->galleries->first()->url) : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mN88B8AAsUB4ZtvXtIAAAAASUVORK5CYII=' }}"
                                            alt="photo">
                                    </div>
                                </td>
                                <td>
                                    <p class="title">{{$product->name}}</p>
                                    <p class="text-muted">{{$product->category->name}}</p>
                                </td>
                                <td class="td-actions text-right">
                                    <form action="{{route('dashboard.product.edit', $product->id)}}" method="get">
                                        @csrf
                                        <button type="submit" rel="tooltip" title="" class="btn btn-link"
                                            data-original-title="Edit Task">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">Tidak ada Produk</p>
                                    <p class="text-muted">Silahkan Input Product</p>
                                </td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-link"
                                        data-original-title="Edit Task">
                                        <i class="tim-icons icon-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <div class="tools float-right">
                    <div class="dropdown">
                        <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="tim-icons icon-settings-gear-63"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="top-end"
                            style="position: absolute; transform: translate3d(-122px, -306px, 0px); top: 0px; left: 0px; will-change: transform;"
                            x-out-of-boundaries="">
                            <a class="dropdown-item" href="#pablo">Action</a>
                            <a class="dropdown-item" href="#pablo">Another action</a>
                            <a class="dropdown-item" href="#pablo">Something else</a>
                            <a class="dropdown-item text-danger" href="#pablo">Remove Data</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title">Transaksi Table</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive ps">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Status
                                </th>
                                <th class="text-right">
                                    Total
                                </th>
                                <th class="text-right">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                            <tr>
                                <td class="text-center">
                                    <div class="photo">
                                        <img src="{{$transaction->user->profile_photo_url}}" alt="photo">
                                    </div>
                                </td>
                                <td>
                                    {{$transaction->user->name}}
                                </td>
                                <td>
                                    {{$transaction->address}}
                                </td>
                                <td class="text-center">
                                    {{$transaction->status}}
                                </td>
                                <td class="text-right">
                                    Rp. {{number_format($transaction->total_price)}}
                                </td>
                                <td class="text-right">
                                    <button type="button" rel="tooltip"
                                        class="btn btn-success btn-link btn-icon btn-sm btn-neutral"
                                        data-original-title="Refresh" title="">
                                        <i class="tim-icons icon-refresh-01"></i>
                                    </button>
                                    <button type="button" rel="tooltip"
                                        class="btn btn-danger btn-link btn-icon btn-sm btn-neutral"
                                        data-original-title="Delete" title="">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                Data Kosong.
                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    Highcharts.chart('container4', {
        title: {
            text: '',
            align: 'left'
        },
        xAxis: {
            categories: ['Jet fuel', 'Duty-free diesel', 'Petrol', 'Diesel', 'Gas oil']
        },
        yAxis: {
            title: {
                text: 'Million liters'
            }
        },
        tooltip: {
            valueSuffix: ' million liters'
        },
        series: [{
            type: 'column',
            name: '2020',
            data: [59, 83, 65, 228, 184]
        }, {
            type: 'column',
            name: '2021',
            data: [24, 79, 72, 240, 167]
        }, {
            type: 'column',
            name: '2022',
            data: [58, 88, 75, 250, 176]
        }, {
            type: 'spline',
            name: 'Average',
            data: [47, 83.33, 70.66, 239.33, 175.66],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: 'Total',
            data: [{
                name: '2020',
                y: 619,
                color: Highcharts.getOptions().colors[0], // 2020 color
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    format: '{point.total} M',
                    style: {
                        fontSize: '15px'
                    }
                }
            }, {
                name: '2021',
                y: 586,
                color: Highcharts.getOptions().colors[1] // 2021 color
            }, {
                name: '2022',
                y: 647,
                color: Highcharts.getOptions().colors[2] // 2022 color
            }],
            center: [75, 65],
            size: 100,
            innerSize: '70%',
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        }]
    });

</script>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Column chart with negative values'
        },
        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'John',
            data: [5, 3, 4, 7, 2]
        }, {
            name: 'Jane',
            data: [2, -2, -3, 2, 1]
        }, {
            name: 'Joe',
            data: [3, 4, 4, -2, 5]
        }]
    });

</script>

<script>
    Highcharts.chart('container1', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: ''
        },
        subtitle: {
            align: 'left',
            text: ''
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Browsers',
            colorByPoint: true,
            data: [{
                    name: 'Chrome',
                    y: 63.06,
                    drilldown: 'Chrome'
                },
                {
                    name: 'Safari',
                    y: 19.84,
                    drilldown: 'Safari'
                },
                {
                    name: 'Firefox',
                    y: 4.18,
                    drilldown: 'Firefox'
                },
                {
                    name: 'Edge',
                    y: 4.12,
                    drilldown: 'Edge'
                },
                {
                    name: 'Opera',
                    y: 2.33,
                    drilldown: 'Opera'
                },
                {
                    name: 'Internet Explorer',
                    y: 0.45,
                    drilldown: 'Internet Explorer'
                },
                {
                    name: 'Other',
                    y: 1.582,
                    drilldown: null
                }
            ]
        }],
        drilldown: {
            breadcrumbs: {
                position: {
                    align: 'right'
                }
            },
            series: [{
                    name: 'Chrome',
                    id: 'Chrome',
                    data: [
                        [
                            'v65.0',
                            0.1
                        ],
                        [
                            'v64.0',
                            1.3
                        ],
                        [
                            'v63.0',
                            53.02
                        ],
                        [
                            'v62.0',
                            1.4
                        ],
                        [
                            'v61.0',
                            0.88
                        ],
                        [
                            'v60.0',
                            0.56
                        ],
                        [
                            'v59.0',
                            0.45
                        ],
                        [
                            'v58.0',
                            0.49
                        ],
                        [
                            'v57.0',
                            0.32
                        ],
                        [
                            'v56.0',
                            0.29
                        ],
                        [
                            'v55.0',
                            0.79
                        ],
                        [
                            'v54.0',
                            0.18
                        ],
                        [
                            'v51.0',
                            0.13
                        ],
                        [
                            'v49.0',
                            2.16
                        ],
                        [
                            'v48.0',
                            0.13
                        ],
                        [
                            'v47.0',
                            0.11
                        ],
                        [
                            'v43.0',
                            0.17
                        ],
                        [
                            'v29.0',
                            0.26
                        ]
                    ]
                },
                {
                    name: 'Firefox',
                    id: 'Firefox',
                    data: [
                        [
                            'v58.0',
                            1.02
                        ],
                        [
                            'v57.0',
                            7.36
                        ],
                        [
                            'v56.0',
                            0.35
                        ],
                        [
                            'v55.0',
                            0.11
                        ],
                        [
                            'v54.0',
                            0.1
                        ],
                        [
                            'v52.0',
                            0.95
                        ],
                        [
                            'v51.0',
                            0.15
                        ],
                        [
                            'v50.0',
                            0.1
                        ],
                        [
                            'v48.0',
                            0.31
                        ],
                        [
                            'v47.0',
                            0.12
                        ]
                    ]
                },
                {
                    name: 'Internet Explorer',
                    id: 'Internet Explorer',
                    data: [
                        [
                            'v11.0',
                            6.2
                        ],
                        [
                            'v10.0',
                            0.29
                        ],
                        [
                            'v9.0',
                            0.27
                        ],
                        [
                            'v8.0',
                            0.47
                        ]
                    ]
                },
                {
                    name: 'Safari',
                    id: 'Safari',
                    data: [
                        [
                            'v11.0',
                            3.39
                        ],
                        [
                            'v10.1',
                            0.96
                        ],
                        [
                            'v10.0',
                            0.36
                        ],
                        [
                            'v9.1',
                            0.54
                        ],
                        [
                            'v9.0',
                            0.13
                        ],
                        [
                            'v5.1',
                            0.2
                        ]
                    ]
                },
                {
                    name: 'Edge',
                    id: 'Edge',
                    data: [
                        [
                            'v16',
                            2.6
                        ],
                        [
                            'v15',
                            0.92
                        ],
                        [
                            'v14',
                            0.4
                        ],
                        [
                            'v13',
                            0.1
                        ]
                    ]
                },
                {
                    name: 'Opera',
                    id: 'Opera',
                    data: [
                        [
                            'v50.0',
                            0.96
                        ],
                        [
                            'v49.0',
                            0.82
                        ],
                        [
                            'v12.1',
                            0.14
                        ]
                    ]
                }
            ]
        }
    });

</script>

<script>
    // Create the chart
    Highcharts.chart('container2', {
        chart: {
            type: 'pie'
        },
        title: {
            text: '',
            align: 'left'
        },
        subtitle: {
            text: '',
            align: 'left'
        },

        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Browsers',
            colorByPoint: true,
            data: [{
                    name: 'Chrome',
                    y: 61.04,
                    drilldown: 'Chrome'
                },
                {
                    name: 'Safari',
                    y: 9.47,
                    drilldown: 'Safari'
                },
                {
                    name: 'Edge',
                    y: 9.32,
                    drilldown: 'Edge'
                },
                {
                    name: 'Firefox',
                    y: 8.15,
                    drilldown: 'Firefox'
                },
                {
                    name: 'Other',
                    y: 11.02,
                    drilldown: null
                }
            ]
        }],
        drilldown: {
            series: [{
                    name: 'Chrome',
                    id: 'Chrome',
                    data: [
                        [
                            'v97.0',
                            36.89
                        ],
                        [
                            'v96.0',
                            18.16
                        ],
                        [
                            'v95.0',
                            0.54
                        ],
                        [
                            'v94.0',
                            0.7
                        ],
                        [
                            'v93.0',
                            0.8
                        ],
                        [
                            'v92.0',
                            0.41
                        ],
                        [
                            'v91.0',
                            0.31
                        ],
                        [
                            'v90.0',
                            0.13
                        ],
                        [
                            'v89.0',
                            0.14
                        ],
                        [
                            'v88.0',
                            0.1
                        ],
                        [
                            'v87.0',
                            0.35
                        ],
                        [
                            'v86.0',
                            0.17
                        ],
                        [
                            'v85.0',
                            0.18
                        ],
                        [
                            'v84.0',
                            0.17
                        ],
                        [
                            'v83.0',
                            0.21
                        ],
                        [
                            'v81.0',
                            0.1
                        ],
                        [
                            'v80.0',
                            0.16
                        ],
                        [
                            'v79.0',
                            0.43
                        ],
                        [
                            'v78.0',
                            0.11
                        ],
                        [
                            'v76.0',
                            0.16
                        ],
                        [
                            'v75.0',
                            0.15
                        ],
                        [
                            'v72.0',
                            0.14
                        ],
                        [
                            'v70.0',
                            0.11
                        ],
                        [
                            'v69.0',
                            0.13
                        ],
                        [
                            'v56.0',
                            0.12
                        ],
                        [
                            'v49.0',
                            0.17
                        ]
                    ]
                },
                {
                    name: 'Safari',
                    id: 'Safari',
                    data: [
                        [
                            'v15.3',
                            0.1
                        ],
                        [
                            'v15.2',
                            2.01
                        ],
                        [
                            'v15.1',
                            2.29
                        ],
                        [
                            'v15.0',
                            0.49
                        ],
                        [
                            'v14.1',
                            2.48
                        ],
                        [
                            'v14.0',
                            0.64
                        ],
                        [
                            'v13.1',
                            1.17
                        ],
                        [
                            'v13.0',
                            0.13
                        ],
                        [
                            'v12.1',
                            0.16
                        ]
                    ]
                },
                {
                    name: 'Edge',
                    id: 'Edge',
                    data: [
                        [
                            'v97',
                            6.62
                        ],
                        [
                            'v96',
                            2.55
                        ],
                        [
                            'v95',
                            0.15
                        ]
                    ]
                },
                {
                    name: 'Firefox',
                    id: 'Firefox',
                    data: [
                        [
                            'v96.0',
                            4.17
                        ],
                        [
                            'v95.0',
                            3.33
                        ],
                        [
                            'v94.0',
                            0.11
                        ],
                        [
                            'v91.0',
                            0.23
                        ],
                        [
                            'v78.0',
                            0.16
                        ],
                        [
                            'v52.0',
                            0.15
                        ]
                    ]
                }
            ]
        }
    });

</script>


script
<script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
<script>
    $(document).ready(function () {
        demo.initDashboardPageCharts();
    });

</script>
@endpush
