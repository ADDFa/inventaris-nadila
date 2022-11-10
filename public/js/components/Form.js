import {
    Main
} from '../main/Main.js'

const main = new Main()

export class Form {
    setSelected() {
        const select = [...main.elAll('[data-select]')]

        select.map(e => {
            const selected = e.querySelector('[selected]')
            const dataSelect = e.querySelector(`[value="${e.getAttribute('data-select')}"]`)

            if (selected) selected.removeAttribute('selected')
            if (dataSelect) dataSelect.setAttribute('selected', '')
        })
    }

    removeAlertOnInput() {
        main.el('form').addEventListener('input', e => (!e.target.classList.contains('is-invalid')) ? '' : e.target.classList.remove('is-invalid'))
    }
}