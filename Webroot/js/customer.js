// function to colr active of sidebar in customer
function activeSidebar() {
    var path = window.location.pathname;
    var page = path.split("/").pop();
    var active = document.getElementById(page);
    active.classList.add("active");
}