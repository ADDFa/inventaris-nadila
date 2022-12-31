const Swal = require('sweetalert2')
const { el, elAll } = require('../utils/main')

const select = [...elAll('[data-select]')]
const form = el('form')

if (select.length > 0) {
    select.map(e => {
        const selected = e.querySelector('[selected]')
        const dataSelect = e.querySelector(`[value="${e.getAttribute('data-select')}"]`)

        if (selected) selected.removeAttribute('selected')
        if (dataSelect) dataSelect.setAttribute('selected', '')
    })
}

if (form) {
    form.addEventListener('input', e => {
        return (!e.target.classList.contains('is-invalid')) ? '' : e.target.classList.remove('is-invalid')
    })
}

const deleteConfirm = e => {
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data akan dihapus secara permanent!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(result => {
        if (result.isConfirmed) {
            console.log(e)
            const form = e.target.form || e.target.parentElement.form
            form.querySelector('[type="submit"]').click()
        }
    })
}

document.addEventListener('click', e => (e.target.classList.contains('delete')) ? deleteConfirm(e) : '')

// search
const rows = {
    actionColumn(url) {
        return /* html */`
            <td class="col-lg-2">
                <div class="d-flex justify-content-center gap-3">
                    <a href="${url}">
                        <button class="btn btn-warning">
                            <i class='bx bxs-show bx-sm'></i>
                        </button>
                    </a>

                    <a href="${url}/edit">
                        <button class="btn btn-primary">
                            <i class='bx bx-edit bx-sm'></i>
                        </button>
                    </a>

                    <form action="${url}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">

                        <input type="hidden" name="id" value="<?= $room->room_id ?>">
                        <button type="button" class="btn btn-danger delete">
                            <i class='bx bxs-trash-alt bx-sm delete'></i>
                        </button>
                        <button type="submit" hidden></button>
                    </form>
                </div>
            </td>
        `
    },

    item(item, i) {
        return /* html */ `
            <tr class="text-center align-middle">
                <th scope="row">${i}</th>
                <td>${item.item_name}</td>
                <td>${item.item_category}</td>
                <td>${item.item_type}</td>
                <td>${item.item_total}</td>
                ${this.actionColumn(`${origin}/item/${item.id}`)}
            </tr>
        `
    },

    room(room, i) {
        return /* html */ `
            <tr class="text-center align-middle">
                <th scope="row">${i}</th>
                <td>${room.room_name}</td>
                <td>${room.room_capacity}</td>
                <td>${room.filed}</td>
                <td>${room.available}</td>
                <td>${room.building_name}</td>
                ${this.actionColumn(`${origin}/room/${room.room_id}`)}
            </tr>
        `
    }
}

const setData = (data, table) => {
    let res = ''

    if (table === 'room') data.map((e, i) => res += rows.room(e, ++i))
    if (table === 'item') data.map((e, i) => res += rows.item(e, ++i))

    el(`table tbody`).innerHTML = res
}

const searching = e => {
    if (!e.target.classList.contains('search')) return

    const form = e.target.form
    const target = e.target

    target.setAttribute('disabled', '')
    el('.spinner-border').classList.toggle('d-none')

    fetch(`${form.action}?v=${form.childNodes.item(1).value}`)
        .then(e => e.json())
        .then(e => {
            setData(e.data, form.dataset.table)

            target.removeAttribute('disabled')
            el('.spinner-border').classList.toggle('d-none')
        })
}

document.addEventListener('click', searching)

const search = el('[data-table]')

if (search) {
    search.addEventListener('keydown', e => {
        if (e.key !== 'Enter') return

        e.preventDefault()
        el('.search').click()
    })
}

module.exports = deleteConfirm