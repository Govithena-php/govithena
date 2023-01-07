const searchField = document.getElementById('search_text')

document.getElementById('searchBtn').addEventListener('click', (e) => {
    window.location.href = `http://localhost/govithena/search/${searchField.value}`
})
