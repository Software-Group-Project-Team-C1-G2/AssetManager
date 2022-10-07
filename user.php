<?php include("session.php");

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
            <!-- END: Top Bar -->
            <!-- begin  of add data -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    User list
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
                            <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="button" class="btn btn-danger w-20" data-tw-dismiss="modal" id="delete_user">DELETE</button> </div> <!-- END: Modal Footer -->
                        </div>
                    </div>
                </div>
                <!-- BEGIN: Modal Toggle -->
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add User Data</a> </div> <!-- END: Modal Toggle -->
                <!-- BEGIN: Modal Content -->
                <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- BEGIN: Modal Header -->
                            <div class="modal-header success">
                                <div class="alert alert-success-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="thumbs-up" class="w-6 h-6 mr-2"></i> User Data Added Successfully ! </div>
                            </div>
                            <div class="modal-header failed">
                                <div class="alert alert-danger-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Something Went Wrong.. Please Try Again</div>
                            </div>
                            <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Header -->
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto" id="add_data">Add User Data</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <div id="form-validation" class="p-5">
                                <div class="preview">
                                    <!-- BEGIN: Validation Form -->
                                    <form id="userform" method="POST">
                                        <div class="input-form">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Full Name </label>
                                            <input id="name" type="text" pattern="[a-z A-Z]{3,}" name="name" class="form-control" placeholder="John Legend" minlength="2" required>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Email </label>
                                            <input id="email" type="email" name="email" class="form-control" placeholder="example@gmail.com" required="">
                                        </div>
                                        <div class="input-form mt-3">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                phone : </label>
                                            <input type="tel" pattern="[0-9]{10}" id="phone" name="phone" placeholder="9529659898" class="form-control" pattern="[0-9]{10}" maxlength="10" required>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                Status:</label>
                                            <select name="status" id="status" class="form-control" required="" aria-invalid="false">
                                                <?php
                                                $sql = "select * from  tbl_status";
                                                $stmt = $pdo->query($sql);
                                                $role = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($role as $row) {
                                                    $id = $row['id'];
                                                    $status = $row['status'];
                                                ?>
                                                    <option value="<?php echo $id; ?>"><?php echo $status; ?></option>
                                                    <!-- <option value="2">user</option>   -->
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                Role :</label>
                                            <select name="role" id="role" class="form-control" required="" aria-invalid="false">
                                                <?php
                                                $sql = "select * from  tbl_role";
                                                $stmt = $pdo->query($sql);
                                                $role = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($role as $row) {
                                                    $id = $row['id'];
                                                    $role = $row['role'];
                                                ?>
                                                    <option value="<?php echo $id; ?>"><?php echo $role; ?></option>
                                                    <!-- <option value="2">user</option>   -->
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Password </label>
                                            <input id="password" type="password" name="password" class="form-control" placeholder="secret" minlength="6" required>
                                        </div>
                                        <div class="input-form">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> city </label>
                                            <input id="city" type="text" name="city" class="form-control" placeholder="new york" minlength="2" required>
                                        </div>
                                        <input type="hidden" id="action_type" name="action_type" value="usertype">
                                        <input type="hidden" id="user_id" name="user_id">
                                        <div class="modal-footer">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                            <input type="submit" name="save" class="btn btn-primary w-20" value="Save">
                                        </div>
                                    </form>
                                    <!-- END: Validation Form -->
                                    <!-- BEGIN: Success Notification Content -->
                                    <div id="success-notification-content" class="toastify-content hidden flex">
                                        <i class="text-success" data-lucide="check-circle"></i>
                                        <div class="ml-4 mr-4">
                                            <div class="font-medium">Registration success!</div>
                                            <div class="text-slate-500 mt-1"> Please check your e-mail for further info! </div>
                                        </div>
                                    </div>
                                    <!-- END: Success Notification Content -->
                                    <!-- BEGIN: Failed Notification Content -->
                                    <div id="failed-notification-content" class="toastify-content hidden flex">
                                        <i class="text-danger" data-lucide="x-circle"></i>
                                        <div class="ml-4 mr-4">
                                            <div class="font-medium">Registration failed!</div>
                                            <div class="text-slate-500 mt-1"> Please check the fileld form. </div>
                                        </div>
                                    </div>
                                    <!-- END: Failed Notification Content -->
                                </div>
                                <div class="source-code hidden">
                                    <button data-target="#copy-form-validation" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                                    <div class="overflow-y-auto mt-3 rounded-md">
                                        <pre id="copy-form-validation" class="source-preview"> <code class="html"> HTMLOpenTag!-- BEGIN: Validation Form --HTMLCloseTag HTMLOpenTagform class=&quot;validate-form&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;input-form&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-1&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Name HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500&quot;HTMLCloseTagRequired, at least 2 charactersHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-1&quot; type=&quot;text&quot; name=&quot;name&quot; class=&quot;form-control&quot; placeholder=&quot;John Legend&quot; minlength=&quot;2&quot; requiredHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-2&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Email HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500&quot;HTMLCloseTagRequired, email address formatHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-2&quot; type=&quot;email&quot; name=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;example@gmail.com&quot; requiredHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-3&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Password HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500&quot;HTMLCloseTagRequired, at least 6 charactersHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-3&quot; type=&quot;password&quot; name=&quot;password&quot; class=&quot;form-control&quot; placeholder=&quot;secret&quot; minlength=&quot;6&quot; requiredHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-4&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Age HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500&quot;HTMLCloseTagRequired, integer only &amp; maximum 3 charactersHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-4&quot; type=&quot;number&quot; name=&quot;age&quot; class=&quot;form-control&quot; placeholder=&quot;21&quot; requiredHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-5&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Profile URL HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500&quot;HTMLCloseTagOptional, URL formatHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-5&quot; type=&quot;url&quot; name=&quot;url&quot; class=&quot;form-control&quot; placeholder=&quot;https://google.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-6&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Comment HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500&quot;HTMLCloseTagRequired, at least 10 charactersHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTagtextarea id=&quot;validation-form-6&quot; class=&quot;form-control&quot; name=&quot;comment&quot; placeholder=&quot;Type your comments&quot; minlength=&quot;10&quot; requiredHTMLCloseTagHTMLOpenTag/textareaHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagbutton type=&quot;submit&quot; class=&quot;btn btn-primary mt-5&quot;HTMLCloseTagRegisterHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag/formHTMLCloseTag HTMLOpenTag!-- END: Validation Form --HTMLCloseTag HTMLOpenTag!-- BEGIN: Success Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;success-notification-content&quot; class=&quot;toastify-content hidden flex&quot; HTMLCloseTag HTMLOpenTagi class=&quot;text-success&quot; data-lucide=&quot;check-circle&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTagdiv class=&quot;ml-4 mr-4&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagRegistration success!HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-slate-500 mt-1&quot;HTMLCloseTag Please check your e-mail for further info! HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Success Notification Content --HTMLCloseTag HTMLOpenTag!-- BEGIN: Failed Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;failed-notification-content&quot; class=&quot;toastify-content hidden flex&quot; HTMLCloseTag HTMLOpenTagi class=&quot;text-danger&quot; data-lucide=&quot;x-circle&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTagdiv class=&quot;ml-4 mr-4&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagRegistration failed!HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-slate-500 mt-1&quot;HTMLCloseTag Please check the fileld form. HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Failed Notification Content --HTMLCloseTag </code> </pre>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Modal Body -->
                            <!-- BEGIN: Modal Footer -->
                            <!-- END: Modal Footer -->
                        </div>
                    </div>
                </div> <!-- END: Modal Content -->
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <!-- <button class="btn btn-primary shadow-md mr-2">Add New Product</button> -->

                </div>
            </div>
            <!-- end of add data-->
            <br>
            <!-- BEGIN: table -->
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
                </div>
                <!-- START :table content -->
                <div class="overflow-x-auto scrollbar-hidden">
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
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

                                    <div class="card-body" id="print">
                                        <div class="message-show">

                                        </div>
                                        <table class="table table-bordered table-striped" id="example">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Role</th>
                                                    <th>City</th>
                                                    <th>Status</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="userdata" id="userid">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN FOOTER -->

        </div>


    </div>
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
            loadData();

            $(".success").css({
                "display": "none"
            });
            $(".failed").css({
                "display": "none"
            });

            function loadData(searchuser) {
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {
                        getRowsuser: 1,
                        searchuser: searchuser,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".userdata").html(response);
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
                                            columns: [0, 1, 2, 3, 4, 5]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5]
                                            //specify which column you want to print

                                        }
                                    },
                                    {
                                        extend: 'print',
                                        exportOptions: {
                                            stripHtml: false,
                                            columns: [0, 1, 2, 3, 4, 5]
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

            $("#userform").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        console.log("Form data submitted");
                        document.getElementById("userform").reset();
                        loadData();
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
                var user_id = $(this).attr("id");
                // console.log(sup_id);
                user_id = user_id.split(" ");
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
                        user_id: user_id[1],
                        fetch: 1,
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        $("#name").val(data.name);
                        $("#email").val(data.email);
                        $("#phone").val(data.phone);
                        $("#role_id").val(data.role_id);
                        $("#city").val(data.city);
                        $("#status_id").val(data.status_id);
                        $("#user_id").val(data.id);
                        loadData();
                        // document.getElementById("at-form").reset();
                    }
                })
            })
            $(document).on('click', '.del_user', function() {
                var user_id = $(this).attr("id");
                // console.log(dep_id);
                user_id = user_id.split(" ");
                // console.log(dep_id[1]);

                $(document).on('click', '#delete_user', function() {
                    // console.log("Delete Clicked");
                    $.ajax({
                        url: 'action.php',
                        method: "POST",
                        data: {
                            user_id: user_id[1],
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