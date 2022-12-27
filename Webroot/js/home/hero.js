// hero
const bgImgs = document.querySelectorAll('.image__wrapper>img');

const showImage = (id) => {
    bgImgs.forEach((img) => {
        if (parseInt(img.id) == id) {
            img.setAttribute('show', 'true');
        } else {
            img.setAttribute('show', 'false');
        }
    })
}

showImage(Math.floor(Math.random() * bgImgs.length + 1))

setInterval(() => {
    let active = document.querySelector('.image__wrapper>img[show="true"]');
    let next = active.nextElementSibling;
    if (next === null) {
        next = bgImgs[0];
    }
    showImage(parseInt(next.id))

}, 8000);
