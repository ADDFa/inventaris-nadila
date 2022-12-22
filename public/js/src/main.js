require('bootstrap/js/src/modal')
require('bootstrap/js/src/collapse')
require('bootstrap/js/src/dropdown')

const { deleteConfirm } = require('../components/form')
require('../partials/sidebar')

const { setItemCategory, setItemType, } = require('../pages/items/index')
const { saveItem } = require('../pages/items/new')
const deleteItem = require('../pages/items/delete')

document.addEventListener('click', e => {
    if (e.target.classList.contains('delete')) deleteConfirm(e)
    if (e.target.classList.contains('manage-category')) setItemCategory('category')
    if (e.target.classList.contains('manage-type')) setItemType('type')
    if (e.target.classList.contains('save')) saveItem(e.target)
    if (e.target.classList.contains('delete-items-attribute')) deleteItem(e.target)
})