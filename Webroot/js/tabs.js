const controls = document.querySelectorAll(".controls>button");
const tabs = document.querySelectorAll(".tab");

Array.from(controls).forEach(control => {
    control.addEventListener("click", () => {
        
        Array.from(controls).forEach(c => {
            c.removeAttribute("active")
        })

        let For = control.getAttribute("for")
        
        control.toggleAttribute("active")
        
        Array.from(tabs).forEach(tab => {
            if (tab.id == For) {
                tab.setAttribute("active", true)
            } else {
                tab.setAttribute("active", false)
            }
        })

    })
})