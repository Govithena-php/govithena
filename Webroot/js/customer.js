// function to color background of active a tag in the sidebar of customer
function activeSidebar() {
    var url = window.location;
    console.log(url);
    var path = window.location.pathname;
    var page = path.split("/").pop();
    // Will only work if string in href matches with location
    var active = $(page).children();
    console.log(active);
    active.addClass('active');
    // Will also work for relative and absolute hrefs

}

// window.addEventListener('click', () => {
//     document.getElementById('sidebar_link').style.top = 0.2 * window.scrollY + 'px';
// })