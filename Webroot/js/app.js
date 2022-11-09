window.addEventListener('scroll', () => {
    document.getElementById('imgt').style.top = 0.2 * window.scrollY + 'px';
})


    const handleActiveTab = (id) => {
        Array.from(document.querySelectorAll(`.actor__content_item`)).forEach((child) => {
            console.log(child.id == id);
            if(child.id == id) child.style.opacity = 1;
            else child.style.opacity = 0;
        })
    }
