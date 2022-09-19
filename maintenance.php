<?php
include("session.php");
require_once "D_Config/D_Connection.php";


$db = new DB();

$pdo = $db->connection();
?>
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
                    <h2 class="text-lg font-medium mr-auto">
                        Maintenance list
                    </h2>
                    <!-- Delete Modal Start -->
                    <div id="header-footer-modal-preview3" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- BEGIN: Modal Header -->

                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto"> DELETE </h2>
                                </div> <!-- END: Modal Header -->
                                <!-- BEGIN: Modal Body -->
                                <div id="form-validation" class="p-5">
                                    <div class="preview">

                                        <h2> ARE YOU SURE TO DELETE ?</h2>

                                    </div>

                                </div>
                                <!-- END: Modal Body -->
                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="button" class="btn btn-danger w-20" data-tw-dismiss="modal" id="delete">DELETE</button> </div> <!-- END: Modal Footer -->
                            </div>
                        </div>
                    </div>
                    <!-- Delete Modal End -->
                    <!-- BEGIN: Modal Toggle -->
                    <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add Maintenance Data</a> </div>
                    <!-- END: Modal Toggle -->
                    <!-- BEGIN: Modal Content -->
                    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- BEGIN: Modal Header -->
                                <div class="modal-header success">
                                    <div class="alert alert-success-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="thumbs-up" class="w-6 h-6 mr-2"></i> Maintenance Data Added Successfully ! </div>
                                </div>
                                <div class="modal-header failed">
                                    <div class="alert alert-danger-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Something Went Wrong.. Please Try Again</div>
                                </div>
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto" id="add_data">Add Maintenance Data</h2>
                                    <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li> <a href="javascript:;" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> <!-- END: Modal Header -->
                                <!-- BEGIN: Modal Body -->
                                <form id="mainform" method="POST">
                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Asset</label> <select id="asset_id" type="text" name="asset_id" class="form-select" placeholder="Asset">
                                                <option value="" disabled selected hidden>Asset</option>
                                                <?php
                                                $sql = "select id,name from tbl_assets";
                                                $statement1 = $pdo->query($sql);
                                                $asset_type = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($asset_type as $row) {
                                                    $asset_type_name = $row['name'];
                                                    $asset_type_id = $row['id'];
                                                ?>
                                                    <option value="<?php echo $asset_type_id; ?>"><?php echo $asset_type_name; ?></option>
                                                    <!-- <option value="2">user</option>   -->
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2" class="form-label">Supplier</label> <select id="supplier_id" type="text" name="supplier_id" class="form-control" placeholder="Supplier">
                                                <option value="" disabled selected hidden>Supplier</option>
                                                <?php
                                                $sql = "select id,name from tbl_supplier";
                                                $statement1 = $pdo->query($sql);
                                                $sup = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($sup as $row) {
                                                    $sup_name = $row['name'];
                                                    $sup_id = $row['id'];
                                                ?>
                                                    <option value="<?php echo $sup_id; ?>"><?php echo $sup_name; ?></option>
                                                    <!-- <option value="2">user</option>   -->
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-3" class="form-label">Type</label> <select id="asset_type_id" type="text" name="asset_type_id" class="form-control" placeholder="Type">
                                                <option value="" disabled selected hidden>Type</option>
                                                <?php
                                                $sql = "select id,name from tbl_loc_brands_dep_atype where type=4";
                                                $statement1 = $pdo->query($sql);
                                                $department_type = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($department_type as $row) {
                                                    $department_type_name = $row['name'];
                                                    $department_type_id = $row['id'];
                                                ?>
                                                    <option value="<?php echo $department_type_id; ?>"><?php echo $department_type_name; ?></option>
                                                    <!-- <option value="2">user</option>   -->
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-4" class="form-label">Start date</label> <input id="start_date" type="date" name="start_date" class="form-control" placeholder="Start date">
                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-5" class="form-label">End date</label> <input id="end_date" type="date" name="end_date" class="form-control" placeholder="End date"> </div>

                                    </div> <!-- END: Modal Body -->
                                    <!-- BEGIN: Modal Footer -->
                                    <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-primary w-20 mr-1">Cancel</button>
                                        <input type="submit" class="btn btn-primary w-20" data-tw-dismiss="modal" id="save" name="save" value="Save">
                                    </div>
                                    <!-- END: Modal Footer -->
                                    <input type="hidden" id="action_type1" name="action_type1" value="Maint_add">
                                    <input type="hidden" id="Maint_id" name="Maint_id" />
                                    <input type="hidden" id="tbl" name="tbl" value="tbl_maintenances">
                                </form>
                            </div>
                        </div>
                    </div> <!-- END: Modal Content -->
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <!-- <a href="form.html" button class="btn btn-primary shadow-md mr-2">Add New Product</button></a> -->
                        <div class="dropdown ml-auto sm:ml-0">

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
                            <div class="sm:flex items-center sm:mr-4">

                            </div>
                            <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">

                            </div>
                            <!-- <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                                <input id="search" name="search" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                            </div>
                            <div class="mt-2 xl:mt-0">
                                <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Go</button>
                                <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</button>
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
                    <div class="overflow-x-auto scrollbar-hidden">
                        <!-- START :table content -->
                        <div class="overflow-x-auto scrollbar-hidden">
                            <div class="container-fluid mt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <!-- start media print -->
                                            <!-- <style>
                                                @media print {
                                                    body * {
                                                        visibility: hidden;
                                                    }

                                                    #print * {
                                                        visibility: visible;
                                                    }

                                                    #print {
                                                        position: absolute !important;
                                                        top: 0 !important;
                                                        left: 0 !important;
                                                        margin-top: -250px;
                                                    }

                                                }
                                            </style> -->
                                            <!-- End media print -->

                                            <div class="card-body">
                                                <div class="message-show">

                                                </div>
                                                <table class="table table-bordered table-striped" id="example">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th>Asset tag</th> -->
                                                            <th>Asset</th>
                                                            <th>Supplier</th>
                                                            <th>Types</th>
                                                            <th>Start date</th>
                                                            <th>End date</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="Maintdata" id="Maint">

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

    </div>
    <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    <?php
    include("F_file/f_script.php")
    ?>
    <!-- END: JS Assets-->
    <script>
        $(document).ready(function($) {
            loadData();

            $(".success").css({
                "display": "none"
            });
            $(".failed").css({
                "display": "none"
            });

            function loadData(searchquery1) {
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        getRowsMaints: 1,
                        searchquery1: searchquery1,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".Maintdata").html(response);

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

                                    {
                                        extend: 'csv',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'print',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4]
                                            //specify which column you want to print

                                        }
                                    }
                                ]
                            });
                        });
                        // sorting data end
                    }
                })
            }
            $("input#search").keyup(function() {
                var search = $(this).val();
                if (search != "") {
                    loadData(search);
                } else {
                    loadData();
                }
            })



            $("#mainform").submit(function(e) {

                e.preventDefault();
                var formData = {
                    asset_id: $("#asset_id option:selected").val(),
                    supplier_id: $("#supplier_id option:selected").val(),
                    asset_type_id: $("#asset_type_id option:selected").val(),
                    start_date: $("#start_date").val(),
                    end_date: $("#end_date").val(),
                    tbl: $("input#tbl").val(),
                    action_type1: $("input#action_type1").val(),
                    Maint_id: $("input#Maint_id").val(),

                };
                console.log(formData);
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: formData,
                    // dataType:"json",
                    success: function(data) {
                        // console.log(data);
                        // console.log(formData);
                        console.log("Form data submitted");
                        document.getElementById("mainform").reset();
                        loadData();
                        console.log(data);
                        $("input#Maint_id").val(null);
                        if (data == 200) {
                            // console.log("In if condition");
                            $(".success").css({
                                "display": "block"
                            });
                        }
                    },
                    error: function(error) {
                        $(".failed").css({
                            "display": "block",
                        });
                    }

                    // e.preventDefault();
                })
            })
            $(document).on('click', '.edit_data', function() {
                var Maint_id = $(this).attr("id");
                // console.log(emp_id);
                Maint_id = Maint_id.split(" ");
                // console.log(emp_id[1]);
                $(".success").css({
                    "display": "none"
                });
                $(".failed").css({
                    "display": "none"
                });
                $.ajax({
                    url: 'action.php',
                    method: "POST",
                    data: {
                        Maint_id: Maint_id[1],
                        fetch: 1,
                    },
                    dataType: "json",
                    success: function(data) {
                        //  console.log(data);
                        // console.log("Data Deleted Successfully");

                        $("#asset_id").val(data.asset_id);
                        $("#supplier_id").val(data.supplier_id);
                        $("#asset_type_id").val(data.asset_type_id);
                        $('#start_date').val(data.start_date);
                        $('#end_date').val(data.end_date);

                        $("#Maint_id").val(data.id);
                        loadData();


                    }
                })
            })
            $(document).on('click', '.del_Maint', function() {
                var Maint_id = $(this).attr("id");
                // console.log(dep_id);
                Maint_id = Maint_id.split(" ");
                // console.log(dep_id[1]);
                $(document).on('click', '#delete', function() {
                    $.ajax({
                        url: 'action.php',
                        method: "POST",
                        data: {
                            Maint_id: Maint_id[1],
                            delete: 1,
                        },
                        success: function() {
                            console.log("Data Deleted Successfully");
                            loadData();

                        }
                    })
                })
            })
        })

        // $(document).ready(function() {
        //     $('#example').DataTable({
        //         "order": [[ 0, 'asc' ], [ 1, 'asc' ]]
        //     });
        // });
    </script>
    <div>
        <?php
        include("F_file/footer.php");
        ?>
    </div>


</body>

</html>