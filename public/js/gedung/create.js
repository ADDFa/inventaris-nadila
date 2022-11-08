function setSelected() {
    const select = [...document.querySelectorAll('select')]

    select.map(e => {
        if (e.getAttribute('data-select')) {
            e.querySelector('[selected]').removeAttribute('selected')
            e.querySelector(`[value="${e.getAttribute('data-select')}"]`).setAttribute('selected', '')
        }
    })
}

function removeAlertOnInput(input) {
    if (!input.classList.contains('is-invalid')) return
    input.classList.remove('is-invalid')
}

document.querySelector('form').addEventListener('input', e => {
    removeAlertOnInput(e.target)
})

setSelected()