const fromDate = document.getElementById('fromDate')
const toDate = document.getElementById("toDate")

toDate.disabled = true

fromDate.addEventListener('change', () => {
  let selectedFromDate = fromDate.value
  toDate.setAttribute('min', selectedFromDate)
    toDate.disabled = false
})
