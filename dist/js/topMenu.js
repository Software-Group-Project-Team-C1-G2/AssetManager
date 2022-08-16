
// const url = window.location.href;
if (url.includes("index.php")) {
    document.getElementById("Breadcrumb").innerHTML = "DASHBOARD";
} else if (url.includes("assets.php")) {
    document.getElementById("Breadcrumb").innerHTML = "ASSETS";
}  else if (url.includes("Assets_details.php")) {
    document.getElementById("Breadcrumb").innerHTML = "ASSET DETAILS"; 
} else if (url.includes("components.php")) {
    document.getElementById("Breadcrumb").innerHTML = "COMPONENTS";
} else if (url.includes("components_details.php")) {
    document.getElementById("Breadcrumb").innerHTML = "COMPONENT DETAILS";
}else if (url.includes("maintenance.php")) {
    document.getElementById("Breadcrumb").innerHTML = "MAINTENANCES";
} else if (url.includes("asset-types.php")) {
    document.getElementById("Breadcrumb").innerHTML = "ASSET TYPES";
} else if (url.includes("brand.php")) {
    document.getElementById("Breadcrumb").innerHTML = "BRANDS";
} else if (url.includes("supplier.php")) {
    document.getElementById("Breadcrumb").innerHTML = "SUPPLIER";
} else if (url.includes("location.php")) {
    document.getElementById("Breadcrumb").innerHTML = "LOCATION";
} else if (url.includes("employee.php")) {
    document.getElementById("Breadcrumb").innerHTML = "EMPLOYEES";
} else if (url.includes("department.php")) {
    document.getElementById("Breadcrumb").innerHTML = "DEPARTMENTS";
} else if (url.includes("report.php")) {
    document.getElementById("Breadcrumb").innerHTML = "REPORTS";
} else if (url.includes("user.php")) {
    document.getElementById("Breadcrumb").innerHTML = "USERS";
} else if (url.includes("application.php")) {
    document.getElementById("Breadcrumb").innerHTML = "APPLICATION";
}
else if (url.includes("assetActivityReport.php")) {
    document.getElementById("Breadcrumb").innerHTML = "ASSET ACTIVITY REPORT";
}

else if (url.includes("componentActivityReport.php")) {
    document.getElementById("Breadcrumb").innerHTML = "COMPONENT ACTIVITY REPORT";
}

else if (url.includes("maintenanceReport.php")) {
    document.getElementById("Breadcrumb").innerHTML = "MAINTENANCE REPORT";
}

else if (url.includes("reportByLocation.php")) {
    document.getElementById("Breadcrumb").innerHTML = "REPORT BY LOCATION";
}

else if (url.includes("reportByStatus.php")) {
    document.getElementById("Breadcrumb").innerHTML = "REPORT BY STATUS";
}
else if (url.includes("reportBySupplier.php")) {
    document.getElementById("Breadcrumb").innerHTML = "REPORT BY SUPPLIER";
}

else if (url.includes("reportByType.php")) {
    document.getElementById("Breadcrumb").innerHTML = "REPORT BY TYPE";
}





