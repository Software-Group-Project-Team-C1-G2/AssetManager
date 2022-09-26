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
            <!-- END: Top Bar -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Component Details
                </h2>


                <div class="text-center"> <a href="components.php" data-tw-toggle="modal" class="btn btn-primary">Back To Componenets</a> </div> <!-- END: Modal Toggle -->
                <!-- END: Modal Content -->

            </div>
            <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5">
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                    <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">

                        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                            <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                            <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                        </div>
                        <div class="mt-2 xl:mt-0">
                            <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Go</button>
                            <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</button>
                        </div>
                    </form>
                    <div class="flex mt-5 sm:mt-0">
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
                    </div>
                </div>
                <!-- START :table content -->
                <div class="overflow-x-auto scrollbar-hidden">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="message-show">

                                        </div>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>

                                                    <th>Asset tag</th>
                                                    <th>Quantity</th>
                                                    <th>Date</th>


                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="studentdata">
                                                <tr>
                                                    <td class="stud_id">1</td>
                                                    <td>df</td>
                                                    <td>ds</td>

                                                    <td>
                                                        <div class="dropdown w-1/2 sm:w-auto">
                                                            <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown">...<i data-lucide="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i> </button>
                                                            <div class="dropdown-menu w-40">
                                                                <ul class="dropdown-content">
                                                                    <li>
                                                                        <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview2"> <i data-lucide="corner-right-up" class="w-4 h-4 mr-2"></i> Check in </a>
                                                                    </li>
                                                                    <li>
                                                                        <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Details </a>
                                                                    </li>
                                                                    <li>
                                                                        <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" onclick="mymodal()"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="stud_id">1</td>
                                                    <td>df</td>
                                                    <td>ds</td>
                                                    
                                                   
                                                    <td>
                                                        <div class="dropdown w-1/2 sm:w-auto">
                                                            <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown">...<i data-lucide="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i> </button>
                                                            <div class="dropdown-menu w-40">
                                                                <ul class="dropdown-content">
                                                                    <li>
                                                                        <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview2"> <i data-lucide="corner-right-up" class="w-4 h-4 mr-2"></i> Check in </a>
                                                                    </li>
                                                                    <li>
                                                                        <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Details </a>
                                                                    </li>
                                                                    <li>
                                                                        <a id="tabulator-export-csv" href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" onclick="mymodal()" class="dropdown-item"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>



                                                    </td>
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
        <!-- END: Contents -->

        <?php
        include("F_file/f_Script.php");
        ?>
    </div>
    <!-- END: FLEX -->
    <div>
<?php
        include("F_file/footer.php");
        ?>
</div>
</body>


</html>