function toggleSidebar() {
    var sidebar = document.getElementById("mySidebar");
    var overlay = document.getElementById("overlay");

    if (sidebar.classList.contains("active")) {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
    } else {
        sidebar.classList.add("active");
        overlay.classList.add("active");
    }
}