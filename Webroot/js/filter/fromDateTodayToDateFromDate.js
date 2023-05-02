const fromDate = document.getElementById('fromDate')
const toDate = document.getElementById("toDate")
const today = new Date().toISOString().split('T')[0];

fromDate.setAttribute('min', today)
toDate.disabled = true

fromDate.addEventListener('change', () => {
  let selectedFromDate = fromDate.value
  toDate.setAttribute('min', selectedFromDate)
    toDate.disabled = false
})
