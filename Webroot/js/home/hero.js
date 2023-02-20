// hero
const bgImgs = document.querySelectorAll('.image__wrapper>.slide')
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


let i = 0
const txt = ['Invest <span>with us</span> for a reasonable profit.', "Grow your <span>wealth<span> sustainably."]
const heading_hero = document.getElementById('heading-hero')
setInterval(() => {
    console.log(i);
    heading_hero.innerHTML = txt[i++]
    if (i == txt.length) i = 0

}, 8000);
