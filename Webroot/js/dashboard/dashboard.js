const openSidebar = () => {
    console.log('open sidebar');
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.add('sidebar__open');
}

const closeSidebar = () => {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.remove('sidebar__open');
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
