const { el, elAll } = require('../partials/main')

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
