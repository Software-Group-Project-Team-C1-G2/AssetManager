<?php include("session.php");

include("D_Config/D_Connection.php");

$db = new DB();

$sups = $db->getRows('tbl_supplier');
$locs = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '1')));
$brands = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '2')));
$deps = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '3')));
$atypes = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '4')));

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
            <!-- END: Top Bar -->
            <!-- BEGIN: DELETE MODAL -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                <h2 class="text-lg font-medium mr-auto">
                    Component List
                </h2>

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
                <!-- END: DELETE MODAL -->
                <!-- BEGIN: CHECK_OUT MODAL -->
                <div id="header-footer-modal-preview2" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- BEGIN: Modal Header -->
                            <div class="modal-header">
                                <div class="success alert alert-success-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="thumbs-up" class="w-6 h-6 mr-2"></i> SUCCESFULL ! </div>
                            </div>
                            <div class="modal-header">
                                <div class="failed alert alert-danger-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Something Went Wrong.. Please Try Again</div>
                            </div>
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto">CHECK OUT</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <div id="form-validation" class="p-5">
                                <div class="preview">
                                    <!-- BEGIN: Validation Form -->
                                    <form id="chk_form">
                                        <div class="input-form">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Component </label>
                                            <input id="cmp_chk_name" type="text" readonly name="cmp_chk_name" class="form-control" minlength="2" disabled>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label>Asset</label>
                                            <div class="mt-2">
                                                <select style="width:100%;font-size:1em" name="cmp_asset" required>
                                                    <option value="1">Asset-1</option>
                                                    <option value="2">Asset-2</option>
                                                    <option value="3">Asset-3</option>
                                                    <option value="4">Asset-4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-form mt-3 ml-0" style="width:auto">
                                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Quantity </label>
                                            <input id="validation-form-2 cmp_qty" type="number" min="1" name="cmp_qty" class="form-control" required>
                                        </div>
                                        <div class="input-form mt-3 ml-0" style="width:15em">
                                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Checkout Date </label>
                                            <input id="cmp_chk_date" name="cmp_chk_date" type="text" class="datepicker form-control  block mx-auto" data-single-mode="true" required>
                                        </div>
                                        <input type="hidden" name="cmp_id" id="cmp_id">
                                        <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <input type="submit" class="btn btn-primary w-20" value="Save"> </div> <!-- END: Modal Footer -->

                                    </form>
                                    <!-- END: Validation Form -->

                                </div>

                            </div>
                            <!-- END: Modal Body -->
                            <!-- BEGIN: Modal Footer -->

                        </div>
                    </div>
                </div>
                <!-- END: CHECK-OUT MODAL -->

                <!-- BEGIN: ADD DATA MODAL -->
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add Component Data</a> </div> <!-- END: Modal Toggle -->
                <!-- BEGIN: Modal Content -->
                <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
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
                                <h2 id="add_data" class="font-medium text-base mr-auto">Add Component Data</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <div id="form-validation" class="p-5">
                                <div class="preview">
                                    <!-- BEGIN: Validation Form -->
                                    <form id="cmp-form" name="cmp-form">
                                        <div class="input-form">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 2 characters</span> </label>
                                            <input id="cmp_name" type="text" name="cmp_name" class="form-control" placeholder="John Legend" minlength="2" required>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="input-form mt-3 ml-0" style="width:auto">
                                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Quantity </label>
                                                <input id="cmp_qty" type="number" name="cmp_qty" class="form-control" required>
                                            </div>
                                            <div class="input-form mt-3 ml-0" style="width:15em">
                                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Serial </label>
                                                <input id="cmp_serial" type="text" name="cmp_serial" class="form-control" placeholder="" minlength="2" required>
                                            </div>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Location</label>
                                                <div class="mt-2">
                                                    <select style="width:12em;font-size:1em" name="cmp_loc" id="cmp_loc">
                                                        <option readonly>Select Location</option>
                                                        <?php foreach ($locs as $row) { ?>
                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                            <!-- <option value="2">Asset-3</option>
                                                        <option value="3">Asset-4</option> -->
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Brand</label>
                                                <div class="mt-2">
                                                    <select style="width:12em;font-size:1em" name="cmp_brand" id="cmp_brand">
                                                        <option>Select Brands</option>
                                                        <?php foreach ($brands as $row) { ?>
                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                            <!-- <option value="2">Asset-3</option>
                                                        <option value="3">Asset-4</option> -->
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">

                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Supplier</label>
                                                <div class="mt-2">
                                                    <select style="width:12em; font-size:1em" name="cmp_sup" id="cmp_sup">
                                                        <option>Select Supplier</option>
                                                        <?php foreach ($sups as $sup) { ?>
                                                            <option value="<?php echo $sup['id'] ?>"><?php echo $sup['name'] ?></option>
                                                            <!-- <option value="2">Asset-3</option>
                                                        <option value="3">Asset-4</option> -->
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Asset Type</label>
                                                <div class="mt-2">
                                                    <select style="width:12em;font-size:1em" name="cmp_atype" id="cmp_atype">
                                                        <option readonly>Select Assets Types</option>
                                                        <?php foreach ($atypes as $row) { ?>
                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                            <!-- <option value="2">Asset-3</option>
                                                        <option value="3">Asset-4</option> -->
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="flex flex-col input-group mt-2">
                                                <label>Cost</label>
                                                <div class="flex flex-row mt-3" style="width:12em">
                                                    <div class="input-group-text">INR</div>
                                                    <input type="text" name="cmp_cost" id="cmp_cost" class="form-control" placeholder="Price" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                            </div>
                                            <div class="input-form mt-3 ml-0" style="width:15em">
                                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Purchase Date </label>
                                                <input id="validation-form-2" type="date" name="cmp_pur" id="cmp_pur" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="flex" style="justify-content: space-between;">
                                            <div class="flex flex-col input-group mt-2">
                                                <label>Warranty</label>
                                                <div class="flex flex-row mt-3" style="width:15em">
                                                    <input type="number" style="width:8em" name="cmp_war" id="cmp_war" class="form-control" placeholder="Warranty" aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-text" style="width:5em">Months</div>
                                                </div>
                                            </div>
                                            <div class="input-form mt-3" style="width:15em">
                                                <label>Status</label>
                                                <div class="mt-2">
                                                    <select style="width:12em;font-size:1em" name="cmp_status" id="cmp_status">
                                                        <option value="1">Status-1</option>
                                                        <option value="2">Status-2</option>
                                                        <option value="3">Status-3</option>
                                                        <option value="4">Status-4</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row"> Description <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span> </label>
                                            <textarea id="cmp_desc" class="form-control" name="cmp_desc" placeholder="add Description" minlength="10" required></textarea>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Image </label>
                                            <input type="file" name="cmp_img" id="cmp_img">

                                        </div>


                                        <!-- END: Validation Form -->

                                </div>

                            </div>

                            <input type="hidden" name="action_type" id="action_type" value="cmp">
                            <input type="hidden" name="cmp_id" id="cmp_id">
                            <!-- END: Modal Body -->
                            <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <input type="submit" class="btn btn-primary w-20" value="Save"> </div> <!-- END: Modal Footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END: ADD DATA MODAL -->


            </div>
            <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5">
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                    <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                        <!-- <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                            <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                            <input id="search" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
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
                                                    <th>Picture</th>
                                                    <th>Name</th>
                                                    <th>Serial</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th>Purchase Date</th>
                                                    <th>Warranty</th>
                                                    <th>Status</th>
                                                    <th>Description</th>


                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="componentsdata">
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

    <?php
    include("F_file/f_Script.php");
    ?>
    <script>
        $(document).ready(function($) {

            $(".success").css({
                "display": "none"
            });
            $(".failed").css({
                "display": "none"
            });

            loadData();

            function loadData(query) {
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        getRowsCmp: 1,
                        query: query,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".componentsdata").html(response);
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
                                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'print',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
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


            $("#cmp-form").submit(function(e) {
                e.preventDefault();

                // var formData = $(this).serialize();
                // var cmp_form = document.getElementById('cmp-form');
                // var img = new FormData(cmp_form);

                // img.append('cmp_img', )
                const formData = new FormData(document.getElementById('cmp-form'))

                // for (const [key, value] of formData) {
                //     console.log('»', key, value)
                // }

                // console.log(formData);


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
                        document.getElementById("cmp-form").reset();
                        loadData();
                        $("input#cmp_id").val(null);
                        console.log(data);
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
                    }
                })
            })

            $(document).on('click', '.edit_data', function() {
                var cmp_id = $(this).attr("id");
                // console.log(dep_id);
                cmp_id = cmp_id.split(" ");
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
                        cmp_id: cmp_id[1],
                        fetch: 1,
                    },
                    dataType: "json",
                    success: function(data) {

                        console.log(data);
                        $("#cmp_name").val(data.name);
                        $("#cmp_qty").val(data.quantity);
                        $("#cmp_serial").val(data.serial);
                        $("#cmp_loc").val(data.location_id);
                        $("#cmp_brand").val(data.brand_id);
                        $("#cmp_sup").val(data.supplier_id);
                        $("#cmp_atype").val(data.asset_type_id);
                        $("#cmp_cost").val(data.cost);
                        $("#cmp_pur").val(data.purchase);
                        $("#cmp_war").val(data.warranty);
                        $("#cmp_status").val(data.status);
                        $("#cmp_desc").val(data.description);
                        $("#cmp_id").val(data.id);

                        loadData();
                        // document.getElementById("at-form").reset();
                    }
                })
            })

            $(document).on('click', '.del_cmp', function() {
                var cmp_id = $(this).attr("id");
                // console.log(dep_id);
                cmp_id = cmp_id.split(" ");
                // console.log(dep_id[1]);

                $(document).on('click', '#delete', function() {
                    // console.log("Delete Clicked");
                    $.ajax({
                        url: 'action.php',
                        method: "POST",
                        data: {
                            cmp_id: cmp_id[1],
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

            $(document).on('click', '.checkout', function() {
                var cmp_id = $(this).attr("id");
                // console.log(dep_id);
                cmp_id = cmp_id.split(" ");
                // console.log(dep_id[1]);
                $(".success").css({
                    "display": "none"
                });
                $(".failed").css({
                    "display": "none"
                });

                // const formData = new FormData(document.getElementById("chk_form"));
                $.ajax({
                    url: 'action.php',
                    method: "POST",
                    data: {
                        cmp_id: cmp_id[1],
                        fetch: 1,
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#cmp_chk_name").val(data.name);


                    }
                })

            })

            $("#chk_form").submit(function(e) {

                e.preventDefault();

                const formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: 'action.php',
                    method: "POST",
                    data: formData,
                    success: function() {

                    }
                })
            })

        });
    </script>
</body>



</html>