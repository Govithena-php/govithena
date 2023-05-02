
Array.from(document.querySelectorAll(".custom__select")).forEach((select) => {
    select.querySelector("button").addEventListener("click", (e) => {
        select.querySelector(".custom__options").classList.toggle("open");
        Array.from(select.querySelectorAll(".custom__option")).forEach((option) => {
            option.addEventListener('click', () => {
                select.querySelector("input[type='hidden']").value = option.getAttribute("Value");
                select.querySelector("button").textContent = option.getAttribute("Label");
                select.querySelector(".custom__options").classList.remove("open");
            })
        })
    }) 
})


