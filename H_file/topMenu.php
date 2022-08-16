 <!-- BEGIN: Top Bar -->
 <?php
    $url = $_SERVER['PHP_SELF'];
    ?>
 <div class="top-bar">
     <!-- BEGIN: Breadcrumb -->
     <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.php">Application</a></li>
             <li class="breadcrumb-item active" aria-current="page">
                 <div id="Breadcrumb"></div>
             </li>
         </ol>
     </nav>
     <!-- END: Breadcrumb -->


     <!-- BEGIN: Account Menu -->
     <div class="intro-x dropdown w-8 h-8">
         <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
             <img alt="Midone - HTML Admin Template" src="dist/images/profile-13.jpg">
         </div>
         <div class="dropdown-menu w-56">
             <ul class="dropdown-content bg-primary text-white">
                 <li class="p-2">
                     <div class="font-medium">Al Pacino</div>
                     <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Frontend Engineer</div>
                 </li>

                 <li>
                     <hr class="dropdown-divider border-white/[0.08]">
                 </li>
                 <li>
                     <a href="logout.php" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                 </li>
             </ul>
         </div>
     </div>
     <!-- END: Account Menu -->
 </div>
 <!-- END: Top Bar -->