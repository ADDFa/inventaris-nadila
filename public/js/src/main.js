require('./bootstrap.bundle.min')
require('../components/form')
require('../partials/sidebar')

const { setItemCategory, setItemType, } = require('../pages/items/index')
const { saveItem } = require('../pages/items/new')
const deleteItem = require('../pages/items/delete')

document.addEventListener('click', async e => {
    if (e.target.classList.contains('delete')) {
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
                const form = e.target.form || e.target.parentElement.form
                form.querySelector('[type="submit"]').click()
            }
        })
    }

    if (e.target.classList.contains('manage-category')) setItemCategory('category')
    if (e.target.classList.contains('manage-type')) setItemType('type')
    if (e.target.classList.contains('save')) saveItem(e.target)
    if (e.target.classList.contains('delete-items-attribute')) deleteItem(e.target)
})