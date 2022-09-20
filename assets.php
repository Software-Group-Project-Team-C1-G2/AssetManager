<?php include("session.php");
require_once "D_Config/D_Connection.php";
$db = new DB();
$pdo = $db->connection(); ?>

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
                    Asset List
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
                            <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="button" class="btn btn-danger w-20" data-tw-dismiss="modal" id="delete">DELETE</button> </div>
                            <!-- END: Modal Footer -->
                        </div>
                    </div>
                </div>
                <!-- Delete Modal End -->

                <!-- BEGIN: CHECK IN Content -->
                <div id="header-footer-modal-preview2" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- BEGIN: Modal Header -->
                            <div class="modal-header success">
                                <div class="alert alert-success-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="thumbs-up" class="w-6 h-6 mr-2"></i> SUCCESFULL ! </div>
                            </div>
                            <div class="modal-header failed">
                                <div class="alert alert-danger-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Something Went Wrong.. Please Try Again</div>
                            </div>
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto">Check IN</h2>
                            </div>
                            <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <div id="form-validation" class="p-5">
                                <div class="preview">
                                    <!-- BEGIN: Validation Form -->
                                    <form class="validate-form">
                                        <?php

                                        ?>
                                        <input id="rowID" name="id" type="hidden">

                                        <div class="input-form">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Asset </label>
                                            <input id="assetName" type="text" name="asset_name" class="form-control" disabled>
                                        </div>

                                        <div class="input-form mt-3 ml-0" style="width:auto">
                                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Asset Tag </label>
                                            <input id="assetTag" type="text" name="asset_assetTag" class="form-control" disabled>
                                        </div>

                                        <div class="input-form mt-3 ml-0" style="width:15em">
                                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Check in Date </label>
                                            <!-- <input type="date" class="datepicker form-control  block mx-auto" data-single-mode="true" required> -->
                                            <input type="date" class="form-control" required>
                                        </div>
                                        <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="submit" id="save" name="save" class="btn btn-primary w-20">Save</button> </div> <!-- END: Modal Footer -->

                                    </form>
                                    <!-- END: Validation Form -->


                                    <!-- END: Failed Notification Content -->
                                </div>

                            </div>
                            <!-- END: Modal Body -->
                            <!-- BEGIN: Modal Footer -->

                        </div>
                    </div>
                </div>
                <!-- End : Check IN Modal -->


                <!-- BEGIN: Modal Toggle -->
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add Asset Data</a> </div> <!-- END: Modal Toggle -->
                <!-- BEGIN: Modal Content -->
                <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- BEGIN: Modal Header -->

                            <!-- <div class="modal-header success">
                                <div class="alert alert-success-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="thumbs-up" class="w-6 h-6 mr-2"></i> SUCCESFULL ! </div>
                            </div>
                            
                            <div class="modal-header failed">
                                <div class="alert alert-danger-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Something Went Wrong.. Please Try Again </div>
                            </div> -->

                            <div class="modal-header">
                                <h2 id="add_data" class="font-medium text-base mr-auto">Add Asset Data</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <div id="form-validation" class="p-5">
                                <div class="preview">

                                    <!-- BEGIN: Validation Form -->
                                    <form class="validate-form" id="assetform" name="assetform">
                                        <div class="input-form">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Name </label>
                                            <input id="name" type="text" pattern=[A-Za-z]{255} name="name" class="form-control" placeholder="John Legend" minlength="2" required>
                                        </div>

                                        <!-- <p id="GFG"></p> -->
                                        <!-- Script to use getHours() method -->

                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="input-form mt-3 ml-0" style="width:auto">


                                                <?php
                                                $unique_num = 3;
                                                $sql = "select * from tbl_assets order by id desc limit 1";
                                                $statement1 = $pdo->query($sql);
                                                $ass_id = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($ass_id as $row) {
                                                    $lastid = $row['id'];
                                                    if ($lastid == " ") {
                                                        $unique_num = "1";
                                                    } else {
                                                        $unique_num = $lastid + 1;
                                                    }
                                                }
                                                $ass_tag = "AST" . date("dmY") . $unique_num;

                                                ?>
                                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Asset Tag </label>
                                                <input id="asset_tag" type="text" name="asset_tag" value="<?php echo $ass_tag; ?>" class="form-control" readonly>

                                            </div>
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Supplier</label>
                                                <div class="flex flex-col sm:flex-row items-center">
                                                    <select id="supplier_id" name="supplier_id" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
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
                                            </div>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>location</label>
                                                <div class="flex flex-col sm:flex-row items-center">
                                                    <select name="location_id" id="location_id" class="form-select mt-2 sm:mr-2" aria-label="Default select example" required aria-invalid="false">
                                                        <?php
                                                        $sql = "select id,name from tbl_loc_brands_dep_atype where type=1";
                                                        $statement1 = $pdo->query($sql);
                                                        $loc = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($loc as $row) {
                                                            $loc_name = $row['name'];
                                                            $loc_id = $row['id'];
                                                        ?>
                                                            <option value="<?php echo $loc_id; ?>"><?php echo $loc_name; ?></option>
                                                            <!-- <option value="2">user</option>   -->
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Brand</label>
                                                <div class="flex flex-col sm:flex-row items-center">
                                                    <select name="brand_id" id="brand_id" class="form-select mt-2 sm:mr-2" aria-label="Default select example" required>
                                                        <?php
                                                        $sql = "select id,name from tbl_loc_brands_dep_atype where type=2";
                                                        $statement1 = $pdo->query($sql);
                                                        $brand = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($brand as $row) {
                                                            $brand_name = $row['name'];
                                                            $brand_id = $row['id'];
                                                        ?>
                                                            <option value="<?php echo $brand_id; ?>"><?php echo $brand_name; ?></option>
                                                            <!-- <option value="2">user</option>   -->
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="input-form mt-3 ml-0" style="width:auto">
                                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Serial </label>
                                                <input id="serial" type="text" name="serial" class="form-control" placeholder="" minlength="2" required>
                                            </div>
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Asset Type</label>
                                                <div class="flex flex-col sm:flex-row items-center">
                                                    <select name="asset_type_id" id="asset_type_id" class="form-select mt-2 sm:mr-2" aria-label="Default select example" required>
                                                        <?php
                                                        $sql = "select id,name from tbl_loc_brands_dep_atype where type=4";
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
                                            </div>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="flex flex-col input-group mt-2">
                                                <label>Cost</label>
                                                <div class="flex flex-row mt-3" style="width:12em">
                                                    <div class="input-group-text">INR</div>
                                                    <input type="number" id="cost" name="cost" min="0" step="any" name="asset_Cost" class="form-control" placeholder="Price" aria-label="Amount (to the nearest dollar)" required>
                                                </div>
                                            </div>
                                            <div class="input-form mt-3 ml-0" style="width:15em">
                                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Purchase Date </label>


                                                <input id="purchase_date" type="date" name="purchase_date" class="form-control" required>
                                                <!-- <input type="text" class="datepicker form-control  block mx-auto" data-single-mode="true" required> -->
                                            </div>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="flex flex-col input-group mt-2">
                                                <label>Warranty</label>
                                                <div class="flex flex-row mt-3" style="width:15em">
                                                    <input type="number" min="0" style="width:8em" id="warranty" name="warranty" class="form-control" placeholder="Warranty" aria-label="Amount (to the nearest dollar)" required>
                                                    <div class="input-group-text" style="width:5em">Months</div>
                                                </div>
                                            </div>
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Status</label>
                                                <div class="flex flex-col sm:flex-row items-center">
                                                    <select class="form-select mt-2 sm:mr-2" name="status" id="status" aria-label="Default select example">
                                                        <option value="Status">Status</option>
                                                        <option value="Ready to deploy">Ready to deploy</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Archived">Archived</option>
                                                        <option value="Broken">Broken</option>
                                                        <option value="Lost">Lost</option>
                                                        <option value="Out of repair">Out of repair</option>
                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row"> Description <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span> </label>
                                            <textarea id="description" class="form-control" name="description" placeholder="add Description" minlength="10" required></textarea>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Image </label>
                                            <input type="file" id="image" name="image" accept="image/*" required></input>

                                            <!-- accept="image/*" -->
                                        </div>
                                        <!-- <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="submit" class="btn btn-primary w-20">Save</button> </div> -->
                                        <!-- END: Modal Footer -->



                                        <!-- END: Validation Form -->


                                </div>

                            </div>
                            <!-- END: Modal Body -->
                            <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <input type="submit" name="save" id="save" class="btn btn-primary w-20" value="Save" /> </div>
                            <!-- END: Modal Footer -->
                            <input type="hidden" id="action_type" name="action_type" value="ass">
                            <input type="hidden" id="asset_id" name="asset_id" />
                            </form>
                        </div>
                    </div>
                </div> <!-- END: Modal Content -->

            </div>
            <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5">
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                    <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" method="POST">

                        <!-- <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                            <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                            <input id="search" name="search" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                        </div>
                        <div class="mt-2 xl:mt-0">
                            <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Go</button>
                            <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</button>
                        </div> -->


                        <input type="hidden" id="ass_tbl" name="ass_tbl" value="tbl_assets">

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
                    <div class="container-fluid mt-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="message-show">

                                        </div>
                                        <table class="table table-bordered table-striped" id="example">
                                            <thead>
                                                <tr>
                                                    <th>picture</th>
                                                    <th>Asset_tag</th>
                                                    <th>Name</th>
                                                    <th>Asset_type</th>
                                                    <th>Brand</th>
                                                    <th>Location</th>

                                                    <!-- <th>Supplier</th>
                                                    <th>Serial</th>
                                                    <th>Cost</th>
                                                    <th>Purchase_date</th>
                                                    <th>Warranty</th>
                                                    <th>Status</th>
                                                    <th>Description</th> -->


                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="assetdata1" id="ass1">
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

    </div>
    <!-- END: FLEX -->

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
        function checkin(id) {
            // $('#rowID').val(id);
            $.ajax({
                type: "GET",
                url: "action.php",
                data: {
                    checkInID: id
                },
                success: function(response) {
                    const res = JSON.parse(response);
                    $("#rowID").val(res.id);
                    $("#assetName").val(res.assetName)
                    $("#assetTag").val(res.assetTag)
                }
            })
        }

        $(document).ready(function($) {
            loadData();

            $(".success").css({
                "display": "none"
            });
            $(".failed").css({
                "display": "none"
            });


            function loadData(squery) {
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        getRowsAsset: 1,
                        squery: squery,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".assetdata1").html(response);

                        // sorting data 
                        $(document).ready(function() {
                            $('#example').DataTable({
                                "order": [
                                    [0, 'asc'],
                                    [1, 'desc']
                                ],
                                "lengthChange": false,
                                "paging": true,
                                "iDisplayLength": 10,
                                retrieve: true,

                                dom: 'Bfrtip',
                                buttons: [

                                    {
                                        extend: 'csv',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, ]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, ]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, ]
                                            //specify which column you want to print

                                        }
                                    },

                                    {
                                        extend: 'print',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, ]
                                            //specify which column you want to print

                                        }
                                    }

                                    // {
                                    //     extend: 'print',
                                    //     exportOptions: {
                                    //         stripHtml: false,
                                    //         columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                    //         //specify which column you want to print

                                    //     }
                                    // }
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

            $("#assetform").submit(function(e) {

                // var fields = $(this).serializeArray();


                // if (isBlank()) {
                //     alert("Please input all fields");
                // } else {
                e.preventDefault();
                const formData = new FormData(document.getElementById('assetform'))
                // const file = document.getElementById("file").files[0];
                // var reader = new FileReader();
                // reader.readAsDataURL(file);
                // reader.onload = function(evt) {
                // console.log(evt.target.result);
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    enctype: 'multipart/form-data',
                    success: function(data) {
                        console.log("Form data submitted");
                        document.getElementById("assetform").reset();
                        loadData();
                        // console.log(data);
                        $("input#asset_id").val(null);

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
                    }
                    // error: function(error) {
                    //     $(".failed").css({
                    //         "display": "block",
                    //     });
                    // }
                })
                // };
                // var formData = new FormData(this);
                // }
            })

            $(document).on('click', '.edit_data', function() {
                var asset_id = $(this).attr("id");
                asset_id = asset_id.split(" ");
                // window.alert(asset_id[1]);
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
                        asset_id: asset_id[1],
                        fetch: 1,
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        $("#name").val(data.name);
                        $("#asset_tag").val(data.asset_tag);
                        $("#supplier_id").val(data.supplier_id);
                        $("#location_id").val(data.location_id);
                        $("#brand_id").val(data.brand_id);
                        $("#serial").val(data.serial);
                        $("#asset_type_id").val(data.asset_type_id);
                        $("#cost").val(data.cost);
                        $("#purchase_date").val(data.purchase_date);
                        $("#warranty").val(data.warranty);
                        $("#status").val(data.status);
                        $("#description").val(data.description);
                        $('#asset_id').val(data.id);
                        loadData();
                    }
                })
            })

            $(document).on('click', '.del_dep', function() {
                var asset_id = $(this).attr("id");
                asset_id = asset_id.split(" ");

                $(document).on('click', '#delete', function() {
                    // console.log("Delete Clicked");
                    $.ajax({
                        url: 'action.php',
                        method: "POST",
                        data: {
                            asset_id: asset_id[1],
                            delete: 1,
                        },
                        success: function() {
                            loadData();
                        }
                    })
                })
            })

        })
    </script>

</body>


</html>