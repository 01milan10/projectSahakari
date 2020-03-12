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
                        <h1>Flot Charts</h1>
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
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Line Chart
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="line-chart" style="height: 300px;"></div>
                            </div>
                            <!-- /.card-body-->
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Bar Chart
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="bar-chart" style="height: 300px;"></div>
                            </div>
                            <!-- /.card-body-->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Donut Chart
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="donut-chart" style="height: 300px;"></div>
                            </div>
                            <!-- /.card-body-->
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footer')
    @include('layouts.backend.footer')
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.resize.js"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.time.js"></script>

    <script src="{{asset("js/underscore.js")}}"></script>


    <script>
        $(function () {
            let bar,donutData;
            let line;
            let i;
            let date;
            let amount;
            let line_data = [];
            $(document).ready(function () {
                $.ajax({
                    type: 'get',
                    url: '/retrieveBalance',
                    dataType:'json',
                    success: function (response) {
                        for (i = 0;i<Object.keys(response).length;i++){
                            date = new Date(response[i].collected_date);
                            amount = response[i].deposited_amount;
                            line_data.push([date,amount]);
                        }
                        line = {
                            data : line_data,
                            color: '#3c8dbc'
                        }
                        bar = {
                            data : groupByMonth(response),
                            bars: { show: true }
                        }
                        donutData = [
                            {
                                label: 'Series2',
                                data : 30,
                                color: '#3c8dbc'
                            },
                            {
                                label: 'Series3',
                                data : 20,
                                color: '#0073b7'
                            },
                            {
                                label: 'Series4',
                                data : 50,
                                color: '#00c0ef'
                            }
                        ]
                        plot_line(line);
                        plot_bar(bar);
                        plot_donut(donutData);
                    },
                    fail:function () {
                        alert('Failed to retrieve data.')
                    }
                });
            });
            function groupByMonth(data) {
                let something =[];
                let value;
                let monthlyTotal=[];
                let totalMoney;
                data.reduce((accumulator,currentValue)=>{
                    let month = currentValue.collected_date.split('-')[1];
                    let year = currentValue.collected_date.split('-')[0];
                    if(new Date().getFullYear()==year){
                        something.push({month:parseInt(month),money:parseInt(currentValue.deposited_amount)});
                    }
                },{});
                value = _.groupBy(something,'month');
                // console.log(_.groupBy(something,'month')[2]);
                for (i=1;i<=12;i++){
                    try {
                        totalMoney = value[i].reduce((a,b)=>(a+b.money),0);
                        monthlyTotal.push([i,totalMoney])
                    }
                    catch (e)
                    {
                        // console.log(e)
                        // monthlyTotal.push([i,0])
                    }
                }
                // console.log(monthlyTotal);
                return monthlyTotal;
            }

            function plot_line(line){
                $.plot('#line-chart', [line], {
                    grid  : {
                        hoverable  : true,
                        borderColor: '#f3f3f3',
                        borderWidth: 1,
                        tickColor  : '#f3f3f3'
                    },
                    series: {
                        shadowSize: 5,
                        lines     : {
                            show: true
                        },
                        points    : {
                            show: true
                        },
                        label:'Total deposit per day in last 6 months',
                    },
                    lines : {
                        fill : false,
                        color: ['#3c8dbc']
                    },
                    yaxis : {
                        show: true,
                    },
                    xaxis : {
                        show: true,
                        mode:'time',
                        timeformat: "%b %d<br>%Y",
                        tickSize:[1,"month"],
                        max: (new Date().getTime()),
                        min:((new Date().getTime()-365*12*60*60*1000))
                    }
                })
            }

            function plot_bar(bar){
                $.plot('#bar-chart', [bar], {
                    grid  : {
                        hoverable: true,
                        borderWidth: 1,
                        borderColor: '#f3f3f3',
                        tickColor  : '#f3f3f3'
                    },
                    series: {
                        bars: {
                            show: true, barWidth: 0.5, align: 'center',
                        },
                        label:"Total deposits per month in "+new Date().getFullYear()+'.',
                    },
                    colors: ['#3c8dbc'],
                    xaxis : {
                        ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June'],[7,'July'],[8,'August'],[9,'September'],[10,'October'],[11,'November'],[12,'December']]
                    },
                });

            }

            function plot_donut(donutData){
                $.plot('#donut-chart', donutData, {
                    series: {
                        pie: {
                            show       : true,
                            radius     : 1,
                            innerRadius: 0.5,
                            label      : {
                                show     : true,
                                radius   : 2 / 3,
                                formatter: labelFormatter,
                                threshold: 0.1
                            }

                        }
                    },
                    legend: {
                        show: false
                    }
                })
            }

            //Initialize tooltip on hover
            $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
                position: 'absolute',
                display : 'none',
                opacity : 0.8
            }).appendTo('body');
            $('#line-chart').bind('plothover', function (event, pos, item) {

                let x, y,a;
                if (item) {
                    x = parseInt(item.datapoint[0]),
                        y = parseInt(item.datapoint[1]),
                        a = new Date(x);
                    $('#line-chart-tooltip').html("Deposit on " +(a.toLocaleDateString())+ ' is Rs. ' + y)
                        .css({
                            top : item.pageY+5,
                            left: item.pageX+5,
                        })
                        .fadeIn(100)
                } else {
                    $('#line-chart-tooltip').hide()
                }

            });
            //tooltip for bar chart
            $('<div class="tooltip-inner" id="bar-chart-tooltip"></div>').css({
                position: 'absolute',
                display : 'none',
                opacity : 0.8
            }).appendTo('body');
            $('#bar-chart').bind('plothover',function (event,pos,item) {
                let y;
                if(item){
                    y = parseInt(item.datapoint[1]);
                    $('#bar-chart-tooltip').html("Total Deposit is Rs: "+y)
                        .css({
                            top : item.pageY,
                            left: item.pageX,
                        })
                        .fadeIn(100)
                } else {
                    $('#bar-chart-tooltip').hide()
                }
            });

        });
        function labelFormatter(label, series) {
            return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff ; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
        }
    </script>
@endsection
