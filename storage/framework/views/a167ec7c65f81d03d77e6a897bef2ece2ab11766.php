<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('layouts.backend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('layouts.backend.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                                <div id="line-chart" style="height: 400px;"></div>
                            </div>
                            <div class="card-footer">
                                <label>Show Graph By:
                                    <select id="selectMenuLine">
                                        <option value="0.033">--select--</option>
                                        <option value="0.033">day</option>
                                        <option value="0.25">week</option>
                                        <option value="1">month</option>
                                        <option value="12">year</option>
                                    </select>
                                </label>
                            </div>
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
                                <div id="bar-chart" style="height: 400px;"></div>
                            </div>
                            <div class="card-footer">
                                <label>Show Graph By Year:
                                    <select id="selectMenuBar">
                                        <option value="2020">--select--</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                    </select>
                                </label>
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
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('layouts.backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.resize.js"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.time.js"></script>

    <script src="<?php echo e(asset("js/underscore.js")); ?>"></script>


    <script>
        $(function () {
            let bar,donutData;
            let line;
            let i;
            let date;
            let amount;
            let plot_data = [];
            let readyData=[];
            let frame;
            let barFrame;
            $(document).ready(function () {
                $.ajax({
                    type: 'get',
                    url: '/retrieveBalance',
                    dataType:'json',
                    success: function (response) {
                        for (i = 0;i<Object.keys(response).length;i++){
                            date = new Date(response[i].collected_date);
                            amount = response[i].deposited_amount;
                            plot_data.push([date,amount]);
                        }

                        $("#selectMenuLine").change(function () {
                            frame = $("#selectMenuLine option:selected").val();
                            line = {
                                data : groupData(response,frame),
                                color: '#3c8dbc'
                            }
                            plot_line(line,frame);
                        });
                        $("#selectMenuBar").change(function () {
                            barFrame = $("#selectMenuBar option:selected").val();
                            bar = {
                                data : groupDataForBarChart(response,barFrame),
                                bars: { show: true }
                            }
                            plot_bar(bar,barFrame)
                        });

                        line = {
                            data : plot_data,
                            color: '#3c8dbc'
                        }
                        bar = {
                            data : groupDataForBarChart(response,new Date().getFullYear()),
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
                        plot_line(line,0.25);
                        plot_bar(bar,new Date().getFullYear());
                        plot_donut(donutData);
                    },
                    fail:function () {
                        alert('Failed to retrieve data.')
                    }
                });
            });
            function plot_line(line,a){
                $.plot('#line-chart', [line], {
                    grid  : {
                        hoverable  : true,
                        borderColor: '#f3f3f3',
                        borderWidth: 5,
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
                        label:'Total deposit per day',
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
                        timeformat: ((a<=1)?"%b<br>%Y":"%Y"),
                        tickSize:[(a<1)?1:a,"month"],
                        max: (new Date().getTime()),
                        min:((a<=1)?(new Date().getTime()-365*15*60*60*1000):new Date().getTime()-365*24*60*60*1000*6),
                    }
                })
            }

            function plot_bar(bar,a){
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
                        label:"Total deposits per month in "+a+'.',
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

            function groupDataForBarChart(data,frame) {
                let groupByMonth;
                let groupedData=[];
                let monthlyTotal =[];
                let sum =0;
                data.reduce((a, c)=>{
                    let month = c.collected_date.split('-')[1];
                    let year = c.collected_date.split('-')[0];
                    groupedData.push({year:parseInt(year),month:parseInt(month),money:parseInt(c.deposited_amount)})
                },{});

                groupByMonth = _.groupBy(_.groupBy(groupedData,'year')[frame],'month');

                for(i=1;i<12;i++){
                    try {
                        sum = groupByMonth[i].reduce((a,b)=>(a+b.money),0);
                        monthlyTotal.push([i,sum]);
                    }
                    catch (e){
                        //
                    }
                }
                return monthlyTotal;

            }




            function groupData(data,timeFrame){
                let currentYear;
                let totalYear=[];
                let groupedData= [];
                let dailyTotal = [];
                let monthlyTotal = [];
                let yearlyTotal = [];
                let sum;
                let groupByYear;
                let groupByMonth;
                let currentDate;
                data.reduce((a,c)=>{
                    let month = c.collected_date.split('-')[1];
                    let year = c.collected_date.split('-')[0];
                    if(totalYear.indexOf(year)===-1){
                        totalYear.push(year);
                    }
                    groupedData.push({year:parseInt(year),month:parseInt(month),money:parseInt(c.deposited_amount)})
                },{});
                if(timeFrame == 0.033){
                    for(i in data){
                        currentDate = new Date(data[i].collected_date);
                        sum = data[i].deposited_amount;
                        dailyTotal.push([currentDate,sum]);
                    }
                    return dailyTotal;
                }
                else if(timeFrame == 0.25){

                }
                else if(timeFrame == 1){
                    for(let a in totalYear){
                        groupByMonth = _.groupBy(_.groupBy(groupedData,'year')[totalYear[a]],'month');
                        currentYear = totalYear[a];
                        for(i=1;i<12;i++){
                            try {
                                sum = groupByMonth[i].reduce((a,b)=>(a+b.money),0);
                                monthlyTotal.push([new Date(currentYear+'-'+i).getTime(),sum]);
                            }
                            catch (e){
                                //
                            }
                        }
                    }
                    return monthlyTotal;

                }
                else{
                    for(let a in totalYear){
                        groupByYear = _.groupBy(groupedData,'year')[totalYear[a]];
                        currentYear = totalYear[a];
                        try {
                            sum = groupByYear.reduce((a,b)=>(a+b.money),0);
                            yearlyTotal.push([new Date(currentYear).getTime(),sum]);

                        }
                        catch (e) {
                            //
                        }
                    }
                    return yearlyTotal;
                }

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/home.blade.php ENDPATH**/ ?>