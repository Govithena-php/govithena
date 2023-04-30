const expandBtns = document.querySelectorAll(".actions>button")
const expands = document.querySelectorAll(".expand")
const icons = document.querySelectorAll(".actions>button>i")
Array.from(expandBtns).forEach(expandBtn => {

    expandBtn.addEventListener("click", () => {
        let id = expandBtn.getAttribute("for")

        Array.from(icons).forEach(icon => {
            icon.removeAttribute("show")
        })

        Array.from(expands).forEach(expand => {
            if (expand.id == id) {
                expand.toggleAttribute("show")
                if (expand.hasAttribute("show")) {
                    expandBtn.children[0].setAttribute("show", null)
                }
            } else {
                expand.removeAttribute("show")
            }
        })

    })
})