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
                        Employee List
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
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add Employee Data</a>
                    <!-- END: Modal Toggle -->
                    <!-- BEGIN: Modal Content -->
                    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- BEGIN: Modal Header -->
                                <div class="modal-header success">
                                    <div class="alert alert-success-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="thumbs-up" class="w-6 h-6 mr-2"></i>Employee Data Added Succesfully ! </div>
                                </div>
                                <div class="modal-header failed">
                                    <div class="alert alert-danger-soft show flex items-center mb-2" style="width:100%" role="alert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Something Went Wrong.. Please Try Again</div>
                                </div>
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto" id="add_data">Add Employee Data</h2>

                                    <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li> <a href="javascript:;" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> <!-- END: Modal Header -->
                                <!-- BEGIN: Modal Body -->
                                <form id='tabulator-html-filter-form5' method="POST">
                                    <div id="tabulator-html-filter-form4" class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Full Name</label>
                                            <input id="name" name="name" type="text" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2" class="form-label">Email</label> <input id="Email" name="Email" type="Email" class="form-control" placeholder="Email"> </div>

                                        <!-- <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2" 
                                        class="form-label">Description</label> <textarea id="modal-form-2" type="textarea" rows = "2"
                                        class="form-control" placeholder="Description" ></textarea> </div>  -->
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-3" class="form-label">Job Role</label> <input id="job_role" name="job_role" type="text" class="form-control" placeholder="Job Role"> </div>
                                        <!-- <div class="col-span-12 sm:col-span-6"> <label for="modal-form-4" class="form-label">Has
                                        the Words</label> <input id="modal-form-4" type="text" class="form-control"
                                        placeholder="Job, Work, Documentation"> </div>
                                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-5"
                                        class="form-label">Doesn't Have</label> <input id="modal-form-5" type="text"
                                        class="form-control" placeholder="Job, Work, Documentation"> </div> -->
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-6" class="form-label">Department</label> <select id="department_id" type="text" name="department_id" class="form-select">
                                                <option value="" disabled selected hidden>department</option>
                                                <?php
                                                $sql = "select id,name from tbl_loc_brands_dep_atype where type=3";
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
                                            </select> </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-4" class="form-label">City</label> <input id="city" name="city" type="text" class="form-control" placeholder="City"> </div>
                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-5" class="form-label">Country</label> <select id="country" type="text" name="country" class="form-select">
                                                <option value="" disabled selected hidden>country</option>
                                                <option value="Afganistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bonaire">Bonaire</option>
                                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Canary Islands">Canary Islands</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Channel Islands">Channel Islands</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos Island">Cocos Island</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote DIvoire">Cote DIvoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curaco">Curacao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Ter">French Southern Ter</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Great Britain">Great Britain</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Hawaii">Hawaii</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="India">India</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea North">Korea North</option>
                                                <option value="Korea Sout">Korea South</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Midway Islands">Midway Islands</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Nambia">Nambia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherland Antilles">Netherland Antilles</option>
                                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                <option value="Nevis">Nevis</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau Island">Palau Island</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Phillipines">Philippines</option>
                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                <option value="Republic of Serbia">Republic of Serbia</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="St Barthelemy">St Barthelemy</option>
                                                <option value="St Eustatius">St Eustatius</option>
                                                <option value="St Helena">St Helena</option>
                                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                <option value="St Lucia">St Lucia</option>
                                                <option value="St Maarten">St Maarten</option>
                                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                <option value="Saipan">Saipan</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="Samoa American">Samoa American</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Tahiti">Tahiti</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Erimates">United Arab Emirates</option>
                                                <option value="United States of America">United States of America</option>
                                                <option value="Uraguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vatican City State">Vatican City State</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                <option value="Wake Island">Wake Island</option>
                                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zaire">Zaire</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>

                                        </div>


                                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-7" class="form-label">Address</label> <textarea id="address" name="address" type="text" rows="2" class="form-control" placeholder="Address"></textarea> </div>




                                    </div><!-- END: Modal Body -->


                                    <!-- BEGIN: Modal Footer -->
                                    <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Close</button> <input type="submit" class="btn btn-primary w-20" data-tw-dismiss="modal" id="save" name="save" value="Save"> </div>
                                    <!-- END: Modal Footer -->
                                    <input type="hidden" id="action_type1" name="action_type1" value="emp_add">
                                    <input type="hidden" id="emp_id" name="emp_id" />
                                    <input type="hidden" id="tbl" name="tbl" value="tbl_employees">
                                </form>
                            </div>
                        </div>
                    </div> <!-- END: Modal Content -->


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
                <!-- BEGIN: HTML Table Data -->
                <div class="intro-y box p-5 mt-5">
                    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">

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

                                                        <th> Full Name</th>
                                                        <th>Email</th>

                                                        <th>Job Role</th>
                                                        <th>Department</th>
                                                        <th>City</th>
                                                        <th>country</th>
                                                        <th>Address</th>


                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="Empdata" id="emp">

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
                        getRowsEmps: 1,
                        searchquery1: searchquery1,
                    },
                    // dataType: "json",
                    success: function(response) {
                        $(".Empdata").html(response);
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



            $("#tabulator-html-filter-form5").submit(function(e) {

                e.preventDefault();
                var formData = {
                    name: $("input#name").val(),
                    Email: $("input#Email").val(),
                    job_role: $("input#job_role").val(),
                    department_id: $("#department_id option:selected").val(),
                    city: $("input#city").val(),
                    country: $("#country option:selected").val(),
                    address: $("#address").val(),

                    tbl: $("input#tbl").val(),
                    action_type1: $("input#action_type1").val(),
                    emp_id: $("input#emp_id").val(),

                };
                console.log(formData);
                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: formData,
                    // dataType:"json",
                    success: function(data) {
                        //console.log(data);
                        // console.log(formData)
                        console.log("Form data submitted");
                        document.getElementById("tabulator-html-filter-form5").reset();
                        loadData();
                        console.log(data);
                        $("input#emp_id").val(null);
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
                        // $("input#emp_id").val(null);

                        // alert("Value Stored Successfully");
                    }

                    // e.preventDefault();
                })
            })
            $(document).on('click', '.edit_data', function() {
                var emp_id = $(this).attr("id");
                // console.log(emp_id);
                emp_id = emp_id.split(" ");
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
                        emp_id: emp_id[1],
                        fetch: 1,
                    },
                    dataType: "json",
                    success: function(data) {
                        //  console.log(data);
                        // console.log("Data Deleted Successfully");
                        $("#name").val(data.name);
                        $("#Email").val(data.Email);
                        $("#job_role").val(data.job_role);
                        $("#department_id").val(data.department_id);
                        $("#city").val(data.city);
                        $("#country").val(data.country);
                        $("#address").val(data.address);

                        $("#emp_id").val(data.id);

                        loadData();
                    }
                })
            })
            $(document).on('click', '.del_Emp', function() {
                var emp_id = $(this).attr("id");
                // console.log(dep_id);
                emp_id = emp_id.split(" ");
                // console.log(dep_id[1]);
                $(document).on('click', '#delete', function() {
                    $.ajax({
                        url: 'action.php',
                        method: "POST",
                        data: {
                            emp_id: emp_id[1],
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
    </script>
    <div>
        <?php
        include("F_file/footer.php");
        ?>
    </div>

</body>

</html>