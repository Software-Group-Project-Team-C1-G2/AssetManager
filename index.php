<?php include("session.php");
include("D_Config/D_Connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >x -->

</head>
<?php
include("H_file/header.php");
$db = new DB();
$pdo = $db->connection();
?>


<body class="py-5">
    <?php
    include("H_file/mobilemenu.php");
    ?>

    <div class="flex">
        <?php
        include("H_file/sidebar.php");
        ?>
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <?php
            include("H_file/topMenu.php");
            ?>
            <!-- END: Top Bar -->
            <!--  BEGIN: top four box   -->
            <div class="grid grid-cols-12 gap-2 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="list" class="report-box__icon text-primary"></i>
                            </div>
                            <div class="text-2xl font-medium leading-8 mt-2">Total Assets</div>
                            <?php $count = $db->getRows('tbl_assets', array('return_type' => 'count')); ?>
                            <div class="text-base text-slate-500 mt-1"><?php echo $count; ?></div>
                            <hr class="mt-1">
                            <div class=" text-xs more-info mt-2 "> <a href="assets.php"> More info </a> </div>
                        </div><?php ?>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="layers" class="report-box__icon text-pending"></i>
                            </div>
                            <div class="text-2xl font-medium leading-8 mt-2">Total component</div>
                            <?php $count = $db->getRows('tbl_components', array('return_type' => 'count')); ?>
                            <div class="text-base text-slate-500 mt-1"><?php echo $count; ?></div>
                            <hr class="mt-1">
                            <div class=" text-xs more-info mt-2 "> <a href="components.php"> More info </a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="sliders" class="report-box__icon text-warning"></i>
                            </div>
                            <div class="text-2xl font-medium leading-8 mt-2">Total maintanance</div>
                            <?php $count = $db->getRows('tbl_maintenances', array('return_type' => 'count')); ?>
                            <div class="text-base text-slate-500 mt-1"><?php echo $count; ?></div>
                            <hr class="mt-1">
                            <div class=" text-xs more-info mt-2 "> <a href="maintenance.php"> More info </a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="users" class="report-box__icon text-success"></i>
                            </div>
                            <div class="text-2xl font-medium leading-8 mt-2">Total Employee </div>
                            <?php $count = $db->getRows('tbl_employees', array('return_type' => 'count')); ?>
                            <div class="text-base text-slate-500 mt-1"><?php echo $count; ?></div>
                            <hr class="mt-1">
                            <div class=" text-xs more-info mt-2 "> <a href="employee.php"> More info </a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  END: top four box   -->
            <!-- BEGIN :  chart  -->
            <div class="container-fluid intro-y grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 lg:col-span-6">

                    <!-- BEGIN: Donut Chart -->
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Asset by type
                            </h2>

                        </div>
                        <div id="donut-chart" class="p-5">
                            <div class="preview">
                                <div class="container-fluid">
                                    <canvas id="doughnut_chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Donut Chart -->
                </div>
                <div class="col-span-12 lg:col-span-6">

                    <!-- BEGIN: Pie Chart -->
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Asset by status
                            </h2>

                        </div>
                        <div id="pie-chart" class="p-5">
                            <div class="preview">
                                <div class="container-fluid">
                                    <canvas id="pie_chart"></canvas>
                                </div>
                            </div>
                            <div class="source-code hidden">
                                <button data-target="#copy-pie-chart" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                                <div class="overflow-y-auto mt-3 rounded-md">
                                    <pre id="copy-pie-chart" class="source-preview"> <code class="html"> HTMLOpenTagdiv class=&quot;h-[400px]&quot;HTMLCloseTag HTMLOpenTagcanvas id=&quot;pie-chart-widget&quot;HTMLCloseTagHTMLOpenTag/canvasHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Pie Chart -->
                </div>
            </div>
            <!-- END : chart     -->
            <!-- BEGIN :  2 Table -->
            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 lg:col-span-6">
                    <!-- BEGIN: HTML Table Data -->
                    <div class="intro-y box p-5 mt-5">
                        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">

                                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2" style="    font-size: 25px;">Recent asset activity</label>

                                </div>
                            </form>
                        </div>
                        <!-- START :table content -->
                        <div class="overflow-x-auto scrollbar-hidden">
                            <div class="container-fluid mt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="message-show">

                                                </div>
                                                <table class="table table-bordered table-striped" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th>Asset</th>
                                                            <th>Employee</th>
                                                            <th>Status</th>
                                                            <th>Location</th>
                                                            <th>date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="studentdata">
                                                        <tr>
                                                            <td>sim card </td>
                                                            <td>xyz</td>
                                                            <td>check in</td>
                                                            <td>new york</td>
                                                            <td>25-12-2000</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: HTML Table Data -->
                </div>
                <div class="col-span-12 lg:col-span-6">
                    <!-- BEGIN: HTML Table Data -->
                    <div class="intro-y box p-5 mt-5">
                        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">

                                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2" style="    font-size: 25px;">Recent component activity</label>

                                </div>
                            </form>
                        </div>
                        <!-- START :table content -->
                        <div class="overflow-x-auto scrollbar-hidden">
                            <div class="container-fluid mt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="message-show">

                                                </div>
                                                <table class="table table-bordered table-striped" id="example2">
                                                    <thead>
                                                        <tr>
                                                            <th>Components</th>
                                                            <th>Asset</th>
                                                            <th>Quantity</th>
                                                            <th>status</th>
                                                            <th>Location</th>
                                                            <th>date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="studentdata">
                                                        <tr>
                                                            <td>ssd</td>
                                                            <td>Hp pavilion</td>
                                                            <td>1</td>
                                                            <td>check in</td>
                                                            <td>new york</td>
                                                            <td>25-12-2000</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END: HTML Table Data -->

                </div>


            </div>
            <!-- END : Table 2  -->
            <!-- END: content -->

        </div>
        <?php
        include("F_file/f_Script.php");
        ?>


    </div>
    <div>
        <?php
        include("F_file/footer.php");
        ?>
    </div>
    <script>
        $(document).ready(function() {

            makechart();

            function makechart() {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        action: 'fetch_chart'
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var name = [];
                        var total = [];
                        var color = [];

                        for (var count = 0; count < data.length; count++) {
                            name.push(data[count].name);
                            total.push(data[count].total);
                            color.push(data[count].color);
                        }

                        var chart_data = {
                            labels: name,
                            datasets: [{
                                label: 'Vote',
                                backgroundColor: color,
                                color: '#fff',
                                data: total
                            }]
                        };

                        var group_chart1 = $('#pie_chart');

                        var graph1 = new Chart(group_chart1, {
                            type: "pie",
                            data: chart_data
                        });

                        var group_chart2 = $('#doughnut_chart');

                        var graph2 = new Chart(group_chart2, {
                            type: "doughnut",
                            data: chart_data
                        });
                    }
                })
            }

        });

        // sorting data 
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [0, 'asc'],
                    [1, 'desc']
                ],
                "lengthChange": false,
                "paging": true,
                stateSave: true,
                "iDisplayLength": 10,
                "searching": false,
                retrieve: true,


            });
        });
        // sorting data end

        // sorting data 
        $(document).ready(function() {
            $('#example2').DataTable({
                "order": [
                    [0, 'asc'],
                    [1, 'desc']
                ],
                "lengthChange": false,
                "paging": true,
                "iDisplayLength": 10,
                "searching": false,
                retrieve: true,


            });
        });
        // sorting data end
    </script>
</body>

</html>