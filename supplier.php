<?php include("session.php");
include("D_Config/D_Connection.php");

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
                        Supplier list
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
                                <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="button" class="btn btn-danger w-20" data-tw-dismiss="modal" id="delete_sup">DELETE</button> </div> <!-- END: Modal Footer -->
                            </div>
                        </div>
                    </div>
                    <!-- Delete Modal End -->
                    <!-- BEGIN: Modal Toggle -->
                    <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add Supplier Data</a> </div>
                    <!-- END: Modal Toggle -->
                    <!-- BEGIN: Modal Content -->
                    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- BEGIN: Modal Header -->
                                <div class="modal-header success">
                                    <div class="alert alert-success-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="thumbs-up" class="w-6 h-6 mr-2"></i> Suplier Data Added Successfully ! </div>
                                </div>
                                <div class="modal-header failed">
                                    <div class="alert alert-danger-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Something Went Wrong.. Please Try Again</div>
                                </div>
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto" id="add_data">Add Supplier Data</h2>
                                    <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li> <a href="javascript:;" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> <!-- END: Modal Header -->
                                <!-- BEGIN: Modal Body -->
                                <form id="suplier" method="POST">
                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                        <div class="col-span-12 sm:col-span-12">
                                            <label for="modal-form-1" class="form-label">Name</label>
                                            <input id="name" type="text" pattern="[a-z A-Z]{3,}" name="name" class="form-select" placeholder="Name" required>

                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2" class="form-label">Email</label> <input id="email" type="Email" name="email" class="form-control" placeholder="Email" required>

                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-3" class="form-label">Phone</label> <input id="phone" type="tel" pattern="[0-9]{10}" maxlength="10" name="phone" class="form-control" placeholder="9529659898" required>

                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-4" class="form-label">City</label> <input id="city" type="text" name="city" pattern="[a-zA-Z]{3,}" class="form-control" placeholder="City" required>
                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-5" class="form-label">Zip</label> <input id="zip" type="text" name="zip" pattern="[0-9]{6}" class="form-control" placeholder="Zip" required> </div>

                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-5" class="form-label">Country</label> <select input id="country" type="text" pattern="[a-zA-Z]{3,}" name="country" class="form-control" placeholder="Country">
                                                <option>Country</option>
                                                <option value="India">India</option>
                                                <option value="America">America</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Australia">Australia</option>
                                                <option value="China">China</option>
                                                <option value="Turkey">Turkey</option>
                                            </select>
                                            <input type="hidden" id="action_type" name="action_type" value="sup">
                                            <input type="hidden" id="sup_id" name="sup_id">

                                            <div class="col-span-12 sm:col-span-12"> <label for="modal-form-5" class="form-label" style="margin-top: 7px;">Address</label> <textarea input id="address" name="address" type="text" rows="2" cols="4" name="supplier_Address" class="form-control" placeholder="Address" required></textarea> </div>

                                        </div>

                                    </div> <!-- END: Modal Body -->
                                    <!-- BEGIN: Modal Footer -->
                                    <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-primary w-20 mr-1">Cancle</button> <input type="submit" name="save" class="btn btn-primary w-20" value="Save"></div>
                                    <!-- END: Modal Footer -->
                                    <input type="hidden" id="action_type2" name="action_type2" value="sup_add">
                                    <input type="hidden" id="tbl2" name="tbl2" value="tbl_supplier">
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
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>City</th>
                                                            <th>Country</th>
                                                            <th>Zip</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="supdata" id="sup">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!-- END: HTML Table Data -->

    <!-- END: Content -->
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

            function loadData(searchquery) {
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        getRowsSup: 1,
                        searchquery: searchquery,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".supdata").html(response);
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
                                            columns: [0, 1, 2, 3, 4, 5, 6]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, 6]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, 6]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'print',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5, 6]
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

            $("#suplier").submit(function(e) {

                e.preventDefault();
                var formData = {
                    name: $("#name").val(),
                    email: $("#email").val(),
                    phone: $("#phone").val(),
                    address: $('#address').val(),
                    city: $("#city").val(),
                    country: $('#country option:selected').val(),
                    zip: $("#zip").val(),
                    action_type: $("#action_type").val(),
                    sup_id: $("#sup_id").val(),

                    //redirect_url: "action.php",
                };

                console.log(formData);
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        console.log("Form data submitted");
                        document.getElementById("suplier").reset();
                        loadData();
                        // alert("Value Stored Successfully");
                        $("input#sup_id").val(null);
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

                // e.preventDefault();
            })
            $(document).on('click', '.edit_data', function() {
                var sup_id = $(this).attr("id");
                // console.log(sup_id);
                sup_id = sup_id.split(" ");
                // console.log(sup_id[1]);
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
                        sup_id: sup_id[1],
                        fetch: 1,
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        $("#name").val(data.name);
                        $("#email").val(data.email);
                        $("#phone").val(data.phone);
                        $("#address").val(data.address);
                        $("#city").val(data.city);
                        $("#country").val(data.country);
                        $("#zip").val(data.zip);
                        $("#sup_id").val(data.id);
                        loadData();
                        // document.getElementById("at-form").reset();
                    }
                })
            })

            $(document).on('click', '.del_sup', function() {
                var sup_id = $(this).attr("id");
                // console.log(dep_id);
                sup_id = sup_id.split(" ");
                // console.log(dep_id[1]);

                $(document).on('click', '#delete_sup', function() {
                    // console.log("Delete Clicked");
                    $.ajax({
                        url: 'action.php',
                        method: "POST",
                        data: {
                            sup_id: sup_id[1],
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