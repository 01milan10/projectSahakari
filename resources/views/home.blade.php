@extends('layouts.backend.app')

@section('header')
@include('layouts.backend.header')
@endsection

@section('sidebar')
@include('layouts.backend.sidebar')
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaction Representation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info" id="line_chart_card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                Line Chart
                            </h3>

                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <div id="line-chart"></div>
                        </div>
                        <div class="card-footer">
                            <label>Show Graph By:
                                <select id="selectMenuLine">
                                    <option value="0.033">day</option>
                                    <option value="0.25">week</option>
                                    <option value="1">month</option>
                                    <option value="12">year</option>
                                </select>
                            </label>
                            <!-- <button class="btn btn-info float-right">
                                <i class="fas fa-file-download mr-2"></i>
                                Download
                            </button> -->
                        </div>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                Bar Chart
                            </h3>

                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <div id="bar-chart"></div>
                        </div>
                        <div class="card-footer">
                            <label>Show Graph By Year:
                                <select id="selectMenuBar">
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                </select>
                            </label>
                            <!-- <button class="btn btn-info float-right">
                                <i class="fas fa-file-download mr-2"></i>
                                Download
                            </button> -->
                        </div>
                        <!-- /.card-body-->
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
</div>
@endsection

@section('footer')
@include('layouts.backend.footer')
@endsection

@section('script')
<script src="{{asset('js/jquery.flot.js')}}"></script>
<script src="{{asset('js/jquery.flot.js')}}"></script>
<script src="{{asset('js/jquery.flot.time.min.js')}}"></script>
<script src="{{asset('js/underscore.js')}}"></script>
<script src="{{asset('js/flot.orderbar.js')}}"></script>
<script src="{{asset('js/flot.axisLabels.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>


<script>
    $(function() {
        let i;
        let date;
        let deposited_amount;
        let withdrawn_amount;
        let plot_data1 = [];
        let plot_data2 = [];
        let frame;
        let barFrame;
        $(document).ready(function() {
            $.ajax({
                type: 'get',
                url: '/retrieveBalance',
                dataType: 'json',
                success: function(response) {
                    for (i = 0; i < Object.keys(response).length; i++) {
                        date = new Date(response[i].collected_date);
                        deposited_amount = response[i].deposited_amount;
                        withdrawn_amount = response[i].withdrawn_amount;
                        plot_data1.push([date, deposited_amount]);
                        plot_data2.push([date, withdrawn_amount]);
                    }

                    $("#selectMenuLine").change(function() {
                        frame = $("#selectMenuLine option:selected").val();
                        line1 = {
                            data: groupDeposit(response, frame),
                            color: '#3c8dbc',
                            label: 'Total deposit in NPR',
                        }
                        line2 = {
                            data: groupWithdraw(response, frame),
                            color: '#f56954',
                            label: 'Total withdraw in NPR',
                        }
                        plot_line(line1, line2, frame);
                    });
                    $("#selectMenuBar").change(function() {
                        barFrame = $("#selectMenuBar option:selected").val();
                        bar1 = {
                            data: groupDataForBarChart(response, barFrame),
                            color: '#3c8dbc',
                            bars: {
                                show: true,
                                order: 1
                            },
                            label: "Total deposits per month in " + barFrame + '.',

                        }
                        bar2 = {
                            data: groupDataForBarChartWithdraw(response, barFrame),
                            color: '#f56954',
                            bars: {
                                show: true,
                                order: 2
                            },
                            label: "Total withdraw per month in " + barFrame + '.',

                        }
                        plot_bar(bar1, bar2)
                    });

                    line1 = {
                        data: plot_data1,
                        plot_data2,
                        color: '#3c8dbc',
                        label: 'Total deposit in NPR',
                    }
                    line2 = {
                        data: plot_data2,
                        color: '#f56954',
                        label: 'Total withdraw in NPR',

                    }
                    bar1 = {
                        data: groupDataForBarChart(response, new Date().getFullYear()),
                        color: '#3c8dbc',
                        bars: {
                            show: true,
                            order: 1
                        },
                        label: "Total deposits per month in " + new Date().getFullYear() + '.',
                    }
                    bar2 = {
                        data: groupDataForBarChart(response, new Date().getFullYear()),
                        color: '#f56954',
                        bars: {
                            show: true,
                            order: 2
                        },
                        label: "Total withdraw per month in " + new Date().getFullYear() + '.',


                    }
                    plot_line(line1, line2, 0.033);
                    plot_bar(bar1, bar2, new Date().getFullYear());
                },
                fail: function() {
                    alert('Failed to retrieve data.')
                }
            });
        });

        function plot_line(lineA, lineB, a) {
            $("#line-chart").attr({
                "style": "height:400px; width:100%",
            })
            $.plot('#line-chart', [lineA, lineB], {
                grid: {
                    hoverable: true,
                    borderColor: '#f3f3f3',
                    borderWidth: 5,
                    tickColor: '#f3f3f3',
                },
                series: {
                    shadowSize: 5,
                    lines: {
                        show: true
                    },
                    points: {
                        show: true,
                        radius: 5,
                    },
                },
                lines: {
                    fill: true,
                    steps: false,

                },
                yaxis: {
                    show: true,
                    axisLabel: "Amount in NPR",
                },
                xaxis: {
                    axisLabel: "Date",
                    show: true,
                    mode: 'time',
                    timeformat: ((a <= 1) ? "%b<br>%y" : "%Y"),
                    tickSize: [(a < 1) ? 1 : a, "month"],
                    minTickSize: [28, 'days'],
                    max: (new Date().getTime()),
                    min: ((a <= 1) ? (new Date().getTime() - 365 * 12 * 60 * 60 * 1000) : new Date().getTime() - 365 * 24 * 60 * 60 * 1000 * 6),
                }
            });
        }

        function plot_bar(bar1, bar2) {
            $("#bar-chart").attr({
                "style": "height:400px; width:100%",
            })
            $.plot('#bar-chart', [bar1, bar2], {
                grid: {
                    hoverable: true,
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor: '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.25,
                        align: 'center',
                    },
                },
                xaxis: {
                    axisLabel: "Deposited month",
                    ticks: [
                        [1, 'January'],
                        [2, 'February'],
                        [3, 'March'],
                        [4, 'April'],
                        [5, 'May'],
                        [6, 'June'],
                        [7, 'July'],
                        [8, 'August'],
                        [9, 'September'],
                        [10, 'October'],
                        [11, 'November'],
                        [12, 'December']
                    ]
                },
                yaxis: {
                    axisLabel: "Amount in NPR",
                }
            });

        }

        function groupDataForBarChart(data, frame) {
            let groupByMonth;
            let groupedData = [];
            let monthlyTotal = [];
            let sum = 0;
            data.reduce((a, c) => {
                let month = c.collected_date.split('-')[1];
                let year = c.collected_date.split('-')[0];
                groupedData.push({
                    year: parseInt(year),
                    month: parseInt(month),
                    money: parseInt(c.deposited_amount)
                })
            }, {});

            groupByMonth = _.groupBy(_.groupBy(groupedData, 'year')[frame], 'month');

            for (i = 1; i < 12; i++) {
                try {
                    sum = groupByMonth[i].reduce((a, b) => (a + b.money), 0);
                    monthlyTotal.push([i, sum]);
                } catch (e) {
                    //
                }
            }
            return monthlyTotal;

        }

        function groupDataForBarChartWithdraw(data, frame) {
            let groupByMonth;
            let groupedData = [];
            let monthlyTotal = [];
            let sum = 0;
            data.reduce((a, c) => {
                let month = c.collected_date.split('-')[1];
                let year = c.collected_date.split('-')[0];
                groupedData.push({
                    year: parseInt(year),
                    month: parseInt(month),
                    money: parseInt(c.withdrawn_amount)
                })
            }, {});

            groupByMonth = _.groupBy(_.groupBy(groupedData, 'year')[frame], 'month');

            for (i = 1; i < 12; i++) {
                try {
                    sum = groupByMonth[i].reduce((a, b) => (a + b.money), 0);
                    monthlyTotal.push([i, sum]);
                } catch (e) {
                    //
                }
            }
            return monthlyTotal;

        }

        function groupDeposit(data, timeFrame) {
            let currentYear;
            let totalYear = [];
            let groupedData = [];
            let dailyTotal = [];
            let weeklyTotal = [];
            let monthlyTotal = [];
            let yearlyTotal = [];
            let sum;
            let groupByYear;
            let groupByMonth;
            let groupByWeek;
            let currentDate;
            data.reduce((a, c) => {
                let day = getWeek(new Date(c.collected_date).getDate());
                let month = c.collected_date.split('-')[1];
                let year = c.collected_date.split('-')[0];
                if (totalYear.indexOf(year) === -1) {
                    totalYear.push(year);
                }
                groupedData.push({
                    year: parseInt(year),
                    month: parseInt(month),
                    week: day,
                    deposit: parseInt(c.deposited_amount),
                    withdraw: parseInt(c.withdrawn_amount)
                })
            }, {});

            function getWeek(a) {
                if (a >= 1 && a <= 7) {
                    return 1;
                } else if (a > 7 && a <= 14) {
                    return 2;
                } else if (a > 14 && a <= 21) {
                    return 3;
                } else {
                    return 4;
                }
            }
            if (timeFrame == 0.033) {
                for (i in data) {
                    currentDate = new Date(data[i].collected_date);
                    sum = data[i].deposited_amount;
                    dailyTotal.push([currentDate, sum]);
                }
                return dailyTotal;
            } else if (timeFrame == 0.25) {
                for (let a in totalYear) {
                    groupByMonth = _.groupBy(_.groupBy(groupedData, 'year')[totalYear[a]], 'month');
                    currentYear = totalYear[a];
                    for (i = 1; i <= 12; i++) {
                        groupByWeek = _.groupBy(groupByMonth[i], 'week');
                        for (j = 1; j <= 4; j++) {
                            try {
                                sum = groupByWeek[j].reduce((a, b) => (a + b.deposit), 0);
                                if (j < 4) {
                                    weeklyTotal.push([new Date(currentYear + '-' + i + '-' + j * 7), sum])
                                } else {
                                    weeklyTotal.push([new Date(currentYear + '-' + i + '-30'), sum])
                                }
                            } catch (e) {
                                //
                            }
                        }
                    }
                }
                return weeklyTotal;
            } else if (timeFrame == 1) {
                for (let a in totalYear) {
                    groupByMonth = _.groupBy(_.groupBy(groupedData, 'year')[totalYear[a]], 'month');
                    currentYear = totalYear[a];
                    for (i = 1; i <= 12; i++) {
                        try {
                            sum = groupByMonth[i].reduce((a, b) => (a + b.deposit), 0);
                            monthlyTotal.push([new Date(currentYear + '-' + i), sum]);
                        } catch (e) {
                            //
                        }
                    }
                }
                return monthlyTotal;

            } else {
                for (let a in totalYear) {
                    groupByYear = _.groupBy(groupedData, 'year')[totalYear[a]];
                    currentYear = totalYear[a];
                    try {
                        sum = groupByYear.reduce((a, b) => (a + b.deposit), 0);
                        yearlyTotal.push([new Date(currentYear).getTime(), sum]);

                    } catch (e) {
                        //
                    }
                }
                return yearlyTotal;
            }

        }

        function groupWithdraw(data, timeFrame) {
            let currentYear;
            let totalYear = [];
            let groupedData = [];
            let dailyTotal = [];
            let weeklyTotal = [];
            let monthlyTotal = [];
            let yearlyTotal = [];
            let sum;
            let groupByYear;
            let groupByMonth;
            let groupByWeek;
            let currentDate;
            data.reduce((a, c) => {
                let day = getWeek(new Date(c.collected_date).getDate());
                let month = c.collected_date.split('-')[1];
                let year = c.collected_date.split('-')[0];
                if (totalYear.indexOf(year) === -1) {
                    totalYear.push(year);
                }
                groupedData.push({
                    year: parseInt(year),
                    month: parseInt(month),
                    week: day,
                    withdraw: parseInt(c.withdrawn_amount)
                })
            }, {});

            function getWeek(a) {
                if (a >= 1 && a <= 7) {
                    return 1;
                } else if (a > 7 && a <= 14) {
                    return 2;
                } else if (a > 14 && a <= 21) {
                    return 3;
                } else {
                    return 4;
                }
            }
            if (timeFrame == 0.033) {
                for (i in data) {
                    currentDate = new Date(data[i].collected_date);
                    sum = data[i].withdrawn_amount;
                    dailyTotal.push([currentDate, sum]);
                }
                return dailyTotal;
            } else if (timeFrame == 0.25) {
                for (let a in totalYear) {
                    groupByMonth = _.groupBy(_.groupBy(groupedData, 'year')[totalYear[a]], 'month');
                    currentYear = totalYear[a];
                    for (i = 1; i <= 12; i++) {
                        groupByWeek = _.groupBy(groupByMonth[i], 'week');
                        for (j = 1; j <= 4; j++) {
                            try {
                                sum = groupByWeek[j].reduce((a, b) => (a + b.withdraw), 0);
                                if (j < 4) {
                                    weeklyTotal.push([new Date(currentYear + '-' + i + '-' + j * 7), sum])
                                } else {
                                    weeklyTotal.push([new Date(currentYear + '-' + i + '-30'), sum])
                                }
                            } catch (e) {
                                //
                            }
                        }
                    }
                }
                return weeklyTotal;
            } else if (timeFrame == 1) {
                for (let a in totalYear) {
                    groupByMonth = _.groupBy(_.groupBy(groupedData, 'year')[totalYear[a]], 'month');
                    currentYear = totalYear[a];
                    for (i = 1; i <= 12; i++) {
                        try {
                            sum = groupByMonth[i].reduce((a, b) => (a + b.withdraw), 0);
                            monthlyTotal.push([new Date(currentYear + '-' + i), sum]);
                        } catch (e) {
                            //
                        }
                    }
                }
                return monthlyTotal;

            } else {
                for (let a in totalYear) {
                    groupByYear = _.groupBy(groupedData, 'year')[totalYear[a]];
                    currentYear = totalYear[a];
                    try {
                        sum = groupByYear.reduce((a, b) => (a + b.withdraw), 0);
                        yearlyTotal.push([new Date(currentYear).getTime(), sum]);

                    } catch (e) {
                        //
                    }
                }
                return yearlyTotal;
            }

        }





        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
            position: 'absolute',
            display: 'none',
            opacity: 0.8
        }).appendTo('body');
        $('#line-chart').bind('plothover', function(event, pos, item) {

            let x, y, a;
            if (item) {
                x = parseInt(item.datapoint[0]),
                    y = parseInt(item.datapoint[1]),
                    a = new Date(x);
                $('#line-chart-tooltip').html("Rs. " + y + ' on ' + moment(a).format('LL'))
                    .css({
                        top: item.pageY + 5,
                        left: item.pageX + 5,
                    })
                    .fadeIn(100)
            } else {
                $('#line-chart-tooltip').hide()
            }

        });
        //tooltip for bar chart
        $('<div class="tooltip-inner" id="bar-chart-tooltip"></div>').css({
            position: 'absolute',
            display: 'none',
            opacity: 0.8
        }).appendTo('body');
        $('#bar-chart').bind('plothover', function(event, pos, item) {
            let y;
            if (item) {
                y = parseInt(item.datapoint[1]);
                $('#bar-chart-tooltip').html('Rs. ' + y)
                    .css({
                        top: item.pageY,
                        left: item.pageX,
                    })
                    .fadeIn(100)
            } else {
                $('#bar-chart-tooltip').hide()
            }
        });

    });

    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff ; font-weight: 600;">' +
            label +
            '<br>' +
            Math.round(series.percent) + '%</div>'
    }
</script>
@endsection