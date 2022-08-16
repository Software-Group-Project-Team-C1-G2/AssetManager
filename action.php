<?php
session_start();

require_once "D_Config/D_Connection.php";


$db = new DB();

$pdo = $db->connection();
// echo $table;

// Login code Start
if (isset($_POST['login_btn'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $users = $db->getRows('tbl_user', array('where' => array('email' => $email, 'password' => $password), 'return_type' => 'single'));

    if ($users > 0) {
        if ($users['role_id'] == '1') {
            $_SESSION['id'] = $users['id'];
            header('location:index.php');
        } elseif ($users['role_id'] == '2') {
            $_SESSION['id'] = $users['id'];
            header('location:index.php');
        } else {
            echo "User Not Found";
        }
    } else {
        $_SESSION['$message'] = 'incorrect email or password!';
        header('location:login.php');

        //$message[] = 'incorrect email or password!';
    }
}
// Login code End

// Code for CRUD operations in tbl_loc_brands_dep_atype
if (isset($_POST['action_type']) && $_POST['action_type'] == 'add') {


    $table = "tbl_loc_brands_dep_atype";
    // echo $table . "\n";
    // $redirect_url = $_POST['redirect_url'];
    // echo $redirect_url;
    $valErr = '';
    $name = $_POST['name'];
    // $name = $_POST['atype_Name'];
    $descript = $_POST['descript'];
    // $descript = $_POST['atype_Desc'];
    $type = $_POST['type'];

    // echo $name . " " . $descript . " " . $type . "\n";

    // echo "\n" . $_POST['dep_id'];

    if (!empty($_POST['dep_id'])) {

        // echo "\n in Update COde";
        $userData = array(
            'name' => $name,
            'description' => $descript,
            // 'type' => $type,
        );

        $condition = array('id' => $_POST['dep_id']);

        $update = $db->update($table, $userData, $condition);

        if ($update) {
            $status = 200;
            $statusMsg = 'Department Data Has Been Updated Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    } elseif (!empty($_POST['loc_id'])) {
        $userData = array(
            'name' => $name,
            'description' => $descript,
            // 'type' => $type,
        );

        $condition = array('id' => $_POST['loc_id']);

        $update = $db->update($table, $userData, $condition);

        if ($update) {
            $status = 200;
            $statusMsg = 'Department Data Has Been Updated Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    } elseif (!empty($_POST['brands_id'])) {
        $userData = array(
            'name' => $name,
            'description' => $descript,
            // 'type' => $type,
        );

        $condition = array('id' => $_POST['brands_id']);

        $update = $db->update($table, $userData, $condition);

        if ($update) {
            $status = 200;
            $statusMsg = 'Department Data Has Been Updated Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    } elseif (!empty($_POST['atype_id'])) {
        $userData = array(
            'name' => $name,
            'description' => $descript,
            // 'type' => $type,
        );

        $condition = array('id' => $_POST['atype_id']);

        $update = $db->update($table, $userData, $condition);

        if ($update) {
            $status = 200;
            $statusMsg = 'Department Data Has Been Updated Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    } else {

        // echo "\nIn insert code";
        $userData = array(
            'name' => $name,
            'description' => $descript,
            'type' => $type,
        );



        $insert = $db->insert($table, $userData);

        if ($insert) {
            $status = 200;
            $statusMsg = 'User Data Has Been Added Successfully!';

            // $redirect_url = 'asset-types.php';
        }

        echo json_encode($status);
    }



    // $sessData['status']['type'] = $status;
    // $sessData['status']['msg'] = $statusMsg;
    // $_SESSION['status'] = $status;
    // $_SESSION['statusMsg'] = $statusMsg;
    // echo $sessData;
    // echo array($sessData);
    // echo $sessData['status']['msg'];
    // $_SESSION['sessData'] = $sessData;

    // echo "data has been submitted successfully";
    // echo $_SESSION['status'];

    // Start action1.php file data here//


}

// Location Code Start
if (isset($_POST['fetch']) && isset($_POST['loc_id'])) {
    $row = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('id' => $_POST['loc_id']), 'return_type' => 'single'));
    echo json_encode($row);
}

if (isset($_POST['getRowsLoc'])) {
    if (isset($_POST['query'])) {
        $search = $_POST['query'];
        $sql = "SELECT * 
                FROM tbl_loc_brands_dep_atype
                WHERE (name LIKE '%$search%' OR description LIKE '%$search%') AND (type=1)";
        $statement = $pdo->query($sql);
        $deps = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $deps = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '1')));
    }
    $output = "";

    if (!empty($deps)) {
        // $i = 0;
        foreach ($deps as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['description'] . "</td>";
            $output .= "<td>
                    <div class='dropdown w-1/2 sm:w-auto'>
                        <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                        <div class='dropdown-menu w-40'>
                            <ul class='dropdown-content'>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                                </li>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_dep' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}

if (isset($_POST['delete']) && isset($_POST['loc_id'])) {
    $delete = $db->delete('tbl_loc_brands_dep_atype', array('id' => $_POST['loc_id']));
    // echo json_encode($row);
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

// Location Code End

// Brands Code Start
if (isset($_POST['fetch']) && isset($_POST['brands_id'])) {
    $row = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('id' => $_POST['brands_id']), 'return_type' => 'single'));
    echo json_encode($row);
}
if (isset($_POST['delete']) && isset($_POST['brands_id'])) {
    $delete = $db->delete('tbl_loc_brands_dep_atype', array('id' => $_POST['brands_id']));
    // echo json_encode($row);
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

if (isset($_POST['getRowsBrands'])) {
    if (isset($_POST['query'])) {
        $search = $_POST['query'];
        $sql = "SELECT * 
                FROM tbl_loc_brands_dep_atype
                WHERE (name LIKE '%$search%' OR description LIKE '%$search%') AND (type=2)";
        $statement = $pdo->query($sql);
        $deps = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $deps = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '2')));
    }
    $output = "";

    if (!empty($deps)) {
        // $i = 0;
        foreach ($deps as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['description'] . "</td>";
            $output .= "<td>
                    <div class='dropdown w-1/2 sm:w-auto'>
                        <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                        <div class='dropdown-menu w-40'>
                            <ul class='dropdown-content'>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                                </li>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_dep' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}
// Brands Code End

// Department Code Start
if (isset($_POST['fetch']) && isset($_POST['dep_id'])) {
    $row = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('id' => $_POST['dep_id']), 'return_type' => 'single'));
    echo json_encode($row);
}
if (isset($_POST['delete']) && isset($_POST['dep_id'])) {
    $delete = $db->delete('tbl_loc_brands_dep_atype', array('id' => $_POST['dep_id']));
    // echo json_encode($row);
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

if (isset($_POST['getRowsDep'])) {
    if (isset($_POST['query'])) {
        $search = $_POST['query'];
        $sql = "SELECT * 
                FROM tbl_loc_brands_dep_atype
                WHERE (name LIKE '%$search%' OR description LIKE '%$search%') AND (type=3)";
        $statement = $pdo->query($sql);
        $deps = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $deps = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '3')));
    }
    $output = "";

    if (!empty($deps)) {
        // $i = 0;
        foreach ($deps as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['description'] . "</td>";
            $output .= "<td>
                    <div class='dropdown w-1/2 sm:w-auto'>
                        <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                        <div class='dropdown-menu w-40'>
                            <ul class='dropdown-content'>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                                </li>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_dep' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}
// Department Code End

// Asset Type Code Start

if (isset($_POST['fetch']) && isset($_POST['atype_id'])) {
    $row = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('id' => $_POST['atype_id']), 'return_type' => 'single'));
    echo json_encode($row);
}
if (isset($_POST['delete']) && isset($_POST['atype_id'])) {
    $delete = $db->delete('tbl_loc_brands_dep_atype', array('id' => $_POST['atype_id']));
    // echo json_encode($row);
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

if (isset($_POST['getRowsAtype'])) {
    if (isset($_POST['query'])) {
        $search = $_POST['query'];
        $sql = "SELECT * 
                FROM tbl_loc_brands_dep_atype
                WHERE (name LIKE '%$search%' OR description LIKE '%$search%') AND (type=4)";
        $statement = $pdo->query($sql);
        $deps = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $deps = $db->getRows('tbl_loc_brands_dep_atype', array('where' => array('type' => '4')));
    }
    $output = "";

    if (!empty($deps)) {
        // $i = 0;
        foreach ($deps as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['description'] . "</td>";
            $output .= "<td>
                    <div class='dropdown w-1/2 sm:w-auto'>
                        <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                        <div class='dropdown-menu w-40'>
                            <ul class='dropdown-content'>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                                </li>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_dep' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}

// Asset Type Code End
// Start Supplier Code
if (isset($_POST['action_type']) && $_POST['action_type'] == 'sup') {
    // $redirect_url = $_POST['redirect_url'];
    // echo $redirect_url;

    $valErr = '';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];

    if (!empty($_POST['sup_id'])) {

        echo "\n in Update COde";
        $suplierdata = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'zip' => $zip
        );

        $condition = array('id' => $_POST['sup_id']);

        $update = $db->update('tbl_supplier', $suplierdata, $condition);

        if ($update) {
            $status = 200;
            $statusMsg = 'Department Data Has Been Updated Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    } else {
        $supplierdata = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'zip' => $zip
        );
        $insert = $db->insert("tbl_supplier", $supplierdata);

        if ($insert) {
            $status = 200;
            $statusMsg = 'User Data Has Been Added Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    }



    echo json_encode($status);
}



// $sessData['status']['type'] = $status;
// $sessData['status']['msg'] = $statusMsg;
// // $_SESSION['status'] = $status;
// // $_SESSION['statusMsg'] = $statusMsg;
// // echo $sessData;
// // echo array($sessData);
// // echo $sessData['status']['msg'];
// $_SESSION['sessData'] = $sessData;

// echo "data has been submitted successfully";
// echo $_SESSION['status'];
if (isset($_POST['fetch']) && isset($_POST['sup_id'])) {
    $row = $db->getRows('tbl_supplier', array('where' => array('id' => $_POST['sup_id']), 'return_type' => 'single'));
    echo json_encode($row);
}
if (isset($_POST['delete']) && isset($_POST['sup_id'])) {
    $delete = $db->delete('tbl_supplier', array('id' => $_POST['sup_id']));
    // echo json_encode($row);
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

if (isset($_POST['getRowsSup'])) {

    if (isset($_POST['searchquery'])) {
        $search = $_POST['searchquery'];
        $sql = "SELECT * 
                FROM tbl_supplier
                WHERE (name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR address LIKE '%$search%'
                OR city LIKE '%$search%' OR country LIKE '%$search%' OR zip LIKE '%$search%')";
        $statement = $pdo->query($sql);
        $sups = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sups = $db->getRows('tbl_supplier');
    }
    $output = "";

    if (!empty($sups)) {
        // $i = 0;
        foreach ($sups as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['email'] . "</td>";
            $output .= "<td>" . $row['phone'] . "</td>";
            $output .= "<td>" . $row['address'] . "</td>";
            $output .= "<td>" . $row['city'] . "</td>";
            $output .= "<td>" . $row['country'] . "</td>";
            $output .= "<td>" . $row['zip'] . "</td>";
            $output .= "<td>
                    <div class='dropdown w-1/2 sm:w-auto'>
                        <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                        <div class='dropdown-menu w-40'>
                            <ul class='dropdown-content'>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                                </li>
                                <li>
                                     <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_sup' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}
// End Suplier Code

// Components Code Start
if (isset($_POST['action_type']) && $_POST['action_type'] == 'cmp') {
    // $redirect_url = $_POST['redirect_url'];
    // echo $redirect_url;
    // $img = $_FILES['cmp_img'];
    $status = "";
    $name = $_POST['cmp_name'];
    $qty = $_POST['cmp_qty'];
    $serial = $_POST['cmp_serial'];
    $loc = $_POST['cmp_loc'];
    $brand = $_POST['cmp_brand'];
    $sup = $_POST['cmp_sup'];
    $atype = $_POST['cmp_atype'];
    $cost = $_POST['cmp_cost'];
    $pur = $_POST['cmp_pur'];
    $warr = $_POST['cmp_war'];
    $status = $_POST['cmp_status'];
    $descript = $_POST['cmp_desc'];

    $img_name = $_FILES['cmp_img']['name'];
    $tmp_name = $_FILES['cmp_img']['tmp_name'];
    $img_error = $_FILES['cmp_img']['error'];
    // $tmp_name = $img['tmp_name'];
    // $img_error = $img['error'];

    if (!empty($_POST['cmp_id'])) {
        echo "In Update Code";
        echo "\n" . $_POST['cmp_id'] . " cmp_id";
        if ($img_error == 0) {
            echo "\nInside img if";
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            // echo $img_ex_lc;
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = "component_imgs/" . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // below query is for inserting data into inventory table
                $cmp_data = array(
                    'name' => $name,
                    'serial' => $serial,
                    'quantity' => $qty,
                    'supplier_id' => $sup,
                    'asset_type_id' => $atype,
                    'location_id' => $loc,
                    'brand_id' => $brand,
                    'cost' => $cost,
                    'purchase_date' => $pur,
                    'warranty' => $warr,
                    'status' => $status,
                    'description' => $descript,
                    'picture' => $new_img_name,
                );

                $condition = array('id' => $_POST['cmp_id']);
                $update = $db->update("tbl_components", $cmp_data, $condition);

                if ($update) {
                    $status = 200;
                    $statusMsg = 'Components Data Has Been Added Successfully!';

                    // $redirect_url = 'asset-types.php';
                }
            }
        } else {
            echo "\nElse not image";
            $cmp_data = array(
                'name' => $name,
                'serial' => $serial,
                'quantity' => $qty,
                'supplier_id' => $sup,
                'asset_type_id' => $atype,
                'location_id' => $loc,
                'brand_id' => $brand,
                'cost' => $cost,
                'purchase_date' => $pur,
                'warranty' => $warr,
                'status' => $status,
                'description' => $descript,
                // 'picture' => $new_img_name,
            );

            $condition = array('id' => $_POST['cmp_id']);
            $update = $db->update("tbl_components", $cmp_data, $condition);

            if ($update) {
                $status = 200;
                $statusMsg = 'Components Data Has Been Added Successfully!';

                // $redirect_url = 'asset-types.php';
            }
        }
    } else {
        if ($img_error == 0) {

            echo "\nInside insert";
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            // echo $img_ex_lc;
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = "component_imgs/" . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // below query is for inserting data into inventory table
                $cmp_data = array(
                    'name' => $name,
                    'serial' => $serial,
                    'quantity' => $qty,
                    'supplier_id' => $sup,
                    'asset_type_id' => $atype,
                    'location_id' => $loc,
                    'brand_id' => $brand,
                    'cost' => $cost,
                    'purchase_date' => $pur,
                    'warranty' => $warr,
                    'status' => $status,
                    'description' => $descript,
                    'picture' => $new_img_name,
                );
                $insert = $db->insert("tbl_components", $cmp_data);

                if ($insert) {
                    $status = 200;
                    $statusMsg = 'Components Data Has Been Added Successfully!';

                    // $redirect_url = 'asset-types.php';
                }
            }
        }
    }

    echo $status;
}

if (isset($_POST['getRowsCmp'])) {

    if (isset($_POST['query'])) {
        $search = $_POST['query'];
        $sql = "SELECT * 
                FROM tbl_components
                WHERE (name LIKE '%$search%' OR serial LIKE '%$search%' OR quantity LIKE '%$search%' OR cost LIKE '%$search%'
                OR warranty LIKE '%$search%' OR description LIKE '%$search%')";
        $statement = $pdo->query($sql);
        $sups = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sups = $db->getRows('tbl_components');
        // echo json_encode($sups);
    }
    $output = "";

    if (!empty($sups)) {
        // $i = 0;
        foreach ($sups as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td><img src='component_imgs/{$row['picture']}' style='border-radius: 50%; height:100px; width:100px' /></td>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['serial'] . "</td>";
            $output .= "<td>" . $row['quantity'] . "</td>";
            $output .= "<td>" . $row['cost'] . "</td>";
            $output .= "<td>" . $row['purchase_date'] . "</td>";
            $output .= "<td>" . $row['warranty'] . "</td>";
            $output .= "<td>" . $row['status'] . "</td>";
            $output .= "<td>" . $row['description'] . "</td>";
            $output .= "<td>
                    <div class='dropdown w-1/2 sm:w-auto'>
                        <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                        <div class='dropdown-menu w-40'>
                            <ul class='dropdown-content'>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item checkout' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview2'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Check out </a>
                                </li>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                                </li>
                                <li>
                                     <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_cmp' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}

if (isset($_POST['fetch']) && isset($_POST['cmp_id'])) {
    $row = $db->getRows('tbl_components', array('where' => array('id' => $_POST['cmp_id']), 'return_type' => 'single'));
    echo json_encode($row);
}

if (isset($_POST['delete']) && isset($_POST['cmp_id'])) {
    $delete = $db->delete('tbl_components', array('id' => $_POST['cmp_id']));
    // echo json_encode($row);
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

// Components Code End

// Start User Code

if (isset($_POST['action_type']) && $_POST['action_type'] == 'usertype') {
    // $redirect_url = $_POST['redirect_url'];
    // echo $redirect_url;

    $valErr = '';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $password = md5($_POST['password']);
    $city = $_POST['city'];


    if (!empty($_POST['user_id'])) {
        if (!empty($_POST['password'])) {
            $userdata = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'status_id' => $status,
                'role_id' => $role,
                'password' => $password,
                'city' => $city
            );
        } else {
            $userdata = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'status_id' => $status,
                'role_id' => $role,
                'city' => $city
            );
        }
        // if(!empty)



        $condition = array('id' => $_POST['user_id']);

        $update = $db->update('tbl_user', $userdata, $condition);

        if ($update) {
            $status = 200;
            $statusMsg = 'User Data Has Been Updated Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    } else {
        $userdata = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'status_id' => $status,
            'role_id' => $role,
            'password' => $password,
            'city' => $city
        );
        $insert = $db->insert("tbl_user", $userdata);

        if ($insert) {
            $status = 200;
            $statusMsg = 'User Data Has Been Added Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    }
}
if (isset($_POST['getRowsuser'])) {
    if (isset($_POST['searchuser'])) {
        $search = $_POST['searchuser'];
        $sql = "SELECT * 
                        FROM tbl_user
                        WHERE (name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' 
                        OR city LIKE '%$search%')";
        $statement = $pdo->query($sql);
        $usersdata = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $usersdata = $db->getRows('tbl_user');
    }
    $output = "";
    if (!empty($usersdata)) {
        // $i = 0;
        foreach ($usersdata as $row) {
            $roleid = $row['role_id'] == 1 ? "Admin" : "User";
            $statusid = $row['status_id'] == 1 ? "Active" : "Inactive";
            // $i++;
            $output .= "<tr>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['email'] . "</td>";
            $output .= "<td>" . $row['phone'] . "</td>";
            $output .= "<td>" . $roleid . "</td>";
            $output .= "<td>" . $row['city'] . "</td>";
            $output .= "<td>" .  $statusid . "</td>";
            $output .= "<td>
                            <div class='dropdown w-1/2 sm:w-auto'>
                                <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                                <div class='dropdown-menu w-40'>
                                    <ul class='dropdown-content'>
                                        <li>
                                            <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;'  class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                                        </li>
                                        <li>
                                            <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_user' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}
if (isset($_POST['fetch']) && isset($_POST['user_id'])) {
    $row = $db->getRows('tbl_user', array('where' => array('id' => $_POST['user_id']), 'return_type' => 'single'));
    echo json_encode($row);
}

if (isset($_POST['delete']) && isset($_POST['user_id'])) {
    $delete = $db->delete('tbl_user', array('id' => $_POST['user_id']));
    // echo json_encode($row);
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}
// header("Location:" . $redirect_url);

// End User Code
//start assets code

if (isset($_POST['action_type']) && $_POST['action_type'] == 'ass') {
    // $table = $_POST['ass_tbl'];
    $table = "tbl_assets";
    $valErr = '';
    $name = $_POST['name'];
    $asset_tag = $_POST['asset_tag'];
    $supplier_id = $_POST['supplier_id'];
    $location_id = $_POST['location_id'];
    $brand_id = $_POST['brand_id'];
    $serial = $_POST['serial'];
    $asset_type_id = $_POST['asset_type_id'];
    $cost = $_POST['cost'];
    $purchase_date = $_POST['purchase_date'];
    $warranty = $_POST['warranty'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $img_error = $_FILES['image']['error'];

    // $fileext = explode(";", $img);
    // $extantion = explode("/", $fileext[0])[1];
    // $data = explode(",", $fileext[1])[1];

    // $profileData = base64_decode($data);
    // $imagePath = 'asset_imgs/image-'.time().'.'.$extantion;

    // echo $imagePath;
    // file_put_contents($imagePath,$profileData);

    // echo $name . " " . $descript . " " . $type . "\n";

    // echo "\n" . $_POST['dep_id'];
    if (!empty($_POST['asset_id'])) {
        echo "In Update Code";
        $asset_id = $_POST['asset_id'];
        if ($img_error == 0) {
            // echo "\nInside img if";
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            // echo $img_ex_lc;
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = "asset_imgs/" . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $assetData = array(
                    'id' => $asset_id,
                    'name' => $name,
                    'asset_tag' => $asset_tag,
                    'supplier_id' => $supplier_id,
                    'location_id' => $location_id,
                    'brand_id' => $brand_id,
                    'serial' => $serial,
                    'asset_type_id' => $asset_type_id,
                    'cost' => $cost,
                    'purchase_date' => $purchase_date,
                    'warranty' => $warranty,
                    'status' => $status,
                    'picture' => $new_img_name,
                    'description' => $description,

                );


                $condition = array('id' => $_POST['asset_id']);
                // console.log($_POST['asset_id']);

                $update = $db->update("tbl_assets", $assetData, $condition);

                if ($update) {
                    $status = "success";
                    $statusMsg = 'Asset data has been updated successfully!';
                    // echo $statusMsg;
                    // $redirect_url = 'asset-types.php';
                }
            }
        } else {
            $assetData = array(
                'id' => $asset_id,
                'name' => $name,
                'asset_tag' => $asset_tag,
                'supplier_id' => $supplier_id,
                'location_id' => $location_id,
                'brand_id' => $brand_id,
                'serial' => $serial,
                'asset_type_id' => $asset_type_id,
                'cost' => $cost,
                'purchase_date' => $purchase_date,
                'warranty' => $warranty,
                'status' => $status,
                // 'picture' => $new_img_name,
                'description' => $description,

            );


            $condition = array('id' => $_POST['asset_id']);
            // console.log($_POST['asset_id']);

            $update = $db->update("tbl_assets", $assetData, $condition);

            if ($update) {
                $status = "success";
                $statusMsg = 'Asset data has been updated successfully!';
                // echo $statusMsg;
                // $redirect_url = 'asset-types.php';
            }
        }
    } else {
        if ($img_error == 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            // echo $img_ex_lc;
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = "asset_imgs/" . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                echo "\nIn insert code";
                $assetData = array(
                    'name' => $name,
                    'asset_tag' => $asset_tag,
                    'supplier_id' => $supplier_id,
                    'location_id' => $location_id,
                    'brand_id' => $brand_id,
                    'serial' => $serial,
                    'asset_type_id' => $asset_type_id,
                    'cost' => $cost,
                    'purchase_date' => $purchase_date,
                    'warranty' => $warranty,
                    'status' => $status,
                    'picture' => $new_img_name,
                    'description' => $description,
                );

                $insert = $db->insert('tbl_assets', $assetData);

                if ($insert) {
                    $status = 200;
                    $statusMsg = 'User data has been added successfully!';
                    echo $statusMsg;
                    // $redirect_url = 'asset-types.php';
                }
            }
        }
    }
    echo $status;

    // $sessData['status']['type'] = $status;
    // $sessData['status']['msg'] = $statusMsg;
    // $_SESSION['status'] = $status;
    // $_SESSION['statusMsg'] = $statusMsg;
    // echo $sessData;
    // echo array($sessData);
    // echo $sessData['status']['msg'];
    // $_SESSION['sessData'] = $sessData;

    // echo "data has been submitted successfully";
    // echo $_SESSION['status'];
}


if (isset($_POST['fetch']) && isset($_POST['asset_id'])) {
    $row = $db->getRows('tbl_assets', array('where' => array('id' => $_POST['asset_id']), 'return_type' => 'single'));
    echo json_encode($row);
}


if (isset($_POST['delete']) && isset($_POST['asset_id'])) {
    $delete = $db->delete('tbl_assets', array('id' => $_POST['asset_id']));
    // echo json_encode($row);
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

if (isset($_POST['getRowsAsset'])) {

    if (isset($_POST['squery'])) {
        $search = $_POST['squery'];
        $sql = "SELECT tbl_assets.picture, tbl_assets.asset_tag, tbl_assets.name, tbl_loc_brands_dep_atype.name in(SELECT name FROM tbl_loc_brands_dep_atype WHERE type=4), tbl_loc_brands_dep_atype.name in(SELECT name FROM tbl_loc_brands_dep_atype WHERE type=2), tbl_loc_brands_dep_atype.name in(SELECT name FROM tbl_loc_brands_dep_atype WHERE type=1)
                FROM tbl_assets, tbl_loc_brands_dep_atype
                WHERE (tbl_assets.location_id = tbl_loc_brands_dep_atype.id OR tbl_assets.brand_id = tbl_loc_brands_dep_atype.id OR tbl_assets.asset_type_id = tbl_loc_brands_dep_atype.id) AND (tbl_assets.asset_tag LIKE '%$search%' OR tbl_assets.name LIKE '%$search%' OR tbl_loc_brands_dep_atype.name LIKE '%$search%')";
        $statement = $pdo->query($sql);
        $asset = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $asset = $db->getRows('tbl_assets');
    }

    $output = "";
    if (!empty($asset)) {
        // $i = 0;
        foreach ($asset as $row) {

            $output .= "<tr>";
            $output .= "<td><img src='asset_imgs/{$row['picture']}' style='border-radius: 50%; height:100px; width:100px' /></td>";
            $output .= "<td>" . $row['asset_tag'] . "</td>";
            $output .= "<td>" . $row['name'] . "</td>";

            $id = $row['asset_type_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id and type=4";
            $statement1 = $pdo->query($sql1);
            $asset_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($asset_type_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $id = $row['brand_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id and type=2";
            $statement1 = $pdo->query($sql1);
            $brand_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($brand_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $id = $row['location_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id and type=1";
            $statement1 = $pdo->query($sql1);
            $location_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($location_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }
            $output .= "<td>
            
                    <div class='dropdown w-1/2 sm:w-auto'>
                        <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                        <div class='dropdown-menu w-40'>
                            <ul class='dropdown-content'>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                                </li>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_dep' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                                </li>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_dep' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview2' onclick='checkin(" . $row['id'] . ")'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Check In </a>
                                </li>
                                <li>
                                    <a id='tabulator-export-csv " . $row['id'] . "' href='Assets_details.php?id=" . $row['id'] . "' class='dropdown-item del_dep' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Detail </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}

if (isset($_GET['checkInID'])) {
    $data = [];
    $a_id = $_GET['checkInID'];

    $sql = "select id,name,asset_tag from tbl_assets where id=$a_id";
    $statement1 = $pdo->query($sql);
    $ass = $statement1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($ass as $row) {
        $a_name = $row['name'];
        $a_tag = $row['asset_tag'];
    }

    $data['id'] = "$a_id";
    $data['assetName'] = "$a_name";
    $data['assetTag'] = "$a_tag";

    //end
    echo json_encode($data);
}
//End assets code

//start Employee code
if (isset($_POST['action_type1']) && $_POST['action_type1'] == 'emp_add') {


    $valErr = '';

    $name = $_POST['name'];
    $Email = $_POST['Email'];
    $job_role = $_POST['job_role'];
    $department_id = $_POST['department_id'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $address = $_POST['address'];


    if (!empty($_POST['emp_id'])) {
        $EmployeesData = array(

            'name' => $name,
            'Email' => $Email,
            'job_role' => $job_role,
            'department_id' => $department_id,
            'city' => $city,
            'country' => $country,
            'address' => $address

        );

        $condition = array('id' => $_POST['emp_id']);

        $update = $db->update('tbl_employees', $EmployeesData, $condition);

        if ($update) {
            $status = 200;
            $statusMsg = 'Department Data Has Been Updated Successfully!';
        }
    } else {
        $EmployeesData = array(
            'name' => $name,
            'Email' => $Email,
            'job_role' => $job_role,
            'department_id' => $department_id,
            'city' => $city,
            'country' => $country,
            'address' => $address

        );
        $insert = $db->insert("tbl_employees", $EmployeesData);

        if ($insert) {
            $status = 200;
            $statusMsg = 'User Data Has Been Added Successfully!';
        }
    }
    echo json_encode($status);
}





if (isset($_POST['fetch']) && isset($_POST['emp_id'])) {
    $row = $db->getRows('tbl_employees', array('where' => array('id' => $_POST['emp_id']), 'return_type' => 'single'));
    echo json_encode($row);
}
if (isset($_POST['delete']) && isset($_POST['emp_id'])) {
    $delete = $db->delete('tbl_employees', array('id' => $_POST['emp_id']));
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}



if (isset($_POST['getRowsEmps'])) {

    if (isset($_POST['searchquery1'])) {
        $search = $_POST['searchquery1'];
        $sql = "SELECT * 
                FROM tbl_employees
                WHERE (name LIKE '%$search%' OR Email LIKE '%$search%' OR job_role LIKE '%$search%' OR department_id LIKE '%$search%' OR  address LIKE '%$search%' OR city LIKE '%$search%' OR country LIKE '%$search%')";
        $statement = $pdo->query($sql);
        $Emps = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $Emps = $db->getRows('tbl_employees');
    }

    $output = "";

    if (!empty($Emps)) {
        // $i = 0;
        foreach ($Emps as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['Email'] . "</td>";
            $output .= "<td>" . $row['job_role'] . "</td>";

            $id = $row['department_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id and type=3";
            $statement1 = $pdo->query($sql1);
            $asset_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($asset_type_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }
            $output .= "<td>" . $row['city'] . "</td>";
            $output .= "<td>" . $row['country'] . "</td>";
            $output .= "<td>" . $row['address'] . "</td>";

            $output .= "<td>
                <div class='dropdown w-1/2 sm:w-auto'>
                    <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                    <div class='dropdown-menu w-40'>
                        <ul class='dropdown-content'>
                            <li>
                                <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                            </li>
                            <li>
                                <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_Emp' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}

//End Employee code
//Maintenance code start
if (isset($_POST['action_type1']) && $_POST['action_type1'] == 'Maint_add') {


    $valErr = '';

    $asset_id = $_POST['asset_id'];
    $supplier_id = $_POST['supplier_id'];
    $asset_type_id = $_POST['asset_type_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];



    if (!empty($_POST['Maint_id'])) {
        $MaintenanceData = array(

            'asset_id' => $asset_id,
            'supplier_id' => $supplier_id,
            'asset_type_id' => $asset_type_id,
            'start_date' => $start_date,
            'end_date' => $end_date


        );

        $condition = array('id' => $_POST['Maint_id']);

        $update = $db->update('tbl_maintenances', $MaintenanceData, $condition);

        if ($update) {
            $status = 200;
            $statusMsg = 'Department Data Has Been Updated Successfully!';
        }
    } else {
        $MaintenanceData = array(
            'asset_id' => $asset_id,
            'supplier_id' => $supplier_id,
            'asset_type_id' => $asset_type_id,
            'start_date' => $start_date,
            'end_date' => $end_date
        );
        $insert = $db->insert("tbl_maintenances", $MaintenanceData);

        if ($insert) {
            $status = 200;
            $statusMsg = 'User Data Has Been Added Successfully!';
            // echo $status;
        }
    }
    echo json_encode($status);
}





if (isset($_POST['fetch']) && isset($_POST['Maint_id'])) {
    $row = $db->getRows('tbl_maintenances', array('where' => array('id' => $_POST['Maint_id']), 'return_type' => 'single'));
    echo json_encode($row);
}
if (isset($_POST['delete']) && isset($_POST['Maint_id'])) {
    $delete = $db->delete('tbl_maintenances', array('id' => $_POST['Maint_id']));
    if ($delete) {
        $status = 'success';
        $statusMsg = 'User data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

if (isset($_POST['getRowsMaints'])) {

    if (isset($_POST['searchquery1'])) {
        $search = $_POST['searchquery1'];
        $sql = "SELECT * 
                FROM tbl_maintenances
                WHERE (asset_id LIKE '%$search%' OR supplier_id LIKE '%$search%' OR asset_type_id LIKE '%$search%' OR start_date LIKE '%$search%' OR  end_date LIKE '%$search%')";
        $statement = $pdo->query($sql);
        $Maints = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $Maints = $db->getRows('tbl_maintenances');
    }

    $output = "";

    if (!empty($Maints)) {
        // $i = 0;
        foreach ($Maints as $row) {
            // $i++;

            $output .= "<tr>";

            $id = $row['asset_id'];
            $sql1 = "select name from tbl_assets where $id=id";
            $statement1 = $pdo->query($sql1);
            $asset_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($asset_type_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }


            $id = $row['supplier_id'];
            $sql1 = "select name from tbl_supplier where $id=id";
            $statement1 = $pdo->query($sql1);
            $sup_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($sup_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $id = $row['asset_type_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id";
            $statement1 = $pdo->query($sql1);
            $department_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($department_type_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $output .= "<td>" . $row['start_date'] . "</td>";
            $output .= "<td>" . $row['end_date'] . "</td>";

            $output .= "<td>
                <div class='dropdown w-1/2 sm:w-auto'>
                    <button class='dropdown-toggle btn btn-outline-secondary w-full sm:w-auto' aria-expanded='false' data-tw-toggle='dropdown'>...<i data-lucide='chevron-down' class='w-4 h-4 ml-auto sm:ml-2'></i> </button>
                    <div class='dropdown-menu w-40'>
                        <ul class='dropdown-content'>
                            <li>
                                <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item edit_data' data-tw-toggle='modal' onclick='mymodal()' data-tw-target='#header-footer-modal-preview'> <i data-lucide='edit' class='w-4 h-4 mr-2'></i> Edit </a>
                            </li>
                            <li>
                                <a id='tabulator-export-csv " . $row['id'] . "' href='javascript:;' class='dropdown-item del_Maint' data-tw-toggle='modal' data-tw-target='#header-footer-modal-preview3'> <i data-lucide='trash' class='w-4 h-4 mr-2'></i> Delete </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}
//Maintenance Code End
// Start Application Code
if (isset($_POST['action_type'])  && $_POST['action_type'] == 'app') {

    $status = "";
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $cur = $_POST['cur'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $addr = $_POST['addr'];

    $img_name = $_FILES['logo']['name'];
    $tmp_name = $_FILES['logo']['tmp_name'];
    $img_error = $_FILES['logo']['error'];

    if ($img_error == 0) {
        // echo "\nInside img if";
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        // echo $img_ex_lc;
        $allowed_exs = array('jpg', 'jpeg', 'png');
        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = "application_imgs/" . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $applicationdata = array(
                'company' => $company,
                'phone' => $phone,
                'cur' => $cur,
                'email' => $email,
                'country' => $country,
                'addr' => $addr,
                'logo' => $new_img_name
            );

            $condition = array('id' => "1");

            $update = $db->update('tbl_application', $applicationdata, $condition);

            if ($update) {
                $status = "200";
                $statusMsg = 'Appication Data Has Been Updated Successfully!';

                // $redirect_url = 'asset-types.php';
            }
        }
    } else {
        // echo "\nElse not image";
        $applicationdata = array(
            'company' => $company,
            'phone' => $phone,
            'cur' => $cur,
            'email' => $email,
            'country' => $country,
            'addr' => $addr,
            // 'logo' => $new_img_name
        );

        $condition = array('id' => "1");

        $update = $db->update('tbl_application', $applicationdata, $condition);

        if ($update) {
            $status = "200";
            $statusMsg = 'Appication Data Has Been Updated Successfully!';

            // $redirect_url = 'asset-types.php';
        }
    }
    //End Maintenance Code
    // Start Application Code
}
if (isset($_POST['fetch1'])) {
    $row = $db->getRows('tbl_application', array('where' => array('id' => "1"), 'return_type' => 'single'));
    echo json_encode($row);
}
// End Appliaction Code
// Chart Code
if (isset($_POST["action"]) == 'fetch_chart') {
    $query = "
		SELECT tbl_loc_brands_dep_atype.name, count(tbl_assets.id) AS Total 
		FROM tbl_loc_brands_dep_atype INNER JOIN tbl_assets 
        ON tbl_loc_brands_dep_atype.id = tbl_assets.asset_type_id 
        GROUP   BY tbl_loc_brands_dep_atype.name
		";
    $result = $pdo->query($query);;
    $stmt = $result->fetchAll(PDO::FETCH_ASSOC);
    $data = array();

    foreach ($stmt as $row) {
        $data[] = array(
            'name'  => $row["name"],
            'total' => $row["Total"],
            'color' => '#' . rand(100000, 999999) . ''
        );
    }

    echo json_encode($data);
}
// Chart Code End


// Start Asset Detail Code

if (isset($_POST['fetch']) && isset($_POST['cmp_id'])) {
    $row = $db->getRows('tbl_components', array('where' => array('id' => $_POST['cmp_id']), 'return_type' => 'single'));
    echo json_encode($row);
}

if (isset($_POST['getRowsCmpDetail'])) {

    if (isset($_POST['cquery'])) {
        $search = $_POST['cquery'];
        $sql = "SELECT * 
                FROM tbl_components
                WHERE (name LIKE '%$search%' OR serial LIKE '%$search%' OR quantity LIKE '%$search%')";
        $statement = $pdo->query($sql);
        $cmp = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $cmp = $db->getRows('tbl_components');
        // echo json_encode($sups);
    }
    $output = "";

    if (!empty($cmp)) {
        // $i = 0;
        foreach ($cmp as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td><img src='component_imgs/{$row['picture']}' style='border-radius: 50%; height:150px; width:150px'/></td>";
            $output .= "<td>" . $row['name'] . "</td>";

            $id = $row['asset_type_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id and type=4";
            $statement1 = $pdo->query($sql1);
            $asset_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($asset_type_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $id = $row['brand_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id and type=2";
            $statement1 = $pdo->query($sql1);
            $brand_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($brand_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $output .= "<td>" . $row['quantity'] . "</td>";
            $output .= "<td>" . $row['quantity'] . "</td>";
            $output .= "</tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}
if (isset($_POST['fetch']) && isset($_POST['cmp_id'])) {
    $row = $db->getRows('tbl_components', array('where' => array('id' => $_POST['cmp_id']), 'return_type' => 'single'));
    echo json_encode($row);
}

if (isset($_POST['getRowsCmpDetail'])) {

    if (isset($_POST['cquery'])) {
        $search = $_POST['cquery'];
        $sql = "SELECT * 
                FROM tbl_components
                WHERE (name LIKE '%$search%' OR serial LIKE '%$search%' OR quantity LIKE '%$search%')";
        $statement = $pdo->query($sql);
        $cmp = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $cmp = $db->getRows('tbl_components');
        // echo json_encode($sups);
    }
    $output = "";

    if (!empty($cmp)) {
        // $i = 0;
        foreach ($cmp as $row) {
            // $i++;
            $output .= "<tr>";
            $output .= "<td><img src='component_imgs/{$row['picture']}' style='border-radius: 50%; height:150px; width:150px'/></td>";
            $output .= "<td>" . $row['name'] . "</td>";

            $id = $row['asset_type_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id and type=4";
            $statement1 = $pdo->query($sql1);
            $asset_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($asset_type_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $id = $row['brand_id'];
            $sql1 = "select name from tbl_loc_brands_dep_atype where $id=id and type=2";
            $statement1 = $pdo->query($sql1);
            $brand_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($brand_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $output .= "<td>" . $row['quantity'] . "</td>";
            $output .= "<td>" . $row['quantity'] . "</td>";
            $output .= "</tr>";
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}


// End Asset Detail Code

//Start Asset_Detail_Maintenance Code


if (isset($_GET['Main65'])) {


    if (isset($_POST['fetch']) && isset($_POST['Maint_id'])) {
        $sql = "SELECT * FROM tbl_maintenances where id=$asset_id";
        $statement = $pdo->query($sql);
        $maint = $statement->fetchAll(PDO::FETCH_ASSOC);
        $row = $db->getRows('tbl_maintenances', array('where' => array('id' => $_POST['Maint_id'], 'id' => $_POST['id']), 'return_type' => 'single'));
        echo json_encode($row);
    }
}
if (isset($_POST['fetch']) && isset($_POST['Maint_id'])) {
    $row = $db->getRows('tbl_maintenances', array('where' => array('id' => $_POST['Maint_id']), 'return_type' => 'single'));
    echo json_encode($row);
}

if (isset($_POST['getRowsMaint'])) {

    $asset_id = $_POST['id'];

    if (isset($_POST['searchquery2'])) {
        $search = $_POST['searchquery2'];
        $sql = "SELECT * FROM tbl_maintenances
                WHERE (asset_tag LIKE '%$search%' OR asset_id LIKE '%$search%' OR supplier_id LIKE '%$search%' OR asset_type_id LIKE '%$search%' OR id=$asset_id)";
        $statement = $pdo->query($sql);
        $maint = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // $sql="select * from tbl_maintenances where id=$submit_id";
        // $statement=$pdo->query($sql); 
        $maint = $db->getRows('tbl_maintenances');
        // echo json_encode($sups);
    }
    $output = "";

    if (!empty($maint)) {
        // $i = 0;
        foreach ($maint as $row) {
            // $i++;
            $output .= "<tr>";

            $id = $row['asset_id'];
            $sql = "select asset_tag from tbl_assets where id=$id and id=$asset_id";
            $statement1 = $pdo->query($sql);
            $asset_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($asset_type_name as $row1) {
                $output .= "<td>" . $row1['asset_tag'] . "</td>";
            }

            $id = $row['asset_id'];
            $sql1 = "select name from tbl_assets where id=$id and id=$asset_id";
            $statement1 = $pdo->query($sql1);
            $asset_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($asset_type_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }


            $id = $row['supplier_id'];
            $sql1 = "select tbl_supplier.name from tbl_supplier join tbl_assets on tbl_supplier.id=tbl_assets.supplier_id where tbl_supplier.id=$id and tbl_assets.id=$asset_id";
            $statement1 = $pdo->query($sql1);
            $sup_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($sup_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $id = $row['asset_type_id'];
            $sql1 = "select tbl_loc_brands_dep_atype.name from tbl_loc_brands_dep_atype join tbl_assets on tbl_loc_brands_dep_atype.id=tbl_assets.asset_type_id where tbl_loc_brands_dep_atype.id=$id and tbl_assets.id=$asset_id and type=4";
            $statement1 = $pdo->query($sql1);
            $department_type_name = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($department_type_name as $row1) {
                $output .= "<td>" . $row1['name'] . "</td>";
            }

            $id = $row['id'];
            $sql1 = "select tbl_maintenances.start_date,tbl_maintenances.end_date from tbl_assets join tbl_maintenances on tbl_maintenances.asset_id=tbl_assets.id where tbl_maintenances.id=$id and tbl_assets.id=$asset_id";
            $statement1 = $pdo->query($sql1);
            $main_date = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($main_date as $row1) {
                $output .= "<td>" . $row1['start_date'] . "</td>";
                $output .= "<td>" . $row1['end_date'] . "</td>";
            }
        }
        echo $output;
    } else {
        echo "<h5> No Records Found</h5>";
    }
}
//End Asset_Detail_Maintenance Code
