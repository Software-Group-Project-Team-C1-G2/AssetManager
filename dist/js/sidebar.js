
const url = window.location.href;

if (url.includes("assets.php")) {
    let element = document.getElementById("assets");
    element.classList.add("side-menu--active");
} else if (url.includes("index.php")) {
    element = document.getElementById("dashboard");
    element.classList.add("side-menu--active");
} else if (url.includes("components.php")) {
    element = document.getElementById("components");
    element.classList.add("side-menu--active");
} else if (url.includes("maintenance.php")) {
    element = document.getElementById("maintenance");
    element.classList.add("side-menu--active");
} else if (url.includes("asset-types.php")) {
    element = document.getElementById("asset-types");
    element.classList.add("side-menu--active");
} else if (url.includes("brand.php")) {
    element = document.getElementById("brand");
    element.classList.add("side-menu--active");
} else if (url.includes("supplier.php")) {
    element = document.getElementById("supplier");
    element.classList.add("side-menu--active");
} else if (url.includes("maintenance.php")) {
    element = document.getElementById("maintenance");
    element.classList.add("side-menu--active");
} else if (url.includes("asset-types.php")) {
    element = document.getElementById("asset-types");
    element.classList.add("side-menu--active");
} else if (url.includes("brand.php")) {
    element = document.getElementById("brand");
    element.classList.add("side-menu--active");
} else if (url.includes("supplier.php")) {
    element = document.getElementById("supplier");
    element.classList.add("side-menu--active");
} else if (url.includes("location.php")) {
    element = document.getElementById("location");
    element.classList.add("side-menu--active");
} else if (url.includes("employee.php")) {
    element = document.getElementById("emp");
    element.classList.add("side-menu--active");
} else if (url.includes("department.php")) {
    element = document.getElementById("dep");
    element.classList.add("side-menu--active");
} else if (url.includes("report.php")) {
    element = document.getElementById("rep");
    element.classList.add("side-menu--active");
} else if (url.includes("user.php")) {
    element = document.getElementById("user");
    element.classList.add("side-menu--active");
} else if (url.includes("application.php")) {
    element = document.getElementById("application");
    element.classList.add("side-menu--active");
}

