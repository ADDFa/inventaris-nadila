const { el } = require('../utils/main')

const serach = el('#search')

const filtersStorage = () => {
    el('#loading').classList.toggle('d-none')

    const vals = {
        item_category: el('#category').value,
        item_type: el('#type').value
    }

    const search = serach.value

    let prepare = ''

    for (const val in vals) {
        if (vals[val] !== '') prepare += `${val}=${vals[val]}&`
    }

    prepare += `s=${search}`

    fetch(`${origin}/filters/storage?${prepare}`)
        .then(e => e.json())
        .then(e => {
            setStoragesView(e)
            el('#loading').classList.toggle('d-none')
        })
}

const setStoragesView = data => {
    let rows = ''
    data.map((storage, i) => {
        let dates = new Date(storage.record_date * 1000)
        const date = (dates.getDate() < 10) ? `0${dates.getDate()}` : dates.getDate()
        let month = dates.getMonth() + 1
        month = (month < 10) ? `0${month}` : month
        const record_date = `${date}-${month}-${dates.getFullYear()}`

        rows +=
            /* html */
            `
            <tr class="text-center align-middle">
                <th scope="row">${++i}</th>
                <td>${storage.item_name}</td>
                <td>${storage.room_name}</td>
                <td>${record_date}</td>
                <td>${storage.qty}</td>
                <td>${storage.name}</td>
                <td class="col-lg-2">
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/storage/${storage.id}">
                            <button class="btn btn-warning">
                                <i class='bx bxs-show bx-sm'></i>
                            </button>
                        </a>
                        <a href="/storage/${storage.id}/edit">
                            <button class="btn btn-primary">
                                <i class='bx bx-edit bx-sm'></i>
                            </button>
                        </a>
                        <form action="/storage/${storage.id}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">

                            <button type="button" class="delete btn btn-danger">
                                <i class='bx bxs-trash-alt bx-sm delete'></i>
                            </button>
                            <button hidden type="submit"></button>
                        </form>
                    </div>
                </td>
            </tr>
            `
    })

    el('.table-gedung tbody').innerHTML = rows
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