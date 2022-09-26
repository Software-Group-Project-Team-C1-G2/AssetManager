<?php include("D_Config/D_Connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php
include("H_file/header.php");
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

            <body class="py-5">



                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h1 class="text-lg font-medium mr-auto">
                        Report By Location
                    </h1>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">


                        <div class="dropdown ml-auto sm:ml-0" style="margin-left:10px">

                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="file-plus" class="w-4 h-4 mr-2"></i> New Category </a>
                                    </li>
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> New Group </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BEGIN: HTML Table Data -->
                <div class="intro-y box p-5 mt-5">
                    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">

                            <!-- <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Location</label>
                                <select id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">


                                    <option class="dropdown-item">Location </option>
                                    <option class="dropdown-item">Red</option>
                                    <option class="dropdown-item">0001</option>
                                    <option class="dropdown-item">Construction Site 1 </option>
                                    <option class="dropdown-item">Constructon Site 2</option>
                                    <option class="dropdown-item">test</option>
                                    <option class="dropdown-item">Edifico Administrativo</option>
                                    <option class="dropdown-item">Umm suqeim veterinary center</option>
                                    <option class="dropdown-item">r1</option>

                                </select>
                            </div>
                            <div class="mt-2 xl:mt-0">
                                <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Search</button>

                            </div> -->
                        </form>
                        <!-- <div class="flex mt-5 sm:mt-0">
                            <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </button>
                            <div class="dropdown w-1/2 sm:w-auto">
                                <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export <i data-lucide="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i> </button>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export CSV </a>
                                        </li>
                                        <li>
                                            <a id="tabulator-export-json" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export JSON </a>
                                        </li>
                                        <li>
                                            <a id="tabulator-export-xlsx" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export XLSX </a>
                                        </li>
                                        <li>
                                            <a id="tabulator-export-html" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export HTML </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
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
                                                        <th>Picture </th>

                                                        <th>Asset Tag</th>

                                                        <th>Name</th>

                                                        <th>Supplier</th>

                                                        <th>Brand</th>

                                                        <th>Location</th>


                                                    </tr>
                                                </thead>
                                                <tbody class="studentdata">
                                                    <tr>
                                                        <td class="stud_id">1</td>
                                                        <td>df</td>
                                                        <td>ds</td>
                                                        <td>sfd</td>
                                                        <td>asd</td>
                                                        <td>sdg</td>



                                                    </tr>
                                                    <tr>
                                                        <td class="stud_id">1</td>
                                                        <td>df</td>
                                                        <td>ds</td>
                                                        <td>sfd</td>
                                                        <td>asd</td>
                                                        <td>sdg</td>


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

        <!-- END: Content -->
    </div>

    <div>
        <?php
        include("F_file/footer.php");
        ?>
    </div>

    <!-- BEGIN: JS Assets-->
    <?php
    include("F_file/f_script.php")
    ?>
    <!-- END: JS Assets-->

    <script>
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
                retrieve: true,

                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
        // sorting data end
    </script>

</body>

</html>