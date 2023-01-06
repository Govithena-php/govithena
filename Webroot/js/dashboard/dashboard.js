const openSidebar = () => {
    console.log('open sidebar');
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.add('sidebar__open');
}

const closeSidebar = () => {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.remove('sidebar__open');
}