<?php include("D_Config/D_Connection.php");?><!DOCTYPE html>
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


                <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 lg:col-span-6">
                        <!-- BEGIN: Basic Accordion -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                All reports
                                </h2>
                               
                            </div>
                            <div id="basic-accordion" class="p-5">
                                <div class="preview">
                                    <div id="faq-accordion-1" class="accordion">
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                            <a href= "assetActivityReport.php" class="text-base mr-auto" style = "color: blue">
                                              Asset Activity Report
                                            </a>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                            <a href= "reportByStatus.php" class="text-base mr-auto" style = "color:blue;">
                                              Report by Status
                                             </a>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                            <a href= "componentActivityReport.php" class="text-base" style = "color: blue">
                                    Component Activity Report
                            </a>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                            <a href= "reportBySupplier.php" class="text-base" style="color:blue;">
                                    Report by Supplier
                            </a>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                            <a href= "maintenanceReport.php" class="text-base mr-auto" style = "color: blue">
                                    Maintenance Report
                            </a>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                            <a href= "reportByLocation.php" class="text-base" style = "color:blue;" >
                                    Report by Location
                            </a>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                            <a href= "reportByType.php" class="text-base mr-auto" style = "color: blue">
                                     Report by type
                            </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                         <!-- END: Basic Accordion -->
                    </div>
                   
                </div>

</div>
</div>
                <div>
<?php
        include("F_file/footer.php");
        ?>
</div>



            
            <?php
   include("F_file/f_script.php")
   ?>
    </body>
</html>
