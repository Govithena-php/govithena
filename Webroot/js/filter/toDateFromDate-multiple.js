const fromDate = document.querySelectorAll("input[tag=fromDate]")
const toDate = document.querySelectorAll("input[tag=toDate]")

Array.from(toDate).forEach(td => {
  td.disabled = true
})

Array.from(fromDate).forEach((fd, idx) => {
  fd.addEventListener('change', () => {
    let selectedFromDate = fd.value
    toDate[idx].setAttribute('min', selectedFromDate)
    toDate[idx].disabled = false
  })
})
