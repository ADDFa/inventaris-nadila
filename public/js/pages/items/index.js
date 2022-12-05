const { el } = require('../../partials/main')

const getItemData = target => {
    return new Promise(resolve => {
        fetch(`${origin}/item/${target}`)
            .then(e => e.json())
            .then(e => resolve(e))
    })
}

const getTemplateItems = (name, id, type) => {
    return {
        list: `
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>${name}</span>
            <button type="button" data-id="${id}" data-action="${type}" class="delete-items-attribute btn badge bg-danger">Hapus</button>
        </li>
        `,
        option: `<option value="${id}">${name}</option>`
    }
}

const setItemCategory = async () => {
    el('.modal-title').textContent = 'Kelola Kategori'
    el('.modal-body [for="name"]').textContent = 'Tambah Kategori'

    const data = await getItemData('category')
    el('.modal-body .new').setAttribute('action', '/item/category')

    let list = ''
    let option = ''
    data.map(e => {
        const items = getTemplateItems(e.category_name, e.id, 'category')
        list += items.list
        option += items.option
    })
    el('.modal-body ul').innerHTML = list
    el('#category_id').innerHTML = option
}

const setItemType = async () => {
    el('.modal-title').textContent = 'Kelola Jenis Barang'
    el('.modal-body [for="name"]').textContent = 'Tambah Jenis Barang'

    const data = await getItemData('type')
    el('.modal-body .new').setAttribute('action', '/item/type')

    let list = ''
    let option = ''
    data.map(e => {
        const items = getTemplateItems(e.type_name, e.id, 'type')
        list += items.list
        option += items.option
    })
    el('.modal-body ul').innerHTML = list
    el('#type_id').innerHTML = option
}

module.exports = {
    setItemType,
    setItemCategory
}