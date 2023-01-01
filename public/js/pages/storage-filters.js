const { el } = require('../utils/main')

const serach = el('#search')

const filtersStorage = () => {
    el('#loading').classList.toggle('d-none')

    const vals = {
        item_category: el('#category').value,
        item_type: el('#type').value,
        startDate: el('#start-date').value,
        endDate: el('#end-date').value
    }

    const search = serach.value

    let prepare = ''

    for (const val in vals) {
        if (vals[val] !== '') prepare += `${val}=${vals[val]}&`
    }

    prepare += `s=${search}`

    fetch(`${origin}/filters/storage?${prepare}`)
        .then(e => e.text())
        .then(e => {
            console.log(e)
            el('#loading').classList.toggle('d-none')
        })
}

document.addEventListener('input', evt => {
    if (!serach) return
    if (el('.filters').contains(evt.target) && evt.target !== serach) filtersStorage()
})
document.addEventListener('click', evt => {
    if (!serach) return
    if (evt.target === serach.parentElement.querySelector('button')) filtersStorage()
})
document.addEventListener('keyup', evt => {
    if (!serach) return
    if (evt.target === serach && evt.key === 'Enter') filtersStorage()
})