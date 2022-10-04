<?php
// Start session 
session_start();
include("D_Config/D_Connection.php");


// Get data from session 
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

// Get status from session 
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $status = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

// Include and initialize DB class 
// require_once 'D_Config/D_Connection.php';
// $db = new DB();

// Fetch the users data 
// $deps = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '3')));

// Retrieve status message from session 
if (!empty($_SESSION['statusMsg'])) {
    echo '<p>' . $_SESSION['statusMsg'] . '</p>';
    unset($_SESSION['statusMsg']);
}
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
                        Location List
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
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add Location Data</a>
                    <!-- END: Modal Toggle -->
                    <!-- BEGIN: Modal Content -->
                    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- BEGIN: Modal Header -->
                                <div class="modal-header success">
                                    <div class="alert alert-success-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="thumbs-up" class="w-6 h-6 mr-2"></i> Location Data Added Successfully ! </div>

                                </div>
                                <div class="modal-header failed">
                                    <div class="failed alert alert-danger-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Something Went Wrong.. Please Try Again</div>
                                </div>
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto" id="add_data">Add Location Data</h2>

                                    <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li> <a href="javascript:;" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> <!-- END: Modal Header -->
                                <!-- BEGIN: Modal Body -->
                                <form id="at-form" method="post">
                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Name</label> <input id="atype_Name" type="text" pattern="[a-z A-Z]{3,}" name="atype_Name" class="form-select" placeholder="Name" required>
                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2" class="form-label">Description</label> <textarea id="atype_Desc" rows="2" name="atype_Desc" class="form-control" placeholder="Description" required></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" id="action_type" name="action_type" value="add">
                                    <input type="hidden" id="type" name="type" value="1">
                                    <!-- <input type="hidden" id="tbl" name="tbl" value="1234"> -->
                                    <input type="hidden" name="loc_id" id="loc_id" />
                                    <!-- BEGIN: Modal Footer -->
                                    <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-primary w-20 mr-1">Cancel</button><input type="submit" class="btn btn-outline-primary w-20" id="save" name="save" value="Save"> </div>
                                    <!-- END: Modal Footer -->
                                </form> <!-- END: Modal Body -->
                            </div>
                        </div>
                    </div> <!-- END: Modal Content -->
                </div>
                <!-- BEGIN: HTML Table Data -->
                <div class="intro-y box p-5 mt-5">
                    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">

                            <!-- <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                                <input id="search" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
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

                                                        <th>Name</th>

                                                        <th>Description</th>


                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="locationdata" id="loc">
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
        $(document).ready(function($) {


            loadData();

            $(".success").css({
                "display": "none"
            });
            $(".failed").css({
                "display": "none"
            });

            function loadData(query) {
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        getRowsLoc: 1,
                        query: query,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".locationdata").html(response);
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
                                buttons: [{
                                        extend: 'csv',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'print',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1]
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



            $("#at-form").submit(function(e) {

                // var fields = $(this).serializeArray();


                // if (isBlank()) {
                //     alert("Please input all fields");
                // } else {

                e.preventDefault();

                var formData = {
                    name: $("input#atype_Name").val(),
                    descript: $("textarea#atype_Desc").val(),
                    type: $("input#type").val(),
                    // tbl: $("input#tbl").val(),
                    action_type: $("input#action_type").val(),
                    loc_id: $("input#loc_id").val(),
                    // redirect_url: "asset-types.php",
                };

                // var formData = new FormData(this);
                // console.log(formData);




                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: formData,
                    success: function(data) {
                        console.log("Form data submitted");
                        document.getElementById("at-form").reset();
                        loadData();
                        console.log(data);
                        $("input#loc_id").val(null);
                        if (data == 200) {
                            // console.log("In if condition");
                            $(".success").css({
                                "display": "block"
                            });
                        } else {
                            $(".failed").css({
                                "display": "block",
                            });
                        }

                        // alert("Value Stored Successfully");
                    },
                })
                // }

                // e.preventDefault();

                // e.preventDefault();
            })

            $(document).on('click', '.edit_data', function() {
                var loc_id = $(this).attr("id");
                // console.log(dep_id);
                loc_id = loc_id.split(" ");
                // console.log(dep_id[1]);
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
                        loc_id: loc_id[1],
                        fetch: 1,
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        $("#atype_Name").val(data.name);
                        $("#atype_Desc").val(data.description);
                        $("#loc_id").val(data.id);
                        loadData();
                        // document.getElementById("at-form").reset();
                    }
                })
            })

            $(document).on('click', '.del_dep', function() {
                var loc_id = $(this).attr("id");
                // console.log(dep_id);
                loc_id = loc_id.split(" ");
                // console.log(dep_id[1]);

                $(document).on('click', '#delete', function() {
                    // console.log("Delete Clicked");
                    $.ajax({
                        url: 'action.php',
                        method: "POST",
                        data: {
                            loc_id: loc_id[1],
                            delete: 1,
                        },
                        success: function() {
                            console.log("Data Deleted Successfully");
                            loadData();

                        }
                    })
                })

                // if (deleteClicked) {

                // }

            })
        })
    </script>

</body>

</html>