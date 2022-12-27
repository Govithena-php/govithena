
// navbar

window.addEventListener('scroll', function() {
    const navbar = document.querySelector('nav')
    if (window.scrollY > 50) {
        navbar.classList.add('navbar_active')
    } else {
        navbar.classList.remove('navbar_active')
    }
});

const mobile_sidebar = document.querySelector('.mobile__sidebar');

const openSidebar = () => {
    console.log("open");
    mobile_sidebar.setAttribute('open', 'true');
}

const closeSidebar = () => {
    mobile_sidebar.setAttribute('open', 'false');
}

const toggleProfileMenu = () => {
    const profileMenu = document.getElementById('profile_menu')
    let menu = profileMenu.getAttribute('open')
    console.log(menu);
    if (menu === "true") {
        profileMenu.setAttribute('open', "false")
    } else {
        profileMenu.setAttribute('open', "true")
    }
}
