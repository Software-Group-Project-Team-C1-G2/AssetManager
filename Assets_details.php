<?php include("session.php"); 
require_once "D_Config/D_Connection.php";
$db = new DB();
$pdo = $db->connection();?>


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
        <?php
            $submit_id = $_GET['id'];
        ?>

        <div class="content">
            <!-- BEGIN: Top Bar -->
            <?php
            include("H_file/topMenu.php");
            ?>
            <!-- END: Top Bar -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h1 class="text-lg font-medium mr-auto">
                    Asset Details
                </h1>

                <div class="text-center"> <a href="assets.php" data-tw-toggle="modal" class="btn btn-primary">Back To Asset</a> </div> <!-- END: Modal Toggle -->

            </div>

            <!-- BEGIN: HTML Table Data -->
            <?php
                $sql = "select * from tbl_assets where id=$submit_id";
                $statement1 = $pdo->query($sql);
                $asset = $statement1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($asset as $row){
                    $asset_name = $row['name'];
                    $asset_tag = $row['asset_tag'];
                    $asset_status = $row['status'];
                    $asset_type_id = $row['asset_type_id'];
                    $asset_brand_id = $row['brand_id'];
                    $asset_location_id = $row['location_id'];
                    $asset_serial = $row['serial'];
                    $asset_purchase_date = $row['purchase_date'];
                    $asset_cost = $row['cost'];
                    $asset_warranty = $row['warranty'];
                    $asset_supplier_id = $row['supplier_id'];
                    $asset_description = $row['description'];
                    $created_date = $row['created'];
                    $updated_date = $row['modified'];
                    $asset_image = $row['picture'];
                }
            ?>
            <?php
                $sql = "select * from tbl_loc_brands_dep_atype where id=$asset_type_id and type=4";
                $statement1 = $pdo->query($sql);
                $atype = $statement1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($atype as $row){
                    $asset_type = $row['name'];
                }
            ?>
            <?php
                $sql = "select * from tbl_loc_brands_dep_atype where id=$asset_brand_id and type=2";
                $statement1 = $pdo->query($sql);
                $abrand = $statement1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($abrand as $row){
                    $asset_brand = $row['name'];
                }
            ?>
            <?php
                $sql = "select * from tbl_loc_brands_dep_atype where id=$asset_location_id and type=1";
                $statement1 = $pdo->query($sql);
                $alocation = $statement1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($alocation as $row){
                    $asset_location = $row['name'];
                }
            ?>
            <?php
                $sql = "select * from tbl_supplier where id=$asset_supplier_id";
                $statement1 = $pdo->query($sql);
                $asupplier = $statement1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($asupplier as $row){
                    $asset_supplier = $row['name'];
                }
            ?>

            <div style="height:auto; background-color:white" class="mt-10 flex flex-col">
                <div style="height:auto" class="mt-15 ml-5">
                    <h3 style="margin-top: 20px; font-size:2rem"><?php echo $asset_name . "(" . $asset_tag . ")"; ?></h3>
                    <h5 style="margin-top: 25px; font-size:20px"><?php echo $asset_type . " - " . $asset_status; ?> </h5>

                </div>
                <nav class="tab_bar">
                    <ul class="nav d-flex flex-row nav-tabs mt-10 intro-y " role="tablist" style="width: 30px">
                        <li id="example-1-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#example-tab-1" type="button" role="tab" aria-controls="example-tab-1" aria-selected="true"> Details </button> </li>
                        <li id="example-2-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#example-tab-2" type="button" role="tab" aria-controls="example-tab-2" aria-selected="false"> Components </button> </li>
                     <li id="example-3-tab" class="nav-item flex-1" role="presentation"> <button  class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#example-tab-3" type="button" role="tab" aria-controls="example-tab-3" aria-selected="false" name="Main65">Maintenances </button> </li>
                        <li id="example-4-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#example-tab-4" type="button" role="tab" aria-controls="example-tab-4" aria-selected="false"> History </button> </li>
                    </ul>
                </nav>

                <div class="tab-content border-l border-r border-b" style="background-color:white;">
                    <div id="example-tab-1" class="tab-pane leading-relaxed p-5 active" role="tabpanel" aria-labelledby="example-1-tab">
                        <div class="grid grid-cols-2">
                            <!-- BEGIN: Data List -->
                            <div class="intro-y col-span-12 overflow-auto ">
                                <table class="table  table-hover  table-report -mt-2">
                                    <tbody>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Type : </b>
                                            </td>
                                            <td style="width:40em" class="data font-medium">
                                                <?php echo $asset_type; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Status : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $asset_status; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Serial : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $asset_serial; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> brand : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $asset_brand; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Purchase date : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $asset_purchase_date; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Cost : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $asset_cost; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Warranty : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                            <?php echo $asset_warranty; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> location : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $asset_location; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Supplier: </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $asset_supplier; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Updated at : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $updated_date; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Created at : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $created_date; ?>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td style="background-color:lightgrey; width:20em" class="font-medium whitespace-nowrap">
                                                <b> Description : </b>
                                            </td>
                                            <td style="width:40em" class="font-medium">
                                                <?php echo $asset_description; ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- END: Data List -->
                            <div class="ml-20">
                                <img style="margin-left:5em; margin-top:3em; border:1px solid black" src="<?php echo $asset_image; ?>" alt="loading" width="200" height="200">
                            </div>
                        </div>

                    </div>

                    <div id="example-tab-2" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="example-2-tab">
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
                                                                <th>Picture</th>
                                                                <th>Name</th>
                                                                <th>Type</th>
                                                                <th>Brand</th>
                                                                <th>Quantity</th>
                                                                <th>Available quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="componentdetail" id="cmpdetail">
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

                    <div id="example-tab-3" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="example-3-tab">
                        <!-- BEGIN: HTML Table Data -->
                        <div class="intro-y box p-5 mt-5">
                            <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                                <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                                    <div class="sm:flex items-center sm:mr-4">

                                    </div>
                                    <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">

                                    </div>
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

                            <div class="overflow-x-auto scrollbar-hidden">
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
                                                                    <th>Asset</th>
                                                                    <th>Supplier</th>
                                                                    <th>Types</th>
                                                                    <th>Start date</th>
                                                                    <th>End date</th>


                                                                </tr>
                                                            </thead>
                                                            
                                                            <tbody class="maint_1" id="maint_id1">
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

                    <div id="example-tab-4" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="example-4-tab">
                        <!-- BEGIN: HTML Table Data -->
                        <div class="intro-y box p-5 mt-5">
                            <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                                <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                                    <div class="sm:flex items-center sm:mr-4">

                                    </div>
                                    <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">

                                    </div>
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

                            <div class="overflow-x-auto scrollbar-hidden">
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
                                                                    <th>date</th>
                                                                    <th>Asset Name</th>
                                                                    <th>Employees</th>
                                                                    <th>Action</th>




                                                                </tr>
                                                            </thead>
                                                            <tbody class="studentdata">
                                                                <tr>
                                                                    <td class="stud_id">1</td>
                                                                    <td>df</td>
                                                                    <td>ds</td>
                                                                    <td>sfd</td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="stud_id">1</td>
                                                                    <td>df</td>
                                                                    <td>ds</td>
                                                                    <td>sfd</td>

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

                </div>


            </div>

        </div>


    </div>
    <?php
    include("F_file/f_Script.php");
    ?>
    <div>
<?php
        include("F_file/footer.php");
        ?>
</div>

    <!-- <script>
        $(document).ready(function($) {
            loadData();
                
            function loadData(cquery) {
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        getRowsCmpDetail: 1,
                        cquery: cquery,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".componentdetail").html(response);
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

        })
    </script> -->

    <script>

$(document).ready(function($) {
            loadData();

            $(".success").css({
                "display": "none"
            });
            $(".failed").css({
                "display": "none"
            });

            function loadData(searchquery2) {
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        id: "<?php echo $submit_id?>",
                        getRowsMaint: 1,
                        searchquery2: searchquery2,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".maint_1").html(response);

                        // sorting data 
                        $('#example').DataTable({
                            "order": [[ 0, 'asc' ], [ 1, 'asc' ]],
                            // searching: false,
                            "lengthChange": false,
                            "paging": true,
                            "iDisplayLength": 10,
                            retrieve: true,
                    
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

            $()
        })


    </script>
</body>


</html>