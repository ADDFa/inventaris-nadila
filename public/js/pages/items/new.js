const { Toast } = require('../../components/swal')
const { el } = require('../../partials/main')
const { setItemCategory, setItemType } = require('./index')

const buttonOff = (...target) => target.map(e => e.setAttribute('disabled', ''))
const buttonOn = (...target) => target.map(e => e.removeAttribute('disabled'))

const save = (action, data) => {
    return new Promise(resolve => {
        fetch(`${origin}/${action}`, {
            method: 'POST',
            body: data
        })
            .then(e => e.json())
            .then(e => resolve(e))
    })
}

const saveItem = async target => {
    const forms = new FormData

    const action = target.form.getAttribute('action')
    const inputName = target.form.querySelector('[name="name"]')
    forms.append('name', inputName.value)

    buttonOff(target, el('.btn-close'))
    const res = await save(action, forms)

    if (!res.ok) {
        Toast.fire({
            icon: 'error',
            title: res.message
        })
    }

    if (res.ok) {
        Toast.fire({
            icon: 'success',
            title: res.message
        })

        setItemCategory()
        setItemType()
    }

    buttonOn(target, el('.btn-close'))
    el('.btn-close').click()
    inputName.value = ''
}

module.exports = {
    saveItem,
    buttonOff,
    buttonOn
}